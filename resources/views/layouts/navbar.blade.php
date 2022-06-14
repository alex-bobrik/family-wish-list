<nav class="navbar navbar-expand-xl navbar-dark bg-success fixed-top">
    <a class="navbar-brand" href="{{ route('lists') }}">Wishes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lists') }}">Wishes list</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
        <div class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
        </div>
    </div>
</nav>
