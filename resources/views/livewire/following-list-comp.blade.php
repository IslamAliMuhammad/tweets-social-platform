<div class="card card-body mt-3">
    <h4 class="card-title font-weight-bold">Following</h4>
    <div id="following-list">
        @if($users->isNotEmpty())
            @foreach($users as $user)
                <livewire:mini-profile-comp :user="$user" :key="$user->id">
            @endforeach
            {{ $users->links() }}
        @else
            <p>No following</p>
        @endif
    </div>
</div>