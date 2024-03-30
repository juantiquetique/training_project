<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('titulo')</title>
    @livewireStyles
</head>
<body id="prueba">
    <nav class="navbar shadow colorN">
        <button class="navbar-toggler ms-4 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""><i class="text-dark fa-solid fa-screwdriver-wrench"></i></span>
        </button>
        <div class="container text-black">
            <a class="navbar-brand fs-4 ">Gestión de productos</a> {{-- me-5 p-2  --}}
            <form class="d-flex" role="search">
                <input class="form-control ms-2" type="search" placeholder="Buscar..." name="buscar" aria-label="buscar">
                <button class="btn btn-dark ms-2" type="submit">Buscar</button>
                <div>
                    <a class="dropdown-item rounded ms-3 fs-3" href="{{ route('detalleVenta.index') }}"><i class="fa-solid fa-cash-register"></i></a>
                </div>
            </form>
            <div class="offcanvas offcanvas-start colorN" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="olffcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h4 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Gestión de productos</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 fs-5">
                        <li>
                            <a class="dropdown-item rounded mb-2" href="{{ route('categorias.index') }}">Categorías</a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded mb-2" href="{{ route('products.index') }}">Productos</a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded mb-2" href="{{ route('detalleVenta.index') }}">Detalle Ventas</a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded mb-2" href="{{ route('ventas.index') }}">Venta</a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded mb-2" href="{{ route('abastecimiento.index') }}">Abastecimiento</a>
                        </li>                       
                        @can(['administrador']) 
                            <li>
                                <a class="dropdown-item rounded mb-2" href="{{ route('usuarios.index') }}">Usuarios</a>
                            </li>
                        @endcan 
                    </ul>
                </div>
                <li class="navbar nav-item btn-group dropup  ms-3">
                    <a class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                        Perfil
                    </a>
                    <ul class="dropdown-menu p-1 ms-auto" >
                        <li>
                            <a class="dropdown-item" href=""
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar sesion
                            </a>
                            <form id="logout-form" action="{{route('logout')}}" method="post">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>      
            </div>
        </div>
    </nav> 

    <h1 class="text-center mt-4">@yield('titulo')</h1>
    <div class="my-3 container">
        @yield('content')
    </div>

    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
    @yield('scripts')
    @livewireScripts
</body>
</html>