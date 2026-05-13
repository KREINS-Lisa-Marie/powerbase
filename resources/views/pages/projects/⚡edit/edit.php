<?php

use App\Models\Project;
use Livewire\Component;

new class extends Component
{
    public Project $project;

    public string $project_name = '';
    public string $user_id = '';
    public string $project_type ='';
    public string $client_name ='';
    public string $project_address ='';
    public string $project_description ='';


    public function mount(Project $project): void
    {
        $this->project = $project;
        $this->project_name = $project->project_name;
        $this->user_id = $project->user_id;
        $this->project_type = $project->project_type ?? '';
        $this->client_name = $project->client_name ?? '';
        $this->project_address = $project->project_address ?? '';
        $this->project_description = $project->project_description ?? '';
    }


    public function save(): void
    {
        $validated_data= $this->validate([
            'project_name'=>'required|string|max:255',
            'user_id'=>'integer|required|max:255',
            'project_type'=>'required|string',
            'client_name'=>'required|string',
            'project_address'=>'required|string',
            'project_description'=>'string',
        ]);

        $this->project->update([
            'project_name'=>$validated_data['project_name'],
            'user_id'=>$validated_data['user_id'],
            'project_type'=>$validated_data['project_type'],
            'client_name'=>$validated_data['client_name'],
            'project_address'=>$validated_data['project_address'],
            'project_description'=>$validated_data['project_description'],
        ]);

        $this->redirect(route('pages::projects.show', ['locale' => __('general.currentLocale'), 'project'=>$this->project]));
    }
};
