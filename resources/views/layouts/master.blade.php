<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital Service - PT. Len </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../../assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/x-icon">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    {{-- @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Choices(".choices", {
                searchEnabled: true, // Mengaktifkan fitur pencarian
                itemSelectText: "", // Menghapus teks default saat memilih
                placeholder: true,
                shouldSort: false, // Menonaktifkan sorting otomatis
            });
        });
    </script>
    @endsection --}}


    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3> @yield('title')</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>

        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../../assets/js/pages/dashboard.js"></script>

    <script src="../../assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Cek table1 ada gak
        let table1 = document.querySelector('#table1');
        if (table1) {
            new simpleDatatables.DataTable(table1);
        }

    </script>

    <script src="../../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        // Handling SweetAlert2 flash messages
        @if(session('success'))
          Swal.fire({
            icon: 'success',
            title: 'BERHASIL!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 4000
          });
        @elseif(session('error'))
          Swal.fire({
            icon: 'error',
            title: 'GAGAL!',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 4000
          });
        @endif

      </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tangkap semua tombol/link yang menuju ke hapus/delete
        document.querySelectorAll('.delete-btn, a[href*="/delete"]').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Jangan langsung hapus

                const href = this.getAttribute('href') || (this.dataset.id ? `/user/${this.dataset.id}/delete` : '#');

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data akan dihapus dan tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                });
            });
        });

        // Tombol logout khusus
        const logoutBtn = document.getElementById("logout-btn");
        if (logoutBtn) {
            logoutBtn.addEventListener("click", function(event) {
                event.preventDefault();
                Swal.fire({
                    title: "Yakin ingin logout?",
                    text: "Anda harus login kembali untuk mengakses sistem.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, logout!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = this.getAttribute('href');
                    }
                });
            });
        }
    });
    </script>


<!-- Include Select2 JS -->
</body>

</html>
