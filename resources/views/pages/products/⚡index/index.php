<?php

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public $search = '';

    //tri
    public $sortField = 'product_name';
    public $sortDirection = 'asc';
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


    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.products.⚡index.index', [
            'products' => Product::query()
                ->where('product_name', 'like', '%' . $this->search . '%')
                ->orWhere('quantity', 'like', '%' . $this->search . '%')
                ->orWhere('gtin', 'like', '%' . $this->search . '%')
                ->orWhere('brand', 'like', '%' . $this->search . '%')
                ->orWhere('ref_article', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10)->onEachSide(0),
        ])->title(__('general.products'));
    }
};
