<?php

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

new class extends Component {

    public User $contact;

    public string $first_name = '';
    public string $last_name = '';
    public string $email= '' ;
    public string $phone ='';
    public string $private_phone ='';
    public string $job= '';
    public string $private_address= '';
    public string $car_type= '';
    public string $car_plate= '';


    public function mount(User $contact): void
    {
        $this->contact = $contact;
        $this->first_name = $contact->first_name;
        $this->last_name = $contact->last_name;
        $this->email = $contact->email;
        $this->phone = $contact->phone ?? '';
        $this->private_phone = $contact->private_phone ?? '';
        $this->private_address = $contact->private_address ?? '';
        $this->car_type = $contact->car_type ?? '';
        $this->car_plate = $contact->car_plate ?? '';
        $this->job = $contact->job ?? '';
    }


    public function save(): void
    {
        $validated_data= $this->validate([
            'first_name'=>'required|string|max:255',
            'last_name'=>'string|required|max:255',
            'email'=>['required','string','email','max:255',Rule::unique('users')->ignore($this->contact->id)],
            'phone'=>'required|string',
            'private_phone'=>'required|string',
            'job'=>'required|string',
            'private_address'=>'required|string',
            'car_type'=>'nullable|string',
            'car_plate'=>'nullable|string',
        ]);

        $this->contact->update([
            'first_name'=>$validated_data['first_name'],
            'last_name'=>$validated_data['last_name'],
            'email' => $validated_data['email'],
            'phone'=>$validated_data['phone'],
            'private_phone'=>$validated_data['private_phone'],
            'job'=>$validated_data['job'],
            'private_address'=>$validated_data['private_address'],
            'car_type'=>$validated_data['car_type'] ?? null,
            'car_plate'=>$validated_data['car_plate'] ?? null,
        ]);

        $this->redirect(route('pages::contacts.show', ['locale' => __('general.currentLocale'), 'contact'=>$this->contact]));
    }
};
