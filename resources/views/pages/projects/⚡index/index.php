<?php

use App\Models\Project;
use Livewire\Component;

new class extends Component
{

/*    public $projects;
    public function mount()         //avant de render ( 1x seulement)
    {
        $this->projects = Project::get();
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.projects.⚡index.index');
    }
*/
    public $search = '';

    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.projects.⚡index.index', [
            'projects' => \App\Models\Project::query()
                ->where('project_name', 'like', '%' . $this->search . '%')
                ->orWhere('project_address', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy('project_name', 'asc')
                ->paginate(10),
        ]);
    }

};
