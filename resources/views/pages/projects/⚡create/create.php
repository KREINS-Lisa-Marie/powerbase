<?php

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

new class extends Component
{

    public string $project_name = '';
    public string $user_id = '';

    public string $project_type= '' ;
    public string $project_state = '' ;
    public string $client_name ='';
    public string $project_address ='';
    public string $project_description= '';
    public string $users;

    public function mount()
    {
        $this->users = User::get();
    }


    public function store(): void
    {
        $validated_data= $this->validate([
            'project_name'=>'required|string|max:255',
            'user_id'=>'int|required',
            'project_type'=>'required|string|max:255',
            'project_state'=>'required|string|max:255',
            'client_name'=>'required|string|max:255',
            'project_address'=>'required|string',
            'project_description'=>'required|string',
        ]);


        $project = Project::create([
            'project_name'=>$validated_data['project_name'],
            'user_id'=>$validated_data['user_id'],
            'project_type'=>$validated_data['project_type'],
            'project_state'=>$validated_data['project_state'],
            'client_name'=>$validated_data['client_name'],
            'project_address'=>$validated_data['project_address'],
            'project_description'=>$validated_data['project_description'],
        ]);

        $this->redirect(route('pages::projects.index', ['locale' => __('general.currentLocale')]));
    }
};
