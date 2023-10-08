<aside id="sidebar-wrapper">
    <div class="sidebar-brand color-logo">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo.jpg') }}" width="65"
             alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm color-logo">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo.jpg') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>

<style>
    /* Estilo para el rectángulo verde */
    .color-logo {
        background-color: #8e0432 ;
        color: #8e0432;
    }

   
 
</style>