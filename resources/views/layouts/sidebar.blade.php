<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PT Sehat Sentosa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Menu</li>
            @if (auth()->check() && auth()->user()->role_id === 1 )
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link">
                <i class=" nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="manajemen_pegawai" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Manajemen Pegawai</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="absensi_pegawai" class="nav-link">
                <i class="nav-icon fas fa-tablet"></i>
                <p>Absensi Pegawai</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="manajemen_cuti" class="nav-link">
                <i class="nav-icon fas fa-pen"></i>
                <p>Manajemen Cuti</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="jadwal_kerja" class="nav-link">
                <i class="nav-icon far fa-clock"></i>
                <p>Jadwal Kerja</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="laporan" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Laporan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>logout</p>
              </a>
            </li>
            @endif
            @if (auth()->check() && auth()->user()->role_id === 2)
            <li class="nav-item">
                <a href="profile" class="nav-link">
                  <i class=" nav-icon fas fa-user"></i>
                  <p>Profile</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="absensi" class="nav-link">
                  <i class=" nav-icon fas fa-calendar"></i>
                  <p>Absensi Harian</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="absensi" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-check"></i>
                  <p>Pengajuan Cuti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>logout</p>
                </a>
              </li>
            @endif
            @if (auth()->check() && auth()->user()->role_id === 3)
            <li class="nav-item">
                <a href="profile" class="nav-link">
                  <i class=" nav-icon fas fa-calendar-week"></i>
                  <p>Absensi Tim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="absensi" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-check"></i>
                  <p>Persetujuan Cuti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="absensi" class="nav-link">
                  <i class=" nav-icon fas fa-folder"></i>
                  <p>Laporan Kinerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>logout</p>
                </a>
              </li>
            @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
