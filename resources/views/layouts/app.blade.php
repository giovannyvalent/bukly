<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bukly</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css" integrity="sha512-8RxmFOVaKQe/xtg6lbscU9DU0IRhURWEuiI0tXevv+lXbAHfkpamD4VKFQRto9WgfOJDwOZ74c/s9Yesv3VvIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @notifyCss
    @bukStyles(true)

    <style>
        body {
            font-family: system-ui;
        }
        h1 {
            font-size: 28px;
        }
        .card-title {
            font-size: 25px;
        }
        .btn-default {
            background: #123555;
            border-color: orange;
            margin-top: 10px;
            border-radius: 21px;
            color: white;
        }
        .btn-default-orange {
            background: #e95634;
            border-color: #123555;
            margin-top: 10px;
            border-radius: 21px;
            color: white;
            font-weight: 600;
        }
        .card-default {
            border: solid 2.3px;
            border-color: coral;
            box-shadow: 0px 0px 12px -4px gray;
            border-radius: 15px;
        }
        .card-default-white {
            border: none;
            border-color: rgb(201, 201, 201);
            box-shadow: 0px 0px 12px -5px gray;
            background-color: white;
            border-radius: 15px;
        }
        .card-hearder-default {
            background-color: #123555;
            color: #f8fafd;
            border-radius: 10px 10px 0px 0px;
        }
        .icon-default {
            color: coral;
        }
        .line {
            color: #e95634;
        }
    </style>
</head>
<body>
    @notifyJs
    @bukScripts(true)
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://www.bukly.com/img/Logotipo-Bukly.png" width="100" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}" role="button">
                                    <i class="icon-default fa fa-bar-chart"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('hotels')}}" role="button">
                                    <i class="icon-default fa fa-hotel"></i> Hotéis
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('rooms')}}" role="button">
                                    <i class="icon-default fa fa-tag"></i> Quartos
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
@include('notify::components.notify')
@stack('javascript')
@stack('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    function verify_cep() {
    var cep = $("#postal_code").val(); // Get the value of the postal code input field
    cep = cep.replace(/\D/g, ''); // Remove non-digit characters from the cep

    if (cep.length == 8) {
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;

            if (validacep.test(cep)) {
                // Clear previous data while fetching new data
                $("#localization").val("");
                $("#neighborhood").val("");
                $("#address").val("");
                $("#city").val("");
                $("#uf").val("");

                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                    $('input[name=postal_code]').removeClass("is-invalid");
                    $('input[name=postal_code]').removeClass("is-valid");
                    $('input[name=address]').removeClass("is-valid");
                    $('input[name=neighborhood]').removeClass("is-valid");
                    $('input[name=city]').removeClass("is-valid");
                    $('input[name=uf]').removeClass("is-valid");
                    $('input[name=postal_code]').removeClass("is-valid");
                    $('input[name=address]').removeClass("is-invalid");
                    $('input[name=neighborhood]').removeClass("is-invalid");
                    $('input[name=city]').removeClass("is-invalid");
                    $('input[name=uf]').removeClass("is-invalid");
                    $('input[name=postal_code]').removeClass("is-invalid");

                    if (!("erro" in dados)) {
                        // Update the fields with the values from the API response
                        $("#address").val(dados.logradouro);
                        $('input[name=address]').addClass("is-valid");
                        $("#neighborhood").val(dados.bairro);
                        $('input[name=neighborhood]').addClass("is-valid");
                        $("#city").val(dados.localidade);
                        $('input[name=city]').addClass("is-valid");
                        $("#uf").val(dados.uf);
                        $('input[name=uf]').addClass("is-valid");

                        $('input[name=postal_code]').addClass("is-valid");
                    } else {
                        // CEP not found
                        limpa_formulário_cep();
                        $('input[name=postal_code]').addClass("is-invalid");
                    }
                });
            } else {
                // Invalid CEP
                limpa_formulário_cep();
                $('input[name=postal_code]').addClass("is-invalid");
            }
        } else {
            // Empty CEP
            limpa_formulário_cep();
            $('input[name=postal_code]').addClass("is-invalid");
        }
    }
}
</script>
</html>
