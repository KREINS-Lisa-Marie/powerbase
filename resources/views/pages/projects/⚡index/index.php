<?php

use App\Models\Project;
use Livewire\Component;

new class extends Component
{
    public $search = '';

//tri
    public $sortField = 'project_name';
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
        return view('pages.projects.⚡index.index', [
            'projects' => Project::query()
                ->where('project_name', 'like', '%' . $this->search . '%')
                ->orWhere('project_address', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
        ]);
    }
};
