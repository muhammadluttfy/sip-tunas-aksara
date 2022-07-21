<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    @if ($user->avatar)
        <link rel="icon" href="{{ asset('storage/' . $user->avatar) }}" type="image/png" />
    @else
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png" />
    @endif
    <!--plugins-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />
    <title>{{ $title }}</title>
</head>

<body>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-4">

                    <div class="card radius-15 bg-{{ $color }}">
                        <div class="text-center card-body">
                            <div class="p-4 radius-15">
                                @if ($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" width="110" height="110"
                                        class="p-1 bg-white shadow rounded-circle" alt="" />
                                @else
                                    <img src="{{ asset('assets/images/avatars/avatar-default.jpg') }}" width="110"
                                        height="110" class="p-1 bg-white shadow rounded-circle" alt="" />
                                @endif
                                <h5 class="mt-5 mb-0 text-white">{{ $user->nama_lengkap }}</h5>
                                <p class="mb-3 text-white">{{ $user->jabatan }}</p>
                                <div class="mt-3 mb-3 list-inline contacts-social">
                                    <a href="https://www.facebook.com/{{ $user->social_media->facebook }}"
                                        target="_blank" class="border-0 list-inline-item"><i
                                            class="bx bxl-facebook"></i></a>
                                    <a href="https://www.instagram.com/{{ $user->social_media->instagram }}"
                                        target="_blank" class="border-0 list-inline-item"><i
                                            class="bx bxl-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/muhammadluttfy" target="_blank"
                                        class="border-0 list-inline-item"><i class="bx bxl-linkedin"></i></a>
                                </div>
                                <div class="d-grid">
                                    <a href="https://www.instagram.com/{{ $user->social_media->instagram }}"
                                        target="_blank" class="mt-5 btn btn-white radius-15">Hubungi Saya</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
