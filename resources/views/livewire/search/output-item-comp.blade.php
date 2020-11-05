<div class="card p-2 justify-content-between mt-1">
    <div class="flex-container">
        <a href="{{ route('profiles.show', $profile->user->user_name) }}" class="d-flex flex-row">
            <div style="width: 40px;">
                <img src="{{ asset($profile->avatar_path) }}" class="rounded-circle img-fluid"
                    class="rounded-circle img-fluid" alt="user avatar">
            </div>
            <div class="d-flex flex-row ml-3">
                <h6 class="align-self-center font-weight-bold text-dark mb-0">{{ $profile->profile_name }}</h6>
                <span class="align-self-center text-muted ml-1"
                    style="font-size:12px">{{ '@' . $profile->user->user_name }}</span>
            </div>
        </a>
    </div>
</div>