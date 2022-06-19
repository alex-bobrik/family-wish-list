<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('messages.profile') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    </head>
    <body>

        <!-- Navbar -->
        @extends('layouts.navbar')

        <!-- Errors -->
        <div class="error-block">
            @extends('layouts.errors')
        </div>

        <div class="center shadow-lg">
            <h5>
                {{ __('messages.current-username') }}: {{ $user->username }}
            </h5>
            <hr>
            <form action="{{ url('profile/update-username') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="new_profile_name">
                        {{ __('messages.new-username') }}
                    </label>
                    <input
                        type="text"
                        name="new_profile_name"
                        value="{{ \Illuminate\Support\Facades\Auth::user()->username }}"
                        class="form-control"
                    >
                </div>
                <div class="form-group">
                    <input type="submit" value="{{ __('messages.change-username') }}" class="btn btn-success btn-change-name">
                </div>
            </form>
        </div>
    </body>
</html>
