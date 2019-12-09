<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Invoice Management') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @stack('modals')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Invoice Management') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @guest
        @else
        <nav class="navbar navbar-light navbar-expand sticky-top" style="background-color: rgb(0, 93, 88);">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <a class="btn btn-light" style="background-color: rgb(0, 93, 88); color: white; border-style: solid; border-color: white;" href="{{ route('invoice.index') }}">
                    <i class="fas fa-file-invoice"></i>{{ __(' Invoice') }}
                </a>
                <a class="btn btn-light" style="background-color: rgb(0, 93, 88); color: white; border-style: solid; border-color: white;" href="{{ route('client.index') }}">
                    <i class="fas fa-building"></i>{{ __(' Client') }}
                </a>
                <a class="btn btn-light" style="background-color: rgb(0, 93, 88); color: white; border-style: solid; border-color: white;" href="{{ route('product.index') }}">
                    <i class="fab fa-linode"></i>{{ __(' Product') }}
                </a>
                <a class="btn btn-light" style="background-color: rgb(0, 93, 88); color: white; border-style: solid; border-color: white;" href="{{ route('invoice_product.index') }}">
                    <i class="fas fa-receipt"></i>{{ __(' Invoice Product') }}
                </a>
            </div>
        </nav>
        @endguest
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset(mix('js/manifest.js')) }}"></script>
    <script src="{{ asset(mix('js/vendor.js')) }}"></script>
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>
    <script>
    $('#confirm_delete_modal').on('show.bs.modal', function (e) {
        $('#delete_form').attr('action', $(e.relatedTarget).data('route'));
    });
    $('#add_invoice_product_modal').on('show.bs.modal', function (e) {
        //var description = $(e.relatedTarget).data('description')
        //var modal = $(this)
        //modal.find('.modal-body #description').val(description);
        $('#add_form').attr('action', $(e.relatedTarget).data('route'));
    });
    </script>
    @stack('scripts')
</body>
</html>