<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('messages.register') }}</title>

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
            <h2>Register</h2>
            <form method="POST" action="{{url('register')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">
                        {{ __('messages.username') }}:
                    </label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-register">
                        {{ __('messages.register') }}
                    </button>
                </div>
                <div class="form-group proposal-text">
                    <p>
                        {{ __('messages.have-account') }}
                        <a href="{{ url('login') }}">{{ __('messages.login') }}</a>
                    </p>
                </div>
            </form>
        </div>

    </body>
</html>
