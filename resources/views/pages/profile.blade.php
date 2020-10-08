@extends('layouts.app')
@section('profile')
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
                        <a href="{{ Route('profiles.edit', $user->user_name) }}" class="btn btn-info rounded-pill">Edit Profile</a>
                    </div>
                @endcan
               
                @cannot('edit', $user)
                <form action="{{ route('follows.store', ['user_id' => $user->id]) }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-info rounded-pill" type>{{ Auth::user()->isFollowing($user->id) ? 'Unfollow' : 'Follow' }}</button>
                </form>
                @endcannot
            </div>
        </div>
    </header>
</main>

@if($userTweets->isNotEmpty())
    @foreach($userTweets as $tweet)
    <div class="d-flex flex-row card card-body mt-2">
        <a href="{{ route('profiles.show', $tweet->user->user_name) }}" class="text-decoration-none text-dark">
            <div class="mr-3 w-regular-img"> 
                <img class="img-fluid rounded-circle" src="{{ asset($profile->avatar_path) }}" alt="User avatar">
            </div>
        </a>
        <div>
            <h5>{{ $profile->profile_name  }}</h5>
            <p>{{ $tweet->body }}</p>
        </div>
    </div>
    @endforeach
    {{ $userTweets->links() }}
@else
    <div class="card card-body mt-2 ">   
        <p class="card-">No tweets to display</p>
    </div>
@endif

@endsection