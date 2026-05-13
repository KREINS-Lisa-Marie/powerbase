<?php

use App\Models\Project;
use Livewire\Component;

new class extends Component
{
    public $project_id;

    public function mount(Project $project)         //avant de render ( 1x seulement)
    {
        $this->project_id = $project->id;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.projects.⚡show.show');
    }

    public function destroy()
    {
        $project = Project::findOrFail($this->project_id);
        $project->delete();
        return redirect(route('pages::projects.index', ['locale' => app()->getLocale()]));
    }
};
