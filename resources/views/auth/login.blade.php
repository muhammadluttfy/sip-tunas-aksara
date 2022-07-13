<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <title>Login - Sistem Informasi Manajemen PAUD Tunas Aksara</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <header class="shadow login-header">
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
                            <li class="nav-item"> <a class="nav-link" href="https://paudtunasaksara.com/"
                                    target="_blank"><i class='bx bx-user me-1'></i>Tentang Kami</a>
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
        </header>
        <div class="my-5 section-authentication-signin d-flex align-items-center justify-content-center my-lg-4">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="mx-auto col">
                        <div class="my-5 logo d-flex justify-content-center">
                            <img src="{{ asset('assets/images/logo-img.svg') }}" class="img-fluid"
                                alt="Logo PAUD Tunas Aksara" style="width: 300px">
                        </div>
                        <div class="mt-5 card mt-lg-0">
                            <div class="card-body">
                                <div class="p-4 border rounded">
                                    <div class="text-center">
                                        <h5 class="">Sistem Informasi Manajemen</h5>
                                        <p>PAUD Tunas Aksara</a>
                                        </p>
                                    </div>
                                    <div class="mb-4 text-center login-separater"> <span>SEHAT - CERDAS - CERIA</span>
                                        <hr />
                                    </div>

                                    {{-- login error --}}
                                    @if (session()->has('success'))
                                        <div
                                            class="py-2 border-0 alert alert-success bg-success alert-dismissible fade show">
                                            <div class="d-flex align-items-center">
                                                <div class="text-white font-35"><i class='bx bxs-message-square-x'></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-white">Selamat</h6>
                                                    <div class="text-white">
                                                        {{ session()->get('success') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session()->has('error'))
                                        <div
                                            class="py-2 border-0 alert alert-danger bg-danger alert-dismissible fade show">
                                            <div class="d-flex align-items-center">
                                                <div class="text-white font-35"><i class='bx bxs-message-square-x'></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-white">Error</h6>
                                                    <div class="text-white">Login Anda gagal,
                                                        {{ session()->get('error') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif



                                    <div class="form-body">
                                        <form action="/login" method="POST" class="row g-3">
                                            @csrf

                                            <div class="col-12">
                                                <label for="email" class="form-label">Nomor Identitas</label>
                                                <input type="text"
                                                    class="form-control @error('no_identitas') is-invalid @enderror"
                                                    name="no_identitas" id="no_identitas"
                                                    placeholder="Masukkan Nomor Identitas"
                                                    value="{{ old('no_identitas') }}">
                                                @error('no_identitas')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        name="password" id="password"
                                                        placeholder="Masukkan Password">
                                                    <a href="javascript:;" class="bg-transparent input-group-text"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    {{-- <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Remember Me</label> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> <a
                                                    href="{{ url('authentication-forgot-password') }}">Lupa Password
                                                    ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <footer class="p-2 text-center bg-white shadow-sm border-top fixed-bottom">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
