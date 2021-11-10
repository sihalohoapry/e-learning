<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin/dist/img/logo-smk.png') }}" alt="Logo SMK" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">E-LEARNING</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/logo-smk.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kelas.index') }}"
                        class="nav-link {{ (request()->is('kelas*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Kelas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mapel.index') }}"
                        class="nav-link {{ (request()->is('mapel*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Mata Pelajaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('exam.index') }}"
                        class="nav-link  {{ (request()->is('exam*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                            Ujian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('question.index') }}"
                        class="nav-link  {{ (request()->is('question*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Soal
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" id="logout">
                @csrf
                <a href="" class="nav-link" onclick="document.getElementById('logout').submit()">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
                </form>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>