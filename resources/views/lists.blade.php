<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('messages.wishes-list') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- React -->
        <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
        <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.25.0/babel.min.js"></script>

    </head>
    <body>

        <!-- Modals -->
        @extends('layouts.update-wish-modal')
        @extends('layouts.delete-wish-modal')

        <!-- Navbar -->
        @extends('layouts.navbar')

        <!-- Content -->
        <div class="container">
            <div id="wishesTableBlock"></div>
        </div>

        <script type="text/babel">

            class Wish extends React.Component {
                constructor(props) {
                    super(props);
                    this.state = {
                        wishes: [],
                        filteredData: [],
                        searchInput: ""
                    };

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

                    let modalTitle = document.getElementById('modalTitle');
                    modalTitle.textContent = "{{ __('messages.update-wish') }}";
                }

                // Get async json info about wishes
                gettingWishes = async (e) => {
                    e.preventDefault();

                    // Clear input
                    $("#search").val("");
                    this.setState({searchInput: ""});

                    const userId = e.target.elements.userId.value;

                    await this.setWishes(userId);
                }

                globalSearch = (searchText) => {
                    let { wishes } = this.state;
                    this.setState({searchInput: searchText});
                    let filteredData = wishes.filter(value => {
                        return (
                            // Search by wish name
                            value.wish_name.toLowerCase().includes(searchText.toLowerCase())
                        );
                    });
                    this.setState({ filteredData });
                };

                render() {

                    const wishes = this.state.searchInput.length ? this.state.filteredData : this.state.wishes;
                    return (
                        <div className="table-responsive-sm">
                            <Form wishesMethod={this.gettingWishes}/>
                            <div className="search-box">
                                <div className="input-group">
                                    <input
                                        type="text"
                                        id="search"
                                        className="form-control"
                                        placeholder="{{ __('messages.search-by-wish-name') }}"
                                        onChange={e => this.globalSearch(e.target.value)}
                                    />
                                </div>
                            </div>
                            <table className="table table-striped wishes-table">
                                <thead>
                                <tr>
                                    <th>{{ __('messages.wish-name') }}</th>
                                    <th>{{ __('messages.description') }}</th>
                                    <th>{{ __('messages.price') }}</th>
                                    <th>{{ __('messages.link') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    { wishes.length > 0 ? wishes.map(wish => {
                                        if (wish.user_id === {{ \Illuminate\Support\Facades\Auth::id() }}) {
                                            return (<tr>
                                                <td>
                                                    { wish.wish_name }
                                                </td>
                                                <td>
                                                    { wish.description ? wish.description : <span>&#8212;</span> }
                                                </td>
                                                <td>
                                                    { wish.price ? wish.price + " BYN" : <span>&#8212;</span> }
                                                </td>
                                                <td>
                                                    { wish.link
                                                        ? <a href={ wish.link } className="simplified-link">{ wish.link }</a>
                                                        : <span>&#8212;</span> }
                                                </td>
                                                <td>
                                                    <button
                                                        value={wish.id}
                                                        className="btn btn-lg"
                                                        data-toggle="modal"
                                                        data-target="#updateWishModal"
                                                        onClick={e => this.setDataToModal(e, wish)}
                                                    >
                                                        <i className="fa fa-pencil"></i>
                                                    </button>
                                                    <button
                                                        className="btn btn-lg"
                                                        data-toggle="modal"
                                                        data-target="#deleteWishModal"
                                                        onClick={e => $('#delete_wish_id').val(wish.id)}
                                                    >
                                                        <i className="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>)
                                        }
                                            return (
                                            <tr>
                                               <td>{wish.wish_name}</td>
                                               <td>{wish.description}</td>
                                               <td>{wish.price}</td>
                                               <td>{wish.link}</td>
                                            </tr>)
                                    }
                                ) : (
                                    <div className="no-wishes-message">
                                        <h1 className="shadow-sm">
                                            {{ __('messages.no-wishes-yet') }}
                                        </h1>
                                    </div>
                                    )}
                                </tbody>
                            </table>
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

                    let modalTitle = document.getElementById('modalTitle');
                    modalTitle.textContent = "{{ __('messages.add-new-wish') }}";
                }

                render() {
                    return (
                        <div>
                            <button
                                type="button"
                                className="btn btn-success add-wish-btn"
                                data-toggle="modal"
                                data-target="#updateWishModal"
                                onClick={this.resetForm}
                            >
                                {{ __('messages.add-new-wish') }}
                            </button>

                            <form
                                ref={ref => this.formRef = ref}
                                onSubmit={this.props.wishesMethod}
                                className="select-user-form"
                            >
                                <select
                                    aria-label="Default select example"
                                    name="userId"
                                    onChange={this.submitForm}
                                    className="form-control"
                                >
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

            ReactDOM.render(<Wish/>, document.getElementById('wishesTableBlock'));
        </script>

    </body>
</html>
