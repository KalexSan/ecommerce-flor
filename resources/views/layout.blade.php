<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flor Shop - Ecommerce</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    @yield("scriptjs")
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
        <a class="navbar-brand" href="#">Flor Shop</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('categoria') }}">Categoria</a>
                <a class="nav-link" href="{{ route('cadastrar') }}">Cadastrar</a>
                @if(!\Auth::user())    
                <a class="nav-link" href="{{ route('logar') }}">Login</a>
                @else
                <a class="nav-link" href="{{ route('compra_historico') }}">Minhas Compras</a>
                <a class="nav-link" href="{{ route('sair') }}">Logout</a>
                @endif
            </div>
        </div>
        <a href="{{ route('ver_carrinho') }}" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
    </nav>
    <div class="container">
        <div class="row">
            @if(\Auth::user())
                <div class="col-12">
                    <p class="text-right">Olá, {{ \Auth::user()->nome }}, <a href="{{ route('sair') }}">Sair</a></p>
                </div>
            @endif
            @if($message = Session::get('error'))
                <div class="col-12">    
                    <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                </div>
            @endif
            @if($message = Session::get('sucesso'))
                <div class="col-12">
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                </div>
            @endif
            <!-- Nesta DIV teremos uma área que os arquivos irão adicionar conteúdo -->
            @yield('conteudo')
        </div>
    </div>
    </div>
</body>

</html>