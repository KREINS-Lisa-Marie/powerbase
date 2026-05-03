<div class="d-flex flex-col">
    <label for="password_confirmation" class="auth-label medium">
        {{__('auth/reset_password.rewrite_password')}}
    </label>
    @error('verification_password')
    <p class="error">
        {{$message}}
    </p>
    @enderror
    <input type="password" id="password_confirmation" name="password_confirmation" class="border-radius-16 background-white border-input auth-input" value="" aria-required="true" wire:model.blur="{{$wire}}">
</div>
