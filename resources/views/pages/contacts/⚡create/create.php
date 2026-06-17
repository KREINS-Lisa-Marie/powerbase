<?php

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

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
    public string $password = '';
    public string $password_confirmation = '';

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
            'password'=>['required',$this->updatePasswordRules()],
            'password_confirmation'=>'required|same:password',
        ]);

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
            'password'=>Hash::make($validated_data['password']),
        ]);

        $this->redirectRoute('pages::contacts.index', ['locale' => __('general.currentLocale')]);
    }
};
