<div class="field">
    <label for="phone" class="field__label">
        {{__('auth/login.phone')}}*
    </label>
    <input type="tel" wire:model.blur="phone" name="phone" id="phone" value="" class="field__input" placeholder="048937493"
           aria-required="true">
    @error('phone')
    <p class="error mb-32">
        {{$message}}
    </p>
    @enderror
</div>
