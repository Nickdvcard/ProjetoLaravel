<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Links alinhados à esquerda -->
        <ul class="navbar-nav flex-row">
            <li class="nav-item me-3">
                <a class="nav-link" href="{{ route('site.listagem') }}">Home</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link" href="{{ route('site.carrinho') }}">Carrinho 
                    <span class="badge bg-primary">{{ \Cart::content()->count() }}</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($categoriasMenu as $categoria)
                    <li>
                        <a href="{{ route('site.categoria', $categoria->id)}}" class="dropdown-item text-center py-2">
                            {{ $categoria->nome }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        
        <!-- Texto centralizado -->
        <a class="navbar-brand position-absolute start-50 translate-middle-x" href="{{ route('site.listagem') }}">Curso Laravel</a>
        
        <!-- Links alinhados à direita -->

        @auth
        <ul class="navbar-nav flex-row">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Olá {{ auth()->user()->firstName}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item text-center py-2">Dashboard</a>
                    <a href="{{ route('login.logout') }}" class="dropdown-item text-center py-2">Sair</a>
                </li>
            </ul>
        </li>
        </ul>
        @else
        <ul class="navbar-nav flex-row">
            <a class="nav-link" href="{{ route('login.form') }}" role="button">
              <i class="bi bi-lock me-1"></i>Login
            </a>
        </ul>
        @endauth
    </div>
</nav>

      
    @yield('conteudo')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
