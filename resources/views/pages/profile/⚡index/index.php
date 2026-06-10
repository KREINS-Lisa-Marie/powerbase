<?php

use Livewire\Component;

new class extends Component
{

    public $user;

    public function mount(): void
    {
        $this->user = \Auth::user();
    }
};
