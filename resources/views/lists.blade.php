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

    <!-- React -->
    <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.25.0/babel.min.js"></script>

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
        $(document).ready(function () {
            $("#table1-add-button").click(function () {
                $("#table_number").val(0);
            });

            $("#table2-add-button").click(function () {
                $("#table_number").val(1);
            });
        });
    </script>


</head>
<body>
@extends('layouts.navbar')

<!-- Modals -->
@extends('layouts.update-wish-modal')
@extends('layouts.delete-wish-modal')
{{--End Modals--}}


<div class="container">
    <div id="wishesTable"></div>
</div>


<script type="text/babel">

    class Wish extends React.Component {

        constructor(props) {
            super(props);
            this.state = {wishes: []};

            // Set wishes for first display table for current user
            this.setWishes({{\Illuminate\Support\Facades\Auth::id()}});
        }


        setWishes = (userId) => {
            fetch(`/wishes?userId=${userId}`)
                .then(response => response.json())
                .then(data => {
                    this.setState({wishes: data});
                })
        }

        setDataToModal = (e, wish) => {
            $('#wish_name').val(wish.wish_name);
            $('#description').val(wish.description);
            $('#price').val(wish.price);
            $('#link').val(wish.link);
            $('#wish_id').val(wish.id);
        }

        setDataToDeleteModal = (e) => {
        }

        // Get async json info about wishes
        gettingWishes = async (e) => {
            e.preventDefault();

            const userId = e.target.elements.userId.value;

            await this.setWishes(userId);
        }

        render() {
            const {wishes} = this.state;
            return (
                <div>
                    <Form wishesMethod={this.gettingWishes}/>
                    <div>
                        {wishes.map(wish => {
                                if (wish.user_id === {{ \Illuminate\Support\Facades\Auth::id() }}) {
                                    return (<div>
                                        <hr/>
                                        {wish.wish_name} ||
                                        {wish.description} ||
                                        {wish.link} ||
                                        {wish.price}||


                                        <button
                                            value={wish.id}
                                            className="btn btn-info"
                                            data-toggle="modal"
                                            data-target="#exampleModalCenter"
                                            // onClick={e => $('#wish_name').val(e.target.value)} // value = wish.id
                                            onClick={e => this.setDataToModal(e, wish)} // set in func form method to put
                                        >edit</button>
                                        <button
                                            className="btn btn-danger"
                                            data-toggle="modal"
                                            data-target="#exampleModalCenterDelete"
                                            onClick={e => $('#delete_wish_id').val(wish.id)}
                                        >delete
                                        </button>
                                        <hr/>
                                    </div>)
                                }
                                    return (
                                    <div>
                                        <hr/>
                                        {wish.wish_name} ||
                                        {wish.description} ||
                                        {wish.link} ||
                                        {wish.price}||
                                    </div>)
                            }
                        )}
                    </div>
                </div>

            );
        }
    }

    class Form extends React.Component {

        submitForm = () => {
            this.formRef.dispatchEvent(
                new Event("submit", {bubbles: true, cancelable: true})
            )
        };

        // Clear fields and set form method POST
        resetForm = () => {
            let form = $('#updateWishForm');
            form[0].reset();
        }

        render() {
            return (
                <div>
                    <button
                        type="button"
                        className="btn btn-primary"
                        data-toggle="modal"
                        data-target="#exampleModalCenter"
                        onClick={this.resetForm}
                    >
                        Add new wish
                    </button>

                    <form
                        ref={ref => this.formRef = ref}
                        onSubmit={this.props.wishesMethod}
                    >
                        <select aria-label="Default select example" name="userId" onChange={this.submitForm}>
                            @foreach($users as $user)
                            <option
                                value="{{ $user->id }}"
                                {{ (\Illuminate\Support\Facades\Auth::id() == $user->id ? "selected":"") }}
                            >{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>


            )
        }
    }

    ReactDOM.render(<Wish/>, document.getElementById('wishesTable'));


</script>


</body>
</html>
