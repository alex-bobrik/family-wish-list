<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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

            .first-table, .second-table {
                border-collapse: separate;
                border-spacing: 10px;
                height: 100%;
                width: 75%;
                margin: 50px;
            }
            table {
                width: 100%;
            }

        </style>
        <script>
            $( document ).ready(function() {
                $( "#table1-add-button" ).click(function() {
                    $("#table_number").val(0);
                });

                $( "#table2-add-button" ).click(function() {
                    $("#table_number").val(1);
                });
            });
        </script>


    </head>
    <body>
    @extends('layouts.navbar')

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add new wish</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>



                    <form action="{{ url('add-new-wish') }}" method="post">

                        <div class="modal-body">
                            @csrf
                            <div>
                                <label for="wish_name">Wish name</label>
                                <input type="text" class="form-control" name="wish_name" required >
                            </div>

                            <div>
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description">
                            </div>

                            <div>
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" min="0" max="999999">
                            </div>

                            <div>
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link">
                            </div>
                            <div>
                                <input type="hidden" name="table_number" id="table_number" value="0">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        {{--End Modal--}}

        <div class="full-height flex-center">
            <div class="first-table">
                <div>
                    <button id="table1-add-button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add new wish
                    </button>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Link</th>
                        </tr>
                        @foreach($wishes as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->wish_name }}</td>
                            <td>{{ $list->description }}</td>
                            <td>{{ $list->price ? $list->price . ' BYN' : ' - ' }}</td>
                            <td>
                                @if($list->link)
                                    <a href="{{ $list->link }}" class="btn btn-info">
                                        Link
                                    </a>
                                @else
                                    {{-- Long dash --}}
                                    &#8212;
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>

{{--            <div class="second-table">--}}
{{--                <div>--}}
{{--                    <button id="table2-add-button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">--}}
{{--                        Add new wish--}}
{{--                    </button>--}}
{{--                    <table>--}}
{{--                        <tr>--}}
{{--                            <th>ID</th>--}}
{{--                            <th>Name</th>--}}
{{--                            <th>Description</th>--}}
{{--                            <th>Price</th>--}}
{{--                            <th>Link</th>--}}
{{--                        </tr>--}}
{{--                        @foreach($secondTable as $list)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $list->id }}</td>--}}
{{--                                <td>{{ $list->wish_name }}</td>--}}
{{--                                <td>{{ $list->description }}</td>--}}
{{--                                <td>{{ $list->price ? $list->price . ' BYN' : ' - ' }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($list->link)--}}
{{--                                        <a href="{{ $list->link }}" class="btn btn-info">--}}
{{--                                            Link--}}
{{--                                        </a>--}}
{{--                                    @else--}}
{{--                                        --}}{{-- Long dash --}}
{{--                                        &#8212;--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </body>

</html>
