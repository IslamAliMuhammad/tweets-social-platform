<aside>
    <form class="form-inline pt-2" action="" method="">
        <div class="row"> 
            <div class="col-8">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </div>
            <div class="col-4">
                <button class="btn btn-info" type="submit">Search</button>
            </div>
        </div>
    </form>
    <div class="card card-body mt-3">
        <h4 class="card-title font-weight-bold">Following</h4>
        <div>
            @if(Auth::User()->follows->isNotEmpty())
                @foreach(Auth::User()->follows as $user)
                <a href="{{ route('profiles.show', $user) }}">
                    <div class="d-flex flex-row mt-2">
                        <div class="mr-2 w-regular-img">
                            <img class="img-fluid rounded-circle" src="{{ asset($user->profile->avatar_path) }}" alt="User avatar">
                        </div>
                        <h6 class="align-self-center text-dark">{{ $user->profile->profile_name }}</h6>
                    </div>
                </a>
                @endforeach
            @else
                <p>No following</p>
            @endif
        </div>
    </div>
</aside>