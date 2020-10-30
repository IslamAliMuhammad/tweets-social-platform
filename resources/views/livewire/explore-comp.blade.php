<div id="explore">
    @foreach($users as $user)
        <livewire:mini-profile-comp :user="$user" :key="$user->id" :loopFirst="$loop->first">
    @endforeach
    {{ $users->links() }}
</div>
