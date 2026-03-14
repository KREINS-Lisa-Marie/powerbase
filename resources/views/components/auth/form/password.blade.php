<div class="">
    <label for="password" class="">
        Mot de passe{{--{{__('login.email')}}--}}
    </label>
    @error('password')
    <p class="error">
        {{$message}}
    </p>
    @enderror
    <input type="password" id="password" name="password" class=""
           value="{{old('password')}}" aria-required="true">
</div>
