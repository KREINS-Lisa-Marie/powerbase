<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Laravel\Facades\Image;

new class extends Component
{
    use WithFileUploads;

    public string $product_name = '';
    public string $brand = '';
    public string $product_notes= '' ;
    public string $ref_article ='';
    public string $gtin ='';
    public string $quantity = '';
    public string $product_description= '';
    public  $product_image = null ;

    public function store(): void
    {
        $validated_data= $this->validate([
            'product_name'=>'required|string|max:255',
            'brand'=>'string|required|max:255',
            'product_notes'=>['nullable', 'string'],
            'ref_article'=>'string|required|max:255',
            'gtin'=>['required','string','max:255',Rule::unique('products')],
            'product_description'=>['nullable', 'string'],
            'quantity'=>'required|int',
            'product_image'=>'image|nullable|mimes:jpg,jpeg,png,webp',
        ]);

        if ($this->product_image){
            $image_path = $this->product_image->store(config('productimage.originals_path'), 's3');
            $filename = basename($image_path); // = juste le nom de l'image sans les dossiers etc
            $image = Image::decode(          //marche pas avec read
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
            $image_path = null;
        }

        $product = \App\Models\Product::create([
            'product_name'=>$validated_data['product_name'],
            'brand'=>$validated_data['brand'],
            'product_notes'=>$validated_data['product_notes'],
            'ref_article'=>$validated_data['ref_article'],
            'gtin'=>$validated_data['gtin'],
            'product_description'=>$validated_data['product_description'],
            'quantity'=>$validated_data['quantity'],
            'product_image'=> $image_path,
        ]);

        $this->redirectRoute('pages::products.index', ['locale' => __('general.currentLocale')]);
    }
};
