<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h3> SURVEY CRUD</h3>
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

<script>
        $('body').on('change', '.question-type', function(){
            var minmaxhtml ='<div class="my-2" ><div class="row"><div class="col-md-6"><input type="number" class="form-control" name="rate[]" placeholder="Min Rating"></div><div class="col-md-6"><input type="number" class="form-control" name="rate[]" placeholder="Max Rating"></div></div></div>' ;
        if( $(this).val() == 'rating'){
            $('#datafields').css("display", "block");
            $('#datafields').html(minmaxhtml);
            $('.more_choices').css("display","none");

        }else if($(this).val() == 'choice'){
$('.more_choices').css("display","block")
$('#datafields').css("display","none")



        } else{
            $('#datafields').css("display", "none");
            $('.more_choices').css("display","none")

        }
        
    });

/////////////////////////////options///////////////////////////////
var mtText='<div class="input-group mb-3 " ><input class="col-md-10" placeholder="Add more choices" type="text" name="mytextchoices[]" class="form-control"><div class="input-group-append"><button class="btn btn-danger remove_field" type="button"><i class="fa fa-minus"></i></button></div></div>'
    
$(document).ready(function() {
var max_fields      = 10; 
var wrapper   		= $(".input_fields_wrap");
var plus_button      = $(".add_field_button"); 

var x = 1;
$(plus_button).click(function(e){
e.preventDefault();
    if(x < max_fields){
        x++;
        $(wrapper).append(mtText); 
    }
});

$(wrapper).on("click",".remove_field", function(e){ 
    e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});
//////////////////////////////endeditoptions////////////////////////////


</script>
</body>
</html>


