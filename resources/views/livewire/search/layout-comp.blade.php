<div class="mt-2">
    <input class="form-control" wire:model.debounce.500ms="searchInput" type="search" placeholder="Search"
                aria-label="Search">

    @if(isset($profiles))
        @foreach($profiles as $profile)
            <livewire:search.output-item-comp :profile="$profile" :key="$profile->id">
        @endforeach

        {{ $profiles->links() }}
    @endif
</div>

