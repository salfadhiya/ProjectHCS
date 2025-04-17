<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="/">
                        <img src="../../assets/images/logo/logo2.jpg" alt="Logo"
                             style="width: 200px; height: 70px; object-fit: cover; border-radius: 10px;">
                      </a>
                </div>
                <div class="toggler">
                    <a href="/" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-user" style="
                text-align: center;
                font-weight: 600;
                font-size: 1rem;
                color: #ffffff;
                background: linear-gradient(to right, #B71C1C, #D32F2F);
                padding: 14px;
                border-radius: 10px;
                margin: 15px 20px 25px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
                line-height: 1.5;
                font-family: 'Segoe UI', sans-serif;
            ">
                {{ Auth::user()->name }}<br>
                <span style="font-size: 0.85rem; font-weight: 400; color: #ffdddd;">
                    {{ Auth::user()->role }}
                </span>
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


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
