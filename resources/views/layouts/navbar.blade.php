<nav class="navbar navbar-expand-xl navbar-dark bg-success fixed-top">
    <a class="navbar-brand" href="{{ route('lists') }}">Wishes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lists') }}">
                    {{ __('messages.wishes-list') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    {{ __('messages.login') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                    {{ __('messages.register') }}
                </a>
            </li>
        </ul>
        <div class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}">
                    {{ __('messages.profile') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">
                    {{ __('messages.logout') }}
                </a>
            </li>
        </div>
    </div>
</nav>
