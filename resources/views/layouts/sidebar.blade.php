<!-- Sidebar Start -->
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">

        <!-- Sidebar Header dengan Logo -->
        <div class="sidebar-header d-flex justify-content-center align-items-center" style="height: 100px;">
            <div style="background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(8px); padding: 10px 20px; border-radius: 12px;">
                <a href="/">
                    <img src="../../assets/images/logo/logo2.jpg" alt="Logo"
                         style="width: 260px; height: auto; object-fit: contain;">
                </a>
            </div>
        </div>
        <hr style="border: 0; -top: 1px solid #dee2e6; margin: 20px 40px;">

        <div class="sidebar-menu">
            <ul class="menu">
                <!-- User Info -->
                <li class="sidebar-user mx-4 mt-2 mb-3 p-3 rounded-4 d-flex flex-column align-items-center"
                    style="background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(10px); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05); font-family: 'Segoe UI', sans-serif; border: 1px solid rgba(0, 0, 0, 0.05);">

                    <div class="mb-2">
                        <i class="bi bi-person-circle" style="font-size: 2.2rem; color: #495057;"></i>
                    </div>

                    <div style="font-weight: 600; font-size: 1rem; color: #212529;">
                        {{ Auth::user()->name }}
                    </div>

                    <div style="font-size: 0.85rem; font-weight: 400; color: #6c757d;">
                        {{ ucfirst(Auth::user()->role) }}
                    </div>
                </li>

                <!-- Navigasi Utama -->
                <li class="sidebar-title">Navigasi Utama</li>
                <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="/" class="sidebar-link">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

            {{-- admin general --}}
            @if (Auth::user()->role === 'Admin General')
                <!-- Manajemen Akun -->
                <li class="sidebar-title">Manajemen Akun</li>
                <li class="sidebar-item {{ Request::is('user') ? 'active' : '' }}">
                    <a href="/user" class="sidebar-link">
                        <i class="bi bi-person-circle"></i>
                        <span>Kelola Admin</span>
                    </a>
                </li>

                <!-- Data Peserta -->
                <li class="sidebar-title">Data Peserta</li>
                <li class="sidebar-item {{ Request::is('peserta') ? 'active' : '' }}">
                    <a href="/peserta" class="sidebar-link">
                        <i class="bi bi-person-check"></i>
                        <span>Peserta Aktif</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('peserta/nonaktif') ? 'active' : '' }}">
                    <a href="/peserta/nonaktif" class="sidebar-link">
                        <i class="bi bi-person-dash"></i>
                        <span>Peserta Tidak Aktif</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('absensi') ? 'active' : '' }}">
                    <a href="/absensi" class="sidebar-link">
                        <i class="bi bi-calendar-check"></i>
                        <span>Presensi</span>
                    </a>
                </li>

                <!-- Dokumentasi & Proses -->
                <li class="sidebar-title">Dokumentasi & Proses</li>
                <li class="sidebar-item {{ Request::is('kelengkapanadministrasi') ? 'active' : '' }}">
                    <a href="/kelengkapanadministrasi" class="sidebar-link">
                        <i class="bi bi-file-earmark-lock"></i>
                        <span>Kelengkapan Administrasi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('onboarding') ? 'active' : '' }}">
                    <a href="/onboarding" class="sidebar-link">
                        <i class="bi bi-list-check"></i>
                        <span>Proses Onboarding</span>
                    </a>
                </li>

                <!-- Laporan -->
                <li class="sidebar-title">Laporan</li>
                <li class="sidebar-item {{ Request::is('maintenance') ? 'active' : '' }}">
                    <a href="/maintenance" class="sidebar-link">
                        <i class="bi bi-tools"></i>
                        <span>Rekap Maintenance</span>
                    </a>
                </li>
                @endif


            {{-- admin IN --}}
            @if (Auth::user()->role === 'Admin IN')

            <!-- Dokumentasi & Proses -->
            <li class="sidebar-title">Dokumentasi & Proses</li>
            <li class="sidebar-item {{ Request::is('kelengkapanadministrasi') ? 'active' : '' }}">
                <a href="/kelengkapanadministrasi" class="sidebar-link">
                    <i class="bi bi-file-earmark-lock"></i>
                    <span>Kelengkapan Administrasi</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('onboarding') ? 'active' : '' }}">
                <a href="/onboarding" class="sidebar-link">
                    <i class="bi bi-list-check"></i>
                    <span>Proses Onboarding</span>
                </a>
            </li>
            @endif


              {{-- admin maintenance --}}
              @if (Auth::user()->role === 'Admin Maintenance')
              <!-- Data Peserta -->
              <li class="sidebar-title">Data Peserta</li>
              <li class="sidebar-item {{ Request::is('peserta') ? 'active' : '' }}">
                  <a href="/peserta" class="sidebar-link">
                      <i class="bi bi-person-check"></i>
                      <span>Peserta Aktif</span>
                  </a>
              </li>
              <li class="sidebar-item {{ Request::is('peserta/nonaktif') ? 'active' : '' }}">
                  <a href="/peserta/nonaktif" class="sidebar-link">
                      <i class="bi bi-person-dash"></i>
                      <span>Peserta Tidak Aktif</span>
                  </a>
              </li>
              <li class="sidebar-item {{ Request::is('absensi') ? 'active' : '' }}">
                  <a href="/absensi" class="sidebar-link">
                      <i class="bi bi-calendar-check"></i>
                      <span>Presensi</span>
                  </a>
              </li>

              <!-- Laporan -->
              <li class="sidebar-title">Laporan</li>
              <li class="sidebar-item {{ Request::is('maintenance') ? 'active' : '' }}">
                  <a href="/maintenance" class="sidebar-link">
                      <i class="bi bi-tools"></i>
                      <span>Rekap Maintenance</span>
                  </a>
              </li>
              @endif


                  {{-- admin out --}}
                  @if (Auth::user()->role === 'Admin OUT')

            <!-- Data Peserta -->
            <li class="sidebar-title">Data Peserta</li>
            <li class="sidebar-item {{ Request::is('peserta') ? 'active' : '' }}">
                <a href="/peserta" class="sidebar-link">
                    <i class="bi bi-person-check"></i>
                    <span>Peserta Aktif</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('peserta/nonaktif') ? 'active' : '' }}">
                <a href="/peserta/nonaktif" class="sidebar-link">
                    <i class="bi bi-person-dash"></i>
                    <span>Peserta Tidak Aktif</span>
                </a>
            </li>
            @endif


                <!-- Logout -->
                <li class="sidebar-title">Sistem</li>
                <li class="sidebar-item mt-4">
                    <a href="/logout" id="logout-btn" class="sidebar-link d-flex align-items-center gap-2 text-danger px-3 py-2 w-100" style="background-color: transparent; border: none; font-weight: 500; font-size: 0.95rem;">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>
    </div>
</div>
