<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url ('/') }}" class="brand-link">
      <img src="{{ asset ('template') }}/dist/img/dinsos.png" alt="Logo Dinsos" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PUSKESOS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset ('template') }}/dist/img/admin1.jpg" class="img-circle elevation-2" alt="Admin Image">
        </div>
        <div class="info">
          <a href="{{ url ('/') }}" class="d-block">ADMIN PUSKESOS</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="active">
                <a href="{{ url ('/')}}" class="nav-link">
                    <i class="fas fa-home"></i>
                  <p class="text">Beranda</p>
                </a>
            </li>

          <li class="{{ request()->is('index_pengajuan') ? 'active' : '' }}">
            <a href="{{ url ('/pengajuan')}}" class="nav-link">
                <i class="fas fa-folder-plus"></i>
              <p class="text">Data Pengajuan</p>
            </a>
          </li>
          <li class="{{ request()->is('laporan') ? 'active' : '' }}">
            <a href="{{ url ('/laporan') }}" class="nav-link">
                <i class="fas fa-chart-bar"></i>
              <p class="text">Laporan</p>
            </a>
          </li>
          <li class="{{ request()->is('akun') ? 'active' : '' }}">
            <a href="{{ url('/akun') }}" class="nav-link">
                <i class="fas fa-user-cog"></i>
              <p class="text">Akun Admin</p>
            </a>
          </li>
          <li class="{{ request()->is('contact') ? 'active' : '' }}">
            <a href="{{ url('/contact') }}" class="nav-link">
                <i class="fas fa-phone"></i>
              <p class="text">Kontak Kami</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
