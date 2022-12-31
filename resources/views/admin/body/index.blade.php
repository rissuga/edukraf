<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - EDUKRAF</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">


    <!-- Font Nunito from Googla Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,900&display=swap" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom styles for this page -->
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.body.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.body.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- content -->
                    @yield('content')
                    <!-- content-wrapper ends -->


                </div>
                <!-- End of Main Content -->
                <div class="spasi" style="height: 200px">

                </div>

            </div>
            <!-- End of Content Wrapper -->

            <!-- Footer -->
            @include('admin.body.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('admin.logout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('backend/js/demo/chart-pie-demo.js') }}"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript">
            $(function() {
                $(document).on('click', '#delete', function(e) {
                    e.preventDefault();
                    var link = $(this).attr("href");

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Hapus!',
                                'Data Anda telah dihapus.',
                                'sukses'
                            )
                        }
                    });

                });
            });
        </script>


        <!-- Toastr -->
        <script>
            @if (Session::has('message'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('message') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ session('error') }}");
            @endif

            @if (Session::has('info'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.info("{{ session('info') }}");
            @endif

            @if (Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.warning("{{ session('warning') }}");
            @endif
        </script>



</body>

</html>
