<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="{{ Request::is('home*') ? 'bg-success' : 'bg-white' }}" href="{{ route('home') }}">
        <i class="text-logo fas fa-building"></i><span class="text-logo">Dashboard</span>
    </a>
    @can('ver-usuario')
        <a class="{{ Request::is('usuarios*') ? 'bg-success' : 'bg-white' }}" href="{{ route('usuarios.index') }}">
            <i class="text-logo fas fa-users"></i><span class="text-logo">Usuarios</span>
        </a>
    @endcan
    @can('ver-rol')
        <a class="{{ Request::is('roles*') ? 'bg-success' : 'bg-white' }}" href="{{ route('roles.index') }}">
            <i class="text-logo fas fa-user-lock"></i><span class="text-logo">Roles</span>
        </a>
    @endcan
    @can('ver-adulto')
    <a class="{{ Request::is('adulto*') ? 'bg-success' : 'bg-white' }}" href="{{ route('adulto.index') }}">
        <i class="text-logo fas fa-hiking"></i><span class="text-logo">Lista de Adultos</span>
    </a>
    @endcan
 
    
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Adultos
    </a>
    <div class="dropdown-menu show" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Opción 1</a>
        <a class="dropdown-item" href="#">Opción 2</a>
        <!-- Agrega más opciones de menú según sea necesario -->
    </div>
    
    

</li>




<style>
    .color-logo {
        background-color: #8e0432;
        color: #8e0432;
    }

    .text-logo {
        color: #8e0432;
    }

</style>
