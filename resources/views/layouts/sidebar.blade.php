<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="index.html"><img src="../../assets/images/logo/pfplen.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title" style="
                text-align: center;
                font-weight: bold;
                font-size: 1.2rem;
                color: #4CAF50;
                background-color: #f9f9f9;
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 15px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
  {{Auth::user()->name}} - {{Auth::user()->role}}            </li>
                <li class="sidebar-title">Menu Utama</li>
                <li class="sidebar-item  ">
                    <a href="/" class='sidebar-link'>
                        <i class="bi bi-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="/user" class='sidebar-link'>
                        <i class="bi bi-person-circle"></i>
                        <span>Data Admin</span>
                    </a>
                </li>


                <li class="sidebar-item  ">
                    <a href="/kelengkapanadministrasi" class='sidebar-link'>
                        <i class="bi bi-file-earmark-lock"></i>
                        <span>Kelengkapan Administrasi</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="/onboarding" class='sidebar-link'>
                        <i class="bi bi-list-check"></i>
                        <span>On Boarding</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="/peserta" class='sidebar-link'>
                        <i class="bi bi-person-check"></i>
                        <span>Kelola Peserta Aktif</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="/peserta/nonaktif" class='sidebar-link'>
                        <i class="bi bi-person-dash"></i>
                        <span>Kelola Peserta Nonaktif</span>
                    </a>
                </li>


                <li class="sidebar-item  ">
                    <a href="/absensi" class='sidebar-link'>
                        <i class="bi bi-brightness-alt-high"></i>
                        <span>Absensi Peserta</span>
                    </a>
                </li>


                <li class="sidebar-item  ">
                    <a href="/maintenance" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Rekap Maintenance</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <button type="submit" id="logout-btn" class="sidebar-link btn btn-danger w-100 text-start d-flex align-items-center gap-2">
                        <i class="bi bi-box-arrow-left"></i> Logout
                    </button>
                </li>


                {{-- <li class="sidebar-item">
                    <a href="#" id="logout-btn"  class="btn btn-danger">Logout</a>
                </li> --}}

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
