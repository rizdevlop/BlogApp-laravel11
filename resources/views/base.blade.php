<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/blog-logo-small.png') }}">

    <link href={{ asset('libs/chartist/chartist.min.css') }} rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="{{ asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
    <!-- Plugins css -->
    <link href="{{ asset('libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/custom.css') }}>

</head>

<body data-sidebar="dark" data-topbar="light">
    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="dashboard" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('images/blog-logo-small.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('images/blog.png') }}" alt="" height="25">
                            </span>
                        </a>

                        <a href="dashboard" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('images/blog-logo-small.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('images/blog.png') }}" alt="" height="25">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        {{-- <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @props(['user'])
                            @php
                                $fotoProfil = $user->foto
                                    ? asset('users/' . $user->foto)
                                    : asset('assets/images/users/img-default.png');
                            @endphp
                            <img class="rounded-circle header-profile-user" src="{{ $fotoProfil }}" alt="Foto Profil">
                        </button> --}}
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i
                                    class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profil</a>
                            {{-- <a class="dropdown-item" href="/change-password"><i
                                    class="mdi mdi-lock font-size-17 align-middle me-1"></i> Ganti Kata Sandi</a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="/logout"><i
                                    class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Keluar</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-cog-outline"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        @include('sidebar')



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4">
                                <div class="float-end d-none d-md-block">
                                </div>
                            </div>
                            <div class="col-12">
                                @yield('konten')
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Veltrix<span class="d-none d-sm-inline-block"> - Created <i
                                    class="mdi mdi-heart text-danger"></i> by Riznal Ahya.</span>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Pengaturan</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center">Pilih Tema</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="{{ asset('images/layouts/layout-1.jpg') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Terang</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('images/layouts/layout-2.jpg') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="{{ asset('css/bootstrap-dark.min.css') }}"
                        data-appStyle="{{ asset('css/app-dark.min.css') }}" />
                    <label class="form-check-label" for="dark-mode-switch">Gelap</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('images/layouts/layout-3.jpg') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-5">
                    <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="{{ asset('css/app-rtl.min.css') }}" />
                    <label class="form-check-label" for="rtl-mode-switch">Mode RTL</label>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>


    <!-- Required datatable js -->
    <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Fontawesome Icons Init -->
    <script src="https://kit.fontawesome.com/91441035a6.js" crossorigin="anonymous"></script>

        <!-- Peity chart-->
        <script src={{ asset('libs/peity/jquery.peity.min.js') }}></script>

    // matiin dropzone.js
    {{-- <!-- Plugins js -->
    <script src="assets/libs/dropzone/min/dropzone.min.js"></script> --}}

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

        {{-- Morris Chart --}}
        <script src={{ asset('libs/morris.js/morris.min.js') }}></script>
        <script src={{ asset('libs/raphael/raphael.min.js') }}></script>


    <!-- DataTable Indo vs -->
    <script>
    $(document).ready(function(){
    $("#datatable").DataTable({
        lengthChange: true,
        language: {
            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ data",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
            "sInfoFiltered": "(disaring dari _MAX_ total data)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        }
    });
});
</script>

    <!--Sweetallert-->
    <script>
        function deleteConfirmation(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data yang telah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect atau kirim permintaan penghapusan ke server
                    // Misalnya:
                    window.location.href = '/mitra/delete/' + id;
                }
            })
        }
    </script>
    <script>
        // Fungsi untuk menampilkan SweetAlert konfirmasi
        function showConfirmation() {
            Swal.fire({
                title: 'Data Mitra Berhasil Ditambahkan!',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500 // Waktu tampilan pesan (dalam milidetik)
            });
        }
    </script>
    <script>
        // Fungsi untuk menampilkan SweetAlert konfirmasi
        function showEditConfirmation() {
            Swal.fire({
                title: 'Data Mitra Berhasil Diedit!',
                icon: 'success',
                showConfirmButton: true,
                timer: 1500 // Waktu tampilan pesan (dalam milidetik)
            });
        }
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Sukses!",
                text: "{{ session('success') }}",
                icon: "success"
            })
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error"
            })
        </script>
    @endif
    @stack('script')
</body>
</html>
