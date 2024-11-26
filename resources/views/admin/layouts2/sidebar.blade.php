

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <!-- Branding -->
        <div class="sidebar-brand">
            <a href="{{ url('/home') }}">Maria Goretti </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/home') }}">MG</a>
        </div>

        <!-- Menu -->
        <ul class="sidebar-menu">
            <!-- Header -->
            <li class="menu-header">MENU</li>

            <!-- Gestión de Personal -->
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

            <!-- Tablas de Uso -->
            <li class="menu-header">USO</li>
            <li class="dropdown">
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
                    @role('Usuario')
                    <li class="{{ Request::is('sucursal*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/sucursal') }}">Sucursal</a>
                    </li>
                    <li class="{{ Request::is('categoria*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/categoria') }}">Categoria</a>
                    </li>
                    @endrole
                </ul>
            </li>
        </ul>
    </aside>
</div>
