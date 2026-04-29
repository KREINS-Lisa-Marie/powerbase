<?php

use App\Models\User;
use Livewire\Component;

new class extends Component
{
    public $contact_id;

    public function mount(User $contact)         //avant de render ( 1x seulement)
    {

        $this->contact_id = $contact->id;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.contacts.⚡show.show');
    }

    public function destroy()
    {
        $contact = User::findOrFail($this->contact_id);
        $contact->delete();
        return redirect(route('pages::contacts.index', ['locale' => app()->getLocale()]));
    }
};
