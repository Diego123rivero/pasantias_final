<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <!-- Branding -->
        <div class="sidebar-brand">
            <a href="{{ url('/home') }}">Maria Goretti</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/home') }}">MG</a>
        </div>

        <!-- Menu -->
        <ul class="sidebar-menu">
            <!-- Header -->
            <li class="menu-header">MENU</li>

            <!-- Gestión de Personal (Solo Administradores) -->
            @role('Administrador')
            <li class="dropdown {{ Request::is('register*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-fire"></i>
                    <span>Crear Usuario</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('register*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/register') }}">Usuarios</a>
                    </li>
                    <li class="{{ Request::is('asignar*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/asignar') }}">Rol</a>
                    </li>
                </ul>
            </li>
            @endrole

            <!-- Tablas de Uso -->
            <li class="dropdown {{ Request::is('item*') || Request::is('plantilla*') || Request::is('image*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Tablas de Uso</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- Opciones para Administrador -->
                    @role('Administrador')
                    <li class="{{ Request::is('item*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/item') }}">Item</a>
                    </li>
                    <li class="{{ Request::is('plantilla*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/plantilla') }}">Plantilla</a>
                    </li>

                    @endrole

                    <!-- Opciones para Usuario -->
                    @role('usuario')
                    <li class="{{ Request::is('item*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/item') }}">Item</a>
                    </li>
                    <li class="{{ Request::is('plantilla*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/plantilla') }}">Plantilla</a>
                    </li>
                   

                    @endrole
                </ul>
            </li>

        </ul>
    </aside>
</div>
