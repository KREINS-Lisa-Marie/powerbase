<?php

use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{

    use WithPagination;

    public $search = '';

    //tri
    public $sortField = 'first_name';
    public $sortDirection = 'asc';
    protected $queryString =['sortField', 'sortDirection'];


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
        $user = auth()->user();

        return view('pages.contacts.⚡index.index', [
            'contacts' => \App\Models\User::query()
                ->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('job', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
            'user' => $user
        ]);
    }

};
