@extends('../layouts.app')
@section('home')
<main>
    <form action="{{route('tweets.store')}}" method="POST">
        @csrf
        <div class="card">
            <div class="d-flex flex-row">
                <div class="align-self-start mt-3 ml-3">
                    <img class="rounded-circle card-img" src="https://via.placeholder.com/50" alt="User avatar">
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
    <a href="{{ route('profiles.show', $tweet->user_id) }}" class="text-decoration-none text-dark">
        <div class="d-flex flex-row card card-body mt-2">
            <div class="mr-3">
                <img class="rounded-circle" src="https://via.placeholder.com/50" alt="User avatar">
            </div>
            <div>
                <h5>{{ $tweet->user->name }}</h5>
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
</main>
@endsection
