<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
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
    <title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="my-5 d-flex align-items-center justify-content-center my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="mx-auto col">
                        <div class="my-4 text-center">
                            <img src="{{ asset('assets/images/logo-img.png') }}" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="p-4 border rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign Up</h3>
                                        <p>Already have an account? <a href="authentication-signin.html">Sign in
                                                here</a>
                                        </p>
                                    </div>
                                    <div class="mb-4 text-center login-separater"> <span>OR SIGN UP WITH EMAIL</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">
                                        <form action="{{ route('register.store') }}" method="POST"
                                            class="row g-3">
                                            @csrf
                                            <div class="col-sm-12">
                                                <label for="name" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap"
                                                    id="nama_lengkap" placeholder="Nama Lengkap"
                                                    value="{{ old('nama_lengkap') }}">
                                                @error('nama_lengkap')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="email" class="form-label">Email
                                                    Address</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="example@user.com" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <select class="form-select" name="jabatan" id="jabatan" required>
                                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Sekretaris">Sekretaris</option>
                                                    <option value="Bendahara">Bendahara</option>
                                                    <option value="Guru">Guru</option>
                                                    <option value="Peserta Didik">Peserta Didik</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="name" class="form-label">Instagram</label>
                                                <input type="text" class="form-control" name="instagram"
                                                    id="instagram" placeholder="Username"
                                                    value="{{ old('instagram') }}">
                                                @error('instagram')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="name" class="form-label">Facebook</label>
                                                <input type="text" class="form-control" name="facebook" id="facebook"
                                                    placeholder="Username" value="{{ old('facebook') }}">
                                                @error('facebook')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="name" class="form-label">Whatsapp</label>
                                                <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                                    placeholder="No. Whatsapp" value="{{ old('whatsapp') }}">
                                                @error('whatsapp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        name="password" id="password" placeholder="Enter Password"> <a
                                                        href="javascript:;" class="bg-transparent input-group-text"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            {{-- <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">I read
                                                        and agree to Terms & Conditions</label>
                                                </div>
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class='bx bx-user'></i>Sign up</button>
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
    <script src="{{ asset('ssets/js/app.js') }}a"></script>
</body>

</html>
