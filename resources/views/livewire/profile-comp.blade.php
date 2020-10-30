<main>
    <header>
        <div>
            <div class="cover">
                <img class="img-fluid rounded" src="@isset($profile) {{ asset($profile->cover_path) }} @endisset" alt="profile cover">
            </div>
            <div class="avatar w-25" style="position: absolute; left: 50%; transform: translate(-50%, -50%);">
                <img class="img-thumbnail rounded-circle"src="@isset($profile) {{ asset($profile->avatar_path) }} @endisset" alt="profile avatar">
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between mt-3">
            <div style="width: 37%">   
                <h4 class="font-weight-bold">@isset($profile) {{ $profile->profile_name }} @endisset</h4>
                <p class="text-muted">@isset($profile) Join {{ $profile->created_at->diffForHumans() }} @endisset</p>
            </div>
            <div class="d-flex flex-row">
                @can('edit', $user)
                    <div>
                        <a href="{{ Route('profiles.edit', $user) }}" class="btn btn-info rounded-pill">Edit Profile</a>
                    </div>
                @endcan
               
                @cannot('edit', $user)
                    <livewire:follow-button-comp :user="$user" >
                @endcannot
            </div>
        </div>
    </header>
    @if($tweets->isNotEmpty())
    @foreach($tweets as $tweet)
        <livewire:tweet-comp :tweet="$tweet" :key="$tweet->id">
    @endforeach
    {{ $tweets->links() }}
    @else
        <livewire:no-tweets-comp />
    @endif
</main>

