<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="{{ Request::is('home*') ? 'bg-success' : 'bg-white' }}" href="{{ route('home') }}">
        <i class="text-logo fas fa-building"></i><span class="text-logo">Panel de control</span>
    </a>

    @can('ver-adulto')
        <a class="nav-link dropdown-toggle text-logo" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown"
            aria-haspopup="true " aria-expanded="false">
            <i class="text-logo fas fa-user"></i><span class="text-logo">Modulo Adultos Mayores</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            @can('crear-adulto')
                <a class="{{ Request::is('adulto/create') ? 'bg-info' : 'bg-white' }}" href="{{ url('adulto/create') }}">
                    <i class="text-logo fas fa-user-plus"></i><span class="text-logo">Nuevo Adulto</span>
                </a>
            @endcan
            <a class="{{ Request::is('adulto') ? 'bg-info' : 'bg-white' }}" href="{{ route('adulto.index') }}">
                <i class="text-logo fas fa-users"></i><span class="text-logo">Lista de adultos</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="{{ Request::is('adulto/inactivo') ? 'bg-info' : 'bg-white' }}" href="{{ route('adulto.inactivo') }}">
                <i class="text-logo fas fa-users-slash"></i><span class="text-logo">Lista de egresados</span>
            </a>
        </div>
    @endcan
</li>


<!-- MENU PERSONAL-->
@can('ver-personal')
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle text-logo" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
            aria-haspopup="true " aria-expanded="false">
            <i class="text-logo fas fa-user-nurse"></i><span class="text-logo">Modulo Personal</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
        @can('crear-personal')
        <a class="{{ Request::is('personal/create') ? 'bg-success' : 'bg-white' }}" href="{{ url('personal/create') }}">
            <i class="text-logo fas fa-user-plus"></i><span class="text-logo">Nuevo Personal</span>
        </a>
        @endcan
         <a class="{{ Request::is('personal') ? 'bg-success' : 'bg-white' }}" href="{{ route('personal.index') }}">
            <i class="text-logo fas fa-users"></i><span class="text-logo">Lista Personal</span>
        </a>
        <a class="{{ Request::is('perosnal/inactivo') ? 'bg-success' : 'bg-white' }}" href="{{ route('personal.inactivo') }}">
        <i class="text-logo fas fa-users-slash"></i><span class="text-logo">Personal Egresado</span>
        </a>
        </div> 
</li>
@endcan


<!-- MENU ADMIN-->
@can('ver-usuario')
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle text-logo" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown"
            aria-haspopup="true " aria-expanded="false">
            <i class="text-logo fas fa-wrench"></i><span class="text-logo">Gestor Admin</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
        <a class="{{ Request::is('usuarios*') ? 'bg-success' : 'bg-white' }}" href="{{ route('usuarios.index') }}">
            <i class="text-logo fas fa-users"></i><span class="text-logo">Usuarios</span>
        </a>
    
    @can('ver-rol')
        <a class="{{ Request::is('roles*') ? 'bg-success' : 'bg-white' }}" href="{{ route('roles.index') }}">
            <i class="text-logo fas fa-user-lock"></i><span class="text-logo">Roles</span>
        </a>
    @endcan
        </div>
</li>
@endcan

<style>
    .color-logo {
        background-color: #8e0432;
        color: #8e0432;
    }

    .text-logo {
        color: #8e0432;
    }
</style>
