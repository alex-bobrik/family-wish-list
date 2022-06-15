<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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

            .btn-register {
                width: 100%;
            }


        </style>
    </head>
    <body>


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

            <div class="form-group" style="text-align: center">
                <p>
                    {{ __('messages.have-account') }}
                    <a href="{{ url('login') }}">{{ __('messages.login') }}</a>
                </p>
            </div>
        </form>
    </div>


    </body>
</html>
