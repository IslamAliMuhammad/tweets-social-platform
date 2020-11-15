<div>
    <form wire:submit.prevent="submit" method="POST">
        @csrf
        <div class="card border-info">
            <div class="d-flex flex-row">
                <div class="align-self-start mt-3 ml-3 w-regular-img">
                    <img class="rounded-circle card-img" src="{{ asset(Auth::user()->profile->avatar_path) }}"
                        alt="User avatar">
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea class="form-control @error('tweetBody') is-invalid @enderror" wire:model.defer="tweetBody"
                            id="tweetArea" placeholder="What's happening?" required></textarea>

                        @error('tweetBody')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="ml-auto">
                        <button class="btn btn-outline-info float-right rounded-pill close-tweet-input" wire:click="$emitUp('closeTweetInputOverlay')">Close</button>
                        <button type="submit" class="btn btn-outline-info float-right rounded-pill mr-2">Tweet</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>