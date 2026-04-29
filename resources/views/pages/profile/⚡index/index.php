<?php

use Livewire\Component;

new class extends Component
{

    public $user;

    public function mount(): void
    {
        $this->user = \Auth::user();
    }

    public function destroy(): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $user= Auth::user();
        $user->delete();
        $locale =  __('general.currentLocale');

        return redirect(route("/$locale/login"));
    }
};
