<nav class="navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-comment-dots fa-3x text-info"></i>
            </a>
        </li>
        <li class="nav-item {{ $navigation === 'home' ? 'active' : ''}}">
            <a class="nav-link font-weight-bold" href="{{ route('home') }}">
                <i class="fas fa-home fa-2x mr-2"></i>Home
            </a>
        </li>
        <li class="nav-item {{ $navigation === 'explore' ? 'active' : ''}}">
            <a class="nav-link font-weight-bold" href="{{ route('explore') }}">
                <i class="fas fa-hashtag fa-2x mr-2"></i>Explore
            </a>
        </li>
        <li class="nav-item {{ $navigation === 'bookmarks' ? 'active' : ''}}">
            <a class="nav-link font-weight-bold" href="{{ route('bookmarks') }}">
                <i class="fas fa-bookmark fa-2x mr-2"></i>Bookmarks
            </a>
        </li>
        <li class="nav-item {{ $navigation === 'profiles' ? 'active' : ''}}">
            <a class="nav-link font-weight-bold" href="{{ route('profiles.show', Auth::user()) }}">
                <i class="fas fa-id-badge fa-2x mr-2"></i>Profile
            </a>
        </li>
    
        <button class="btn btn-info mt-4 rounded-pill w-100" id="nav-tweet-btn" wire:click="$emit('displayTweetInputOverlay')">Tweet</button>

        <div class="dropdown">
            <div class="d-flex flex-row mt-3 dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                
                <div class="w-regular-img">
                    <img class="rounded-circle img-fluid" src="{{ asset(Auth::user()->profile->avatar_path) }}"
                        alt="User avatar">
                </div>
            </div>
    
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="border-0 btn w-100">Logout</button>
                </form>
            </div>
        </div>
    </ul>

    <livewire:tweet-overlay-comp >
</nav>