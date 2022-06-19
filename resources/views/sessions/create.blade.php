<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('messages.login') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    </head>
    <body>
        <!-- Errors -->
        @extends('layouts.errors')

        <div class="center shadow-lg">
            <h2>Log In</h2>

            <form method="POST" action="{{ url('login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <select name="username" class="form-control">
                        @foreach($usernames as $username)
                            <option value="{{ $username }}">{{ $username  }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" value="" name="password">
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-login">
                        {{ __('messages.login') }}
                    </button>
                </div>
                <div class="form-group proposal-text">
                    <p>
                        {{ __('messages.dont-have-account') }}
                        <a href="{{ url('register') }}">{{ __('messages.register') }}</a>
                    </p>
                </div>
            </form>
        </div>

    </body>
</html>
