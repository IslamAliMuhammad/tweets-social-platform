<aside>
    <form class="form-inline pt-2" action="" method="">
        <div class="d-flex flex-row">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
        </div>
    </form>
    <div class="card card-body mt-3">
        <h4 class="card-title font-weight-bold">Following</h4>
        <div>
            @foreach($userFollows as $user)
            <div class="d-flex flex-row mt-2">
                <div class="mr-2">
                    <img class="rounded-circle" src="https://via.placeholder.com/50" alt="User avatar">
                </div>
                <h6 class="align-self-center">{{ $user->name }}</h6>
            </div>
            @endforeach
        </div>
    </div>
</aside>