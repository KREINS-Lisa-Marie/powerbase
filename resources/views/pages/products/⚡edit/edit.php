<?php

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
    public string $product_description= '';
    public  $product_image = null ;


    public function mount(Product $product)         //avant de render ( 1x seulement)
    {
        $this->product = $product;
        $this->product_name = $product->product_name;
        $this->brand = $product->brand;
        $this->product_notes = $product->product_notes  ?? '';
        $this->ref_article = $product->ref_article ?? '';
        $this->gtin = $product->gtin ;
        $this->quantity = $product->quantity ?? 0;
        $this->product_description = $product->product_description ?? '';
        $this->product_image = $product->product_image ?? null;
    }

    public function save(): void
    {
        $validated_data= $this->validate([
            'product_name'=>'required|string|max:255',
            'brand'=>'string|required|max:255',
            'product_notes'=>['nullable', 'string'],
            'ref_article'=>'string|required|max:255',
            'gtin' => ['required', 'string', 'max:255', Rule::unique('products')->ignore        ($this->product->id)],  //sinon fail
            'product_description'=>['nullable', 'string'],
            'quantity'=>'required|integer',
            'product_image'=>'image|nullable|mimes:jpg,jpeg,png,webp',
        ]);

        if ($this->product_image){
            $image_path = $this->product_image->store(config('productimage.originals_path'), 'public');
            $filename = basename($image_path);        // = juste le nom de l'image sans les dossiers etc
            $image = Image::decode(         //marche pas avec read
                Storage::disk('public')->get($image_path)
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
                \Storage::disk('public')->put($variant_path.'/'.$filename,
                    $variant->encodeUsingFormat(\Intervention\Image\Format::JPEG, quality: $compression));
            }
        }
        else{
            $image_path = null;
        }

        $this->product->update([
            'product_name'=>$validated_data['product_name'],
            'brand'=>$validated_data['brand'],
            'product_notes' => $validated_data['product_notes'],
            'ref_article'=>$validated_data['ref_article'],
            'gtin'=>$validated_data['gtin'],
            'product_description'=>$validated_data['product_description'],
            'quantity'=>$validated_data['quantity'],
            'product_image'=> $image_path,
        ]);

        $this->redirect(route('pages::products.show', ['locale' => __('general.currentLocale'), 'product'=>$this->product]));
    }
};
