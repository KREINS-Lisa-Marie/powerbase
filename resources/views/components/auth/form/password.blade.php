<div class="d-flex flex-col">
    <label for="password" class="auth-label medium">
        {{__('auth/login.password')}}
    </label>
    @error('password')
    <p class="error">
        {{$message}}
    </p>
    @enderror
    <input type="password" id="password" name="password" class="border-radius-16 background-white border-input auth-input {{$class}}"
           value="{{old('password')}}" aria-required="true" wire:model.blur="{{$wire}}">
</div>
