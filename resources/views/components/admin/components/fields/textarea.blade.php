<div class="textarea_field ">
    <label for="{{$name}}" class="field__label">
        {!! $slot !!}
    </label>
    <textarea wire:model.blur="{{$wire}}" id="{{$id}}" name="{{$name}}" class="textarea field__input"
              placeholder="{{$placeholder}}" aria-required="true" >{{--{!!$old_values!!}--}}</textarea>
</div>
