<?php

use Livewire\Component;

new class extends Component
{

    public $user;
    public $company;
    public string $name = '';
    public string $warehouse_phone= '' ;
    public string $warehouse_email ='';

    public bool $isopenModal = false;
    public $users;

    public function mount(): void
    {
        $this->user = \Auth::user();
        $this->company = auth()->user()->company;

        $this->name = $this->company->name;
        $this->warehouse_email = $this->company->warehouse_email?? '';
        $this->warehouse_phone = $this->company->warehouse_phone ?? '';

    }

    public function openModal( )
    {
        $companyId = auth()->user()->company_id;
        $this->company = \App\Models\Company::findOrFail($companyId);

        $this->authorize('update', $this->company);   // ajouter car sinon policy ne marche pas

        $this->name = $this->company->name;
        $this->warehouse_email = $this->company->warehouse_email?? '';
        $this->warehouse_phone = $this->company->warehouse_phone ?? '';

        $this->isopenModal = true;
    }

    public function closeModal():void
    {
        $this->isopenModal = false;
    }


    public function updateCompany(): void
    {
        $this->authorize('update', $this->company);

        $validated_data = $this->validate([
            'name' => 'string|required',
            'warehouse_phone' => 'string|required',
            'warehouse_email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $this->company->update([
            'name'=>$validated_data['name'],
            'warehouse_phone' => $validated_data['warehouse_phone'],
            'warehouse_email'=>$validated_data['warehouse_email'],
            ]);

        $this->closeModal();
    }

    public function render()  {
        return view('pages.profile.⚡index.index',)->title(__('general.profile'));
    }
};
