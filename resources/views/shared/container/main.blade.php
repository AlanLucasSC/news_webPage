<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="https://getbootstrap.com/favicon.ico">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>NaMidiaMS</title>

        <!-- Bootstrap core CSS -->
        <link href="/assets/bootstrap.min.css" rel="stylesheet">

        <!-- Font Google -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:500|Roboto+Condensed" rel="stylesheet">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="/assets/fonts.css" rel="stylesheet">
        <link href="/assets/blog.css" rel="stylesheet">
        <link href="/assets/estilo.css" rel="stylesheet">
        <link href="/assets/github-markdown-css.css" rel="stylesheet">
        <style>
            .markdown-body {
                box-sizing: border-box;
                min-width: 200px;
                max-width: 980px;
                margin: 0 auto;
                padding: 45px;
            }

            @media (max-width: 767px) {
                .markdown-body {
                    padding: 15px;
                }
            }
        </style>
        
    </head>
    <body>
        @header 
            <!-- Authentication Links -->
            @guest
                <a class="nav-link" href="{{ route('login') }}"> Login </a>
                <a class="nav-link" href="{{ route('index') }}"> Início </a>
            @else
                <span class="px-5">Logado como: {{ Auth::user()->name }}</span>

                <a class="nav-link px-5" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
            <a class="text-muted" href="/PageNoticia.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3">
                    <circle cx="10.5" cy="10.5" r="7.5"></circle>
                    <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                </svg>
            </a>
        @endheader
        
        @menu

            @linkMenu([
                'route' => 'index',
                'id' => '',
                'name' => '',
                'page' => '' 
                ])
                Página inicial 
            @endlinkMenu

            @guest
                
            
                @foreach (  App\Category::all() as $category )
                    @linkMenu([
                            'route' => 'category', 
                            'id' => "$category->id",
                            'name' => "$category->name",
                            'page' => ''
                        ])

                        {{ $category->name }}
                    @endlinkMenu
                @endforeach
            
            @else

                @linkMenu(['route' => 'category.index','','',''])
                    Lista de categorias
                @endlinkMenu
                @linkMenu(['route' => 'category.create','','',''])
                    Adicionar categoria
                @endlinkMenu
                @linkMenu(['route' => 'news.create','','',''])
                    Listar noticias
                @endlinkMenu
                @linkMenu(['route' => 'news.create','','',''])
                    Editar noticia
                @endlinkMenu
                @linkMenu(['route' => 'news.create','','',''])
                    Escrever noticia
                @endlinkMenu
            @endauth
        @endmenu
        {{ $slot }}
        @footer 
        @endfooter
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
