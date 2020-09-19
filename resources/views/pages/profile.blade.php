@extends('layouts.app')
@section('profile')
<main>
    <header>
        <div>
            <div>
                <img class="img-fluid rounded" src="https://marketplace.canva.com/EADajP7DDkw/2/0/800w/canva-illustrated-shutter-shades-facebook-cover-AToHWwj4Tgo.jpg" alt="">
            </div>
            <div class="w-25" style="position: absolute; left: 50%; transform: translate(-50%, -50%);">
                <img class="img-thumbnail rounded-circle" src="https://www.mymindandme.ie/wp-content/uploads/2019/02/Eckhart-Tolle-400px.png" alt="">
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between mt-3">
            <div>
                <h4 class="font-weight-bold">{{ $user->name }}</h4>
                <p class="text-muted">  Join {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="d-flex flex-row">
                @can('edit', $user)
                    <div>
                        <a href="{{ Route('profiles.edit', $user->id) }}" class="btn btn-outline-info rounded-pill">Edit Profile</a>
                    </div>
                @endcan

                @cannot('edit', $user)
                    <form action="{{ route('follows.store', ['id' => $user->id]) }}" method="POST">
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
    <a href="{{ route('profiles.show', $tweet->user_id) }}" class="text-decoration-none text-dark">
        <div class="d-flex flex-row card card-body mt-2">
            <div class="mr-3">
                <img class="rounded-circle" src="https://via.placeholder.com/50" alt="User avatar">
            </div>
            <div>
                <h5>{{ $tweet->user->name  }}</h5>
                <p>{{ $tweet->body }}</p>
            </div>
        </div>
    </a>
    @endforeach
@else
    <div class="card card-body mt-2 ">   
        <p class="card-">No tweets to display</p>
    </div>
@endif

@endsection