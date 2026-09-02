<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Validation\Rule;
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
    public $users;

    public function mount()
    {
        $this->authorize('create', \App\Models\Project::class);
        $this->users = User::where('company_id', auth()->user()->company_id)->get();//sinon montre aussi users qui sont pas de la company
    }


    public function store(): void
    {
        $companyId = auth()->user()->company_id;

        $validated_data= $this->validate([
            'project_name'=>'required|string|max:255',
            'user_id'=>['int','required', Rule::exists('users', 'id')->where('company_id', $companyId)],  //évite de mettre users qui sont pas de la company
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
            'company_id'=>$companyId,
        ]);

        $this->redirect(route('pages::projects.index', ['locale' => app()->getLocale()]));
    }


    public function render()
    {
        return view('pages.projects.⚡create.create')->title(__('general.project_create'));
    }

};
