<?php

use App\Models\Project;
use Illuminate\Validation\Rule;
use Livewire\Component;

new class extends Component
{
    public Project $project;

    public string $project_name = '';
    public string $user_id = '';
    public string $project_type ='';
    public string $project_state = '' ;
    public string $client_name ='';
    public string $project_address ='';
    public string $project_description ='';
    public  $project_options;
    public  $project_state_options;
    public  $in_charge_options;



    public function mount(Project $project): void
    {
        $this->authorize('update', $project);

        $this->project = $project;
        $this->project_name = $project->project_name;
        $this->user_id = $project->user_id;
        $this->project_type = $project->project_type ?? '';
        $this->project_state = $project->project_state ?? '';
        $this->client_name = $project->client_name ?? '';
        $this->project_address = $project->project_address ?? '';
        $this->project_description = $project->project_description ?? '';

        $this->project_options = [
            [
                'name' => __('admin/projects.private'),
                'value' => \App\Enums\ProjectTypes::Private->value,
            ],
            [
                'name' => __('admin/projects.corporate'),
                'value' => \App\Enums\ProjectTypes::Corporate->value,
            ],
        ];

        $this->project_state_options = [
            [
                'name' => __('admin/projects.closed'),
                'value' => \App\Enums\ProjectStates::Closed->value,
            ],
            [
                'name' => __('admin/projects.open'),
                'value' => \App\Enums\ProjectStates::Open->value,
            ],
        ];

        $in_charge_options = [];
        $users =  App\Models\User::where('company_id', $project->company_id)->get();//sinon montre aussi users qui sont pas de la company;
        foreach ($users as $user) {
            $in_charge_options[] = [
                'name'  => "$user->first_name $user->last_name",
                'value' => $user->id,
            ];
        }
        $this->in_charge_options = $in_charge_options ;
    }


    public function save(): void
    {
        $companyId = auth()->user()->company_id;

        $validated_data= $this->validate([
            'project_name'=>'required|string|max:255',
            'user_id'=>['int','required', Rule::exists('users', 'id')->where('company_id', $companyId)],  //évite de mettre users qui sont pas de la company
            'project_type'=>'required|string',
            'project_state'=>'required|string|max:255',
            'client_name'=>'required|string',
            'project_address'=>'required|string',
            'project_description'=>'string',
        ]);

        $this->project->update([
            'project_name'=>$validated_data['project_name'],
            'user_id'=>$validated_data['user_id'],
            'project_type'=>$validated_data['project_type'],
            'project_state'=>$validated_data['project_state'],
            'client_name'=>$validated_data['client_name'],
            'project_address'=>$validated_data['project_address'],
            'project_description'=>$validated_data['project_description'],
            'company_id'=>$this->project->company_id,
        ]);

        $this->redirect(route('pages::projects.show', ['locale' => app()->getLocale(), 'project'=>$this->project]));
    }



    public function render()
    {
        return view('pages.projects.⚡edit.edit')->title(__('general.project_edit'));
    }
};
