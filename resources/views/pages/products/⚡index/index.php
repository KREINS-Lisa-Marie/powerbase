<?php

use App\Models\Product;
use App\Models\ProductSetting;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public $search = '';

    //tri
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    protected $queryString =['sortField', 'sortDirection'];


    public function mount(): void
    {
        $this->authorize('viewAny', Product::class);        //sinon ça doit à chaque sort vérifier authorization        //tous les users peuvent voir tous les contacts
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }


    public function render()        //à chaque fois que qqch sur la page change
    {
        $companyId = auth()->user()->company_id;

        return view('pages.products.⚡index.index', [
            'products' => Product::query()
                ->addSelect(['company_quantity'=>ProductSetting::select('quantity')
                ->whereColumn('product_settings.product_id', 'products.id')
                ->where('product_settings.company_id', $companyId)
                ])

                ->where(function ($query) use($companyId){
                    $query->where('product_name', 'like', '%' . $this->search . '%')
                        ->orWhere('gtin', 'like', '%' . $this->search . '%')
                        ->orWhere('brand', 'like', '%' . $this->search . '%')
                        ->orWhere('ref_article', 'like', '%' . $this->search . '%')
                        ->orWhere('created_at', 'like', '%' . $this->search . '%')
                        ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                        ->orWhereHas('productSettings', function ($productSettings) use($companyId){
                            $productSettings->where('company_id', $companyId);
                            $productSettings->where('quantity', 'like', '%' . $this->search . '%');     //qt du produit par company
                        });
                })
                ->where(function ($query) use($companyId){          //seulement les produits qui appartiennent à la company et produits globaux
                    $query->whereNull('company_id')->orWhere('company_id', $companyId);
                })
                ->orderBy($this->sortField === 'quantity' ? 'company_quantity' : $this->sortField, $this->sortDirection)
                ->paginate(10)->onEachSide(0),
        ])->title(__('general.products'));
    }
};
