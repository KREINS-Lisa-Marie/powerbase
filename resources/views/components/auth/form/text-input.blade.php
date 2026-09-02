@props([
    'id',
    'name',
    'placeholder' => '',
    'wire',
])
<div class="text-field">
    <label for="{!! $name !!}" class="field__label">
        {!! $slot!!}
    </label>
    <input wire:model.blur="{{$wire}}" type="text" name="{{$name}}" id="{{$id}}" value="" class="field__input" placeholder="{{$placeholder}}"
           aria-required="true">
    @error($name)
    <p class="mb-32 error">
        {{$message}}
    </p>
    @enderror
</div>
