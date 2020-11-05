<div class="card p-2 justify-content-between {{ $loopFirst ? '' : 'mt-1'}}">
    <div class="flex-container m-2">
        <a href="{{ route('profiles.show', $user->user_name) }}" class="d-flex flex-row"> 
            <div style="width: 60px;">
                <img src="{{ asset($user->profile->avatar_path) }}" class="rounded-circle img-fluid" alt="user avatar"
                    >
            </div>
            <div class="flex-container ml-3">
                <h5 class="align-self-center font-weight-bold text-dark">{{ $user->profile->profile_name }}</h5>
                <span class="align-self-center text-muted">{{ '@' . $user->user_name }}</span>
            </div>
        </a>
        <livewire:follow-button-comp :user="$user" >
    </div>
</div>