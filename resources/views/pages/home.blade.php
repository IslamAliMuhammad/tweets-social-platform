@extends('../layouts.app')
@section('home')
<main>
    <form action="{{route('tweets.store')}}" method="POST">
        @csrf
        <div class="card">
            <div class="d-flex flex-row">
                <div class="align-self-start mt-3 ml-3 w-regular-img">
                    <img class="rounded-circle card-img" src="{{ asset(Auth::user()->profile->avatar_path) }}" alt="User avatar">
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea class="form-control @error('tweetBody') is-invalid @enderror" name="tweetBody" id="tweetArea"
                            placeholder="What's happening?" required></textarea>

                        @error('tweetBody')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>  
                    <div class="ml-auto">
                        <button type="submit" class="btn btn-info float-right rounded-pill">Tweet</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if($tweets->isNotEmpty())
    @foreach($tweets as $tweet)
    <div class="d-flex flex-row card card-body mt-2">
        <a href="{{ route('profiles.show', $tweet->user->user_name) }}" class="text-decoration-none text-dark">
            <div class="mr-3 w-regular-img">
                <img class="img-fluid rounded-circle" src="{{ asset($tweet->user->profile->avatar_path) }}" alt="User avatar">
            </div>
        </a>

        <div>
            <h5>{{ $tweet->user->profile->profile_name }}</h5>
            <p>{{ $tweet->body }}</p>
        </div>
    </div>
    @endforeach
    @else
    <div class="card card-body mt-2 ">   
        <p class="card-">No tweets to display</p>
    </div>
    @endif
</main>
@endsection
