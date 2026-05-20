<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    @stack('styles')

    <script src="/js/script.js" defer></script> 
</head> 

<body>
    <header>
        <nav class="navbar">
            <div class="nav-left">
               <!-- <a href="{{ route('home') }}" class="logo-circulo"></a>-->
                <a href="{{ route('home') }}" class="logo-circulo">
                     <img src="{{ asset('img/logo/logo.svg') }}" alt="Logo Nossas Receitas" class="logo-img">
                </a>
                <!--<a href="#">Receitas salgadas</a>
                <a href="#">Receitas doces</a>
                <a href="#">Ultimas Receitas</a>-->
                <a href="{{ route('recipes.create') }}">Publicar uma nova Receita</a>
            </div>

            <div class="nav-right">
                <div class="search-container">
                    <input type="text" class="search-bar" placeholder="Pesquisar...">
                </div>

                <!-- Se for Admin, mostra o botão de solicitações -->
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('solicitacoes') }}" class="btn admin-button">Ver solicitações</a>
                    @endif
                @endauth

                <!-- Menu Dropdown do Perfil -->
                <div class="dropdown">
                    <button class="perfil-icon-btn" type="button" id="dropdownMenuPerfil" data-bs-toggle="dropdown" aria-expanded="false">
                        👤
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuPerfil">
                        <li><h6 class="dropdown-header">Olá, {{ auth()->user()->name ?? 'Usuário' }}</h6></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                Meu Perfil
                            </a>
                        </li>
                        <li>
                            <!-- Formulário de Logout padrão do Laravel -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="text-center py-4">
        <p>Para nossas receitas &copy; 2026</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>