<?php

use App\Models\Project;
use Livewire\Component;

new class extends Component
{
    public Project $project;

    public string $project_name = '';
    public string $person_in_charge = '';
    public string $phone_in_charge = '' ;
    public string $project_type ='';
    public string $client_name ='';
    public string $project_address ='';
    public string $project_description ='';


    public function mount(Project $project): void
    {
        $this->project = $project;
        $this->project_name = $project->project_name;
        $this->person_in_charge = $project->person_in_charge;
        $this->phone_in_charge = $project->phone_in_charge;
        $this->project_type = $project->project_type ?? '';
        $this->client_name = $project->client_name ?? '';
        $this->project_address = $project->project_address ?? '';
        $this->project_description = $project->project_description ?? '';
    }


    public function save(): void
    {
        $validated_data= $this->validate([
            'project_name'=>'required|string|max:255',
            'person_in_charge'=>'string|required|max:255',
            'phone_in_charge'=>'required|string|max:255',
            'project_type'=>'required|string',
            'client_name'=>'required|string',
            'project_address'=>'required|string',
            'project_description'=>'string',
        ]);

        $this->project->update([
            'project_name'=>$validated_data['project_name'],
            'person_in_charge'=>$validated_data['person_in_charge'],
            'phone_in_charge' => $validated_data['phone_in_charge'],
            'project_type'=>$validated_data['project_type'],
            'client_name'=>$validated_data['client_name'],
            'project_address'=>$validated_data['project_address'],
            'project_description'=>$validated_data['project_description'],
        ]);

        $this->redirect(route('pages::projects.show', ['locale' => __('general.currentLocale'), 'project'=>$this->project]));
    }
};
