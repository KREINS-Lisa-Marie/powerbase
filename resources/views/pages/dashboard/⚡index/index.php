<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component
{
    public function index()
    {
       // $not_treated_adoptions = Request::where('state', 'not_treated_yet')->get();
        return view('pages.dashboard.⚡index.index'/*, compact('not_treated_adoptions')*/);
    }

};
