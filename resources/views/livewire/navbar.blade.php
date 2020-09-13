<nav class="navbar navbar-light bg-light">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="navbar-brand" href="#">
                <i class="fas fa-comment-dots fa-3x text-info"></i>
            </a>
        </li>
        <li class="nav-item active">
            <div>
                <a class="nav-link font-weight-bold" href="{{route('home.index')}}">
                    <i class="fas fa-home fa-2x mr-2"></i>Home
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">
                <i class="fas fa-hashtag fa-2x mr-2"></i>Explore
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">
                <i class="fas fa-bell fa-2x mr-2"></i>Notifications
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">
                <i class="fas fa-envelope fa-2x mr-2"></i>Messages
            </a>         
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">
                <i class="fas fa-bookmark fa-2x mr-2"></i>Bookmarks
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">
                <i class="fas fa-list-alt fa-2x mr-2"></i>Lists
            </a>          
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">
                <i class="fas fa-id-badge fa-2x mr-2"></i>Profile
            </a>           
        </li>
        <li class="nav-item">
            <a class="btn btn-info mt-4 rounded-pill w-100" href="#">Tweet</a>
        </li>
        <li class="nav-item">
            <div class="d-flex flex-row mt-3">
                <img class="rounded-circle" src="https://via.placeholder.com/50" alt="User avatar">
                <span class="font-weight-bold ml-2 align-self-center">{{Auth::user()->name}}</span>
            </div>
        </li>
    </ul>
</nav>