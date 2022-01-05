<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src=" {{asset('AdminLTE/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Gustavo Botero</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href=" {{Route('pets.index')}} " class="nav-link @yield('pets')">
                    <i class="fas fa-paw"></i>
                    <span>Mascotas</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>