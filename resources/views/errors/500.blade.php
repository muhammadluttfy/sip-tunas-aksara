<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <title>404 - Halam Tidak Ditemukan</title>
</head>

<body class="bg-theme bg-theme1">
    <!-- wrapper -->
    <div class="wrapper">
        <nav class="bg-white rounded shadow-sm navbar navbar-expand-lg navbar-light fixed-top rounded-0">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                    aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                        <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#"><i
                                    class='bx bx-home-alt me-1'></i>Login SIM</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="https://paudtunasaksara.com/" target="_blank"><i
                                    class='bx bx-user me-1'></i>Tentang Kami</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="#"><i
                                    class='bx bx-category-alt me-1'></i>Kalender</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="https://paudtunasaksara.com/kontak/"
                                target="_blank"><i class='bx bx-microphone me-1'></i>Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="error-404 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-xl-5">
                            <div class="p-4 card-body">
                                <h1 class="display-1"><span class="text-warning">5</span><span
                                        class="text-danger">0</span><span class="text-primary">0</span></h1>
                                <h2 class="font-weight-bold display-4">Sorry, unexpected error</h2>
                                <p>Looks like you are lost!
                                    <br>May be you are not connected to the internet!
                                </p>
                                <div class="mt-5"> <a href="{{ route('dashboard') }}"
                                        class="btn btn-primary btn-lg px-md-5 radius-30">Kembali ke Dashboard</a>
                                    {{-- <a href="javascript:;"
                                        class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <img src="assets/images/errors-images/505-error.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <div class="p-3 bg-white shadow fixed-bottom border-top">
            <div class="flex-wrap d-flex align-items-center justify-content-between">
                <ul class="mb-0 list-inline">
                    <li class="list-inline-item">Follow Us :</li>
                    <li class="list-inline-item"><a href="https://www.facebook.com/kb.i.56" target="_blank"><i
                                class='bx bxl-facebook me-1'></i>Facebook</a>
                    </li>
                    <li class="list-inline-item"><a href="javascript:;"><i
                                class='bx bxl-instagram me-1'></i>Instagram</a>
                    </li>
                    <li class="list-inline-item"><a href="mailto: tktunasaksara@gmail.com" target="_blank"><i
                                class='bx bxl-google me-1'></i>Gmail</a>
                    </li>
                </ul>
                <p class="mb-0">Copyright © 2021. All right reserved.</p>
            </div>
        </div>
    </div>
    <!-- end wrapper -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('') }}assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
