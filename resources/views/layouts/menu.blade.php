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
        <a class="nav-link dropdown-toggle text-logo" href="#" id="navbarDropdown2" role="button"
            data-toggle="dropdown" aria-haspopup="true " aria-expanded="false">
            <i class="text-logo fas fa-user"></i><span class="text-logo">Modulo Adultos Mayores</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <a class="{{ Request::is('adulto/create') ? 'bg-info' : 'bg-white' }}" href="{{ url('adulto/create') }}">
                <i class="text-logo fas fa-user-plus"></i><span class="text-logo">Nuevo Adulto</span>
            </a>
            <a class="{{ Request::is('adulto') ? 'bg-info' : 'bg-white' }}" href="{{ route('adulto.index') }}">
                <i class="text-logo fas fa-users"></i><span class="text-logo">LIsta de adultos</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Eliminados</a>
        </div>
    @endcan


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
