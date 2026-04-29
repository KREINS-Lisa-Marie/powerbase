<?php

use Livewire\Component;

new class extends Component
{

    public $search = '';
    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.contacts.⚡index.index', [
            'contacts' => \App\Models\User::query()
                ->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('job', 'like', '%' . $this->search . '%')
                ->orderBy('email', 'asc')
                ->paginate(10),
        ]);
    }

};
