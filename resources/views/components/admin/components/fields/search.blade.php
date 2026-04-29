<label for="search" class="sro">
    {{__('admin/contacts.search')}}
</label>
<input type="text" name="search" id="search" class="background-white border-radius-16 admin-search" {{-- value="{{/*$old || */}}"--}} placeholder="{{__('admin/contacts.searching')}}" wire:model.live.debounce.300ms="search">
