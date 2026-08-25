<?php

use Livewire\Component;

new class extends Component
{

    public $user;

    public function mount(): void
    {
        $this->user = \Auth::user();
    }

    public function render()  {
        return view('pages.profile.⚡index.index',)->title(__('general.profile'));
    }
};
