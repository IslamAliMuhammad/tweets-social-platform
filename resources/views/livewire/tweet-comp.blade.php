<div class="card card-body mt-2">
    <div class="d-flex flex-row">
        <a href="{{ route('profiles.show', $tweet->user) }}" class="text-decoration-none text-dark">
            <div class="mr-3 w-regular-img">
                <img class="img-fluid rounded-circle" src="{{ asset($tweet->user->profile->avatar_path) }}"
                    alt="User avatar">
            </div>
        </a>
        <div>
            <h5>{{ $tweet->user->profile->profile_name }}</h5>
            <p>{{ $tweet->body }}</p>

            <div class="d-flex flex-row">
                <livewire:reaction-comp :tweet="$tweet">
                <livewire:bookmark-comp :tweet="$tweet"/>
            </div>
        </div>
    </div>
</div>