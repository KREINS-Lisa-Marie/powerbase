<div class="d-flex flex-col">
    <label for="email" class="auth-label medium">
        Adresse email{{--{{__('login.email')}}--}}
    </label>
    @error('email')
    <p class="error">
        {{$message}}
    </p>
    @enderror
    <input type="email" id="email" name="email" class="border-radius-16 background-white border-input auth-input"
           value="{{old('email')}}">
</div>
