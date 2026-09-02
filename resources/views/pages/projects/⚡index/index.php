<?php

use App\Models\Project;
use Livewire\Component;

new class extends Component
{
    public $search = '';

//tri
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    protected $queryString =['sortField', 'sortDirection'];

    public function mount(): void
    {
        $this->authorize('viewAny', Project::class);        //sinon ça doit à chaque sort vérifier authorization        //tous les users peuvent voir tous les projets
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

        $companyId= auth()->user()->company_id;

        return view('pages.projects.⚡index.index', [
            'projects' => Project::query()
                ->where('company_id', $companyId)
                ->where(function ($query){
                    $query->where('project_name', 'like', '%' . $this->search . '%')
                        ->orWhere('project_address', 'like', '%' . $this->search . '%')
                        ->orWhere('created_at', 'like', '%' . $this->search . '%')
                        ->orWhere('updated_at', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10)->onEachSide(0),
        ])->title(__('general.projects'));
    }
};
