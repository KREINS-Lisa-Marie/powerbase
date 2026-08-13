<?php

use App\Models\User;
use Livewire\Component;

new class extends Component
{
    public $contact_id;

    public function mount(User $contact)         //avant de render ( 1x seulement)
    {
        $this->authorize('view', $contact);        //sinon ça doit à chaque sort vérifier authorization        //tous les users peuvent voir tous les contacts
        $this->contact_id = $contact->id;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        $contact = \App\Models\User::findOrFail($this->contact_id);
        $user = auth()->user();

        return view('pages.contacts.⚡show.show', ['contact' => $contact, 'user' => $user])->title(__('general.contact_detail'));
    }

    public function destroy()
    {
        $contact = User::findOrFail($this->contact_id);
        $this->authorize('delete', $contact);
        $contact->delete();
        return redirect(route('pages::contacts.index', ['locale' => app()->getLocale()]));
    }
};
