<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profile</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }



            .center {
                width: 400px;
                height: 300px;
                background-color: #f8f8f8;
                position: absolute; /*Can also be `fixed`*/
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                margin: auto;
                /*Solves a problem in which the content is being cut when the div is smaller than its' wrapper:*/
                max-width: 100%;
                max-height: 100%;

                border-radius: 20px;
                padding: 50px;
            }

            .btn-change-name {
                width: 100%;
            }

            /* Display errors under navbar */
            .error-block {
                padding-top: 60px;
            }

        </style>
    </head>
    <body>


    @extends('layouts.navbar')


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
