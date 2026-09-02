<?php

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

new class extends Component
{
    use PasswordValidationRules;

    public string $first_name = '';
    public string $last_name = '';
    public string $email= '' ;
    public string $phone ='';
    public string $private_phone ='';
    public string $job= '';
    public string $private_address= '';
    public string $car_type= '';
    public string $car_plate= '';
/*    public string $password = '';
    public string $password_confirmation = '';*/


    public function mount()
    {
        $this->authorize('create', User::class);
    }

    public function store(): void
    {
        $validated_data= $this->validate([
            'first_name'=>'required|string|max:255',
            'last_name'=>'string|required|max:255',
            'email'=>['required','string','email','max:255',Rule::unique('users')],
            'phone'=>'required|string',
            'private_phone'=>'required|string',
            'job'=>'required|string',
            'private_address'=>'required|string',
            'car_type'=>'required|string',
            'car_plate'=>'required|string',
            /*'password'=>['required',$this->updatePasswordRules()],
            'password_confirmation'=>'required|same:password',*/
        ]);

        $companyId = auth()->user()->company_id;

        $user = User::create([
            'first_name'=>$validated_data['first_name'],
            'last_name'=>$validated_data['last_name'],
            'email'=>$validated_data['email'],
            'phone'=>$validated_data['phone'],
            'private_phone'=>$validated_data['private_phone'],
            'job'=>$validated_data['job'],
            'private_address'=>$validated_data['private_address'],
            'car_type'=>$validated_data['car_type'],
            'car_plate'=>$validated_data['car_plate'],
            'password'=>Hash::make(Str::password(32)),
            'company_id'=>$companyId,
        ]);

        $token = Password::createToken($user);
        $resetUrl = route('auth.reset-password', ['locale' => app()->getLocale(), 'token'=>$token, 'email' =>$user->email]);

        Mail::to($user)->send(new \App\Mail\UserInviteMail($user, $user->company,$resetUrl));

        $this->redirectRoute('pages::contacts.index', ['locale' => __('general.currentLocale')]);
    }

    public function render()
    {
        return view('pages.contacts.⚡create.create')->title(__('general.contact_create'));
    }
};

/* créer pw random
https://laravel.com/framework/docs/13.x/strings#method-str-password
créer token pour email reset
https://api.laravel.com/docs/13.x/Illuminate/Auth/Passwords/PasswordBroker.html
*/
