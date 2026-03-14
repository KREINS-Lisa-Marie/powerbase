<div class="">
    <label for="password_confirmation" class="">
        Retapez votre mot de passe
        {{--{{__('register.confirmation_password')}}--}}
    </label>
    @error('verification_password')
    <p class="error">
        {{$message}}
    </p>
    @enderror
    <input type="password" id="password_confirmation" name="password_confirmation" class="" value="" aria-required="true" {{--wire:model.blur="{{$wire}}"--}}>
</div>
