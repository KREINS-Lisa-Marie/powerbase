<div class="">
    <label for="email" class="">
        Adresse email{{--{{__('login.email')}}--}}
    </label>
    @error('email')
    <p class="error">
        {{$message}}
    </p>
    @enderror
    <input type="email" id="email" name="email" class=""
           value="{{old('email')}}">
</div>
