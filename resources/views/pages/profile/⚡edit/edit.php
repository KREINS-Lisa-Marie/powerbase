<?php

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


new class extends Component
{
    use PasswordValidationRules;

    public $user;
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(User $user): void
    {
        $this->user = \Auth::user();
    }

    public function save(): void
    {
        $validated_data = $this->validate([
            'password'=>$this->updatePasswordRules(),
        ]);

        $this->user->update([
            'password'=>Hash::make($validated_data['password']),
        ]);

        $this->redirect(route('pages::profile.index', ['locale' => app()->getLocale(), 'contact'=>$this->user]));
    }
};
