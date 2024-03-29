@extends('layouts.front.app')

@section('content')
    <div class="mb-5 section-authentication-signin d-flex align-items-center justify-content-center">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="mx-auto col">
                    <div class="my-4 logo d-flex justify-content-center">
                        <img src="{{ asset('assets/images/logo-img.svg') }}" class="img-fluid" alt="Logo PAUD Tunas Aksara"
                            style="width: 300px">
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
                                    <div class="py-2 border-0 alert alert-success bg-success alert-dismissible fade show">
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
                                    <div class="py-2 border-0 alert alert-danger bg-danger alert-dismissible fade show">
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
                                                name="no_identitas" id="no_identitas" placeholder="Masukkan Nomor Identitas"
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
                                                <input type="password" class="form-control border-end-0" name="password"
                                                    id="password" placeholder="Masukkan Password">
                                                <a href="javascript:;" class="bg-transparent input-group-text"></a>
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
                                        <div class="col-md-6 text-end">
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Lupa Password ?
                                            </button>

                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Lupa Password ?
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a href="https://wa.me/6285299848346">Hubungi Admin</a> jika
                                                            kamu mengalami lupa password / sandi akun SIM PAUD Tunas Aksara
                                                            !
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection

@section('script')
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
@endsection
