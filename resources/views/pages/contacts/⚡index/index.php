<?php

use App\Models\User;
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
        $this->authorize('viewAny', User::class);        //sinon ça doit à chaque sort vérifier authorization        //tous les users peuvent voir tous les contacts
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
        $this->resetPage();     //remet pagination à 1 quand je veux faire une search
    }

    public function render()        //à chaque fois que qqch sur la page change
    {

        $user = auth()->user();
        $companyId= $user->company_id;

        return view('pages.contacts.⚡index.index', [
            'contacts' => \App\Models\User::query()
                ->where('company_id', $companyId)
                ->where(function ($query){          //faut grouper sinon il prend des contacts d'autres sociétés qui n'ont pas ce company_id
                    $query->where('first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%')
                        ->orWhere('job', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10)->onEachSide(0),
            'user' => $user
        ])->title(__('general.contacts'));
    }

};
