@extends('layouts.app')
@section('explore')
    @foreach($users as $user)
    <div class="d-flex flex-row card p-2 justify-content-between {{ $loop->first ? '' : 'mt-1'}}">
        <a href="{{ route('profiles.show', $user->user_name) }}" class="d-flex flex-row">
            <img src="{{ asset($user->profile->avatar_path) }}" class="rounded-circle" alt="user avatar" style="width: 40px;">
            <h5 class="ml-4 align-self-center font-weight-bold text-dark">{{ $user->profile->profile_name }}</h5> <span class="align-self-center ml-2 text-muted">{{ '@' . $user->user_name }}</span>
        </a>
        <form action="{{ route('follows.store', $user->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-info rounded-pill">{{ Auth::user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}</button>
        </form>
    </div>
    @endforeach

    {{ $users->links() }}
@endsection