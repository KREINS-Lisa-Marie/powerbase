<label for="search" class="sro">
    Recherche
</label>
<input type="text" name="search" id="search" class="background-white border-radius-16 admin-search" {{-- value="{{/*$old || */}}"--}} placeholder="Rechercher" wire:model.live.debounce.300ms="term">
