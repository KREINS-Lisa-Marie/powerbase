<?php

use App\Models\ProductSetting;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Laravel\Facades\Image;

new class extends Component
{

    use WithFileUploads;

    public Product $product;

    public string $product_name = '';
    public string $brand = '';
    public string $product_notes= '' ;
    public string $ref_article ='';
    public string $gtin ='';
    public string $quantity= '';
    public string $comment= '';
    public string $product_description= '';
    public  $product_image = null;
    public  $current_image = '' ;       //parce que si je n'ajoute pas 'image je veux garder celle qui est déjà là


    public function mount(Product $product )         //avant de render ( 1x seulement)
    {
        $user = auth()->user();
        if ( !$user->can('update', $product) &&  !$user->can('updateLimited', $product)){
            abort(403);      //arrête de charger parce que la personne n'a pas le droit d'accès
        }

        //$this->authorize('update', $product);

        $companyId = auth()->user()->company_id;

        $this->product = $product;
        $this->product_name = $product->product_name;
        $this->brand = $product->brand;
        $this->product_notes = $product->product_notes  ?? '';
        $this->ref_article = $product->ref_article ?? '';
        $this->gtin = $product->gtin ;
        $this->product_description = $product->product_description ?? '';
        $this->current_image = $product->product_image ?? '';

        $productSetting = \App\Models\ProductSetting::where('product_id', $product->id)->where('company_id', $companyId)->first();

        $this->quantity = $productSetting->quantity ?? 0;
        $this->comment = $productSetting->comment ?? '';
    }

    public function save(): void
    {
        $this->authorize('update', $this->product);

        $validationRules = [
            'product_name'=>'required|string|max:255',
            'brand'=>'string|required|max:255',
            'product_notes'=>['nullable', 'string'],
            'ref_article'=>'string|required|max:255',
            'gtin' => ['required', 'string', 'max:255', Rule::unique('products')->ignore        ($this->product->id)],  //sinon fail
            'product_description'=>['nullable', 'string'],
            /*'comment'=>['nullable', 'string'],*/
            /*'quantity'=>'required|integer',*/
            'product_image'=>'image|nullable|mimes:jpg,jpeg,png,webp',
        ];

        $globalProduct = $this->product->company_id === null ;

        if (!$globalProduct){
            $validationRules['comment'] = ['nullable', 'string'];
            $validationRules['quantity'] = 'required|integer';
        }

        $validated_data = $this->validate($validationRules);

        $companyId = auth()->user()->company_id;

        if ($this->product_image){
            $image_path = $this->product_image->store(config('productimage.originals_path'), 's3');
            $filename = basename($image_path);        // = juste le nom de l'image sans les dossiers etc
            $image = Image::decode(         //marche pas avec read
                Storage::disk('s3')->get($image_path)
            );
            $sizes = config('productimage.sizes');
            $extension = config('productimage.jpg_image_type');
            $compression = config('productimage.jpg_compression');

            foreach ($sizes as $size){
                $variant = clone $image;

                $variant->scale($size['width']);
                $variant_path = sprintf(
                    config('productimage.variants_path_pattern'),
                    $size['width'],
                    $size['height']
                );
                \Storage::disk('s3')->put($variant_path.'/'.$filename,
                    $variant->encodeUsingFormat(\Intervention\Image\Format::JPEG, quality: $compression));
            }
        }
        else{
            $image_path = $this->current_image;     //si je ne fais pas ça, alors il perds mon image
        }

        $this->product->update([
            'product_name'=>$validated_data['product_name'],
            'brand'=>$validated_data['brand'],
            'product_notes' => $validated_data['product_notes'],
            'ref_article'=>$validated_data['ref_article'],
            'gtin'=>$validated_data['gtin'],
            'product_description'=>$validated_data['product_description'],
            /*'quantity'=>$validated_data['quantity'],*/
            'product_image'=> $image_path,
        ]);

        if (!$globalProduct){
        \App\Models\ProductSetting::updateOrCreate(
            ['company_id' => $companyId, 'product_id'=>$this->product->id],
            ['quantity'=>$validated_data['quantity'], 'comment'=>$validated_data['comment']],
        );
        }
        $locale = app()->getLocale();

        $this->redirect(route('pages::products.show', ['locale' => __('general.currentLocale'), 'product'=>$this->product]));
    }

    public function updateProductLimited(): void
    {
        $this->authorize('updateLimited', $this->product);

        $validated_data= $this->validate([
            'comment'=>['nullable', 'string'],
            'quantity'=>'required|integer',
        ]);

        $companyId = auth()->user()->company_id;

        ProductSetting::updateOrCreate(
            ['company_id'=> $companyId, 'product_id'=> $this->product->id],
            ['comment'=>$validated_data['comment'], 'quantity'=>$validated_data['quantity']],
        );

        $locale = app()->getLocale();

        $this->redirect(route('pages::products.show', ['locale' => __('general.currentLocale'), 'product'=>$this->product]));
    }

    public function render()
    {
        return view('pages.products.⚡edit.edit')->title(__('general.product_edit'));
    }
};
