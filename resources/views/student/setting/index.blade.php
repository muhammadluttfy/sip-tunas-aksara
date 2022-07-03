{{-- {{ dd($user) }} --}}
@extends('layouts.app')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="row">
                <div class=" ms-auto col-md-5">
                    @if (session()->has('success'))
                        <div class="py-2 border-0 alert alert-success bg-success alert-dismissible fade show">
                            <div class="d-flex align-items-center">
                                <div class="text-white font-35"><i class='bx bxs-check-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Selamat!</h6>
                                    <div class="text-white">{{ session()->get('success') }}</div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="py-2 border-0 alert alert-danger bg-danger alert-dismissible fade show">
                            <div class="d-flex align-items-center">
                                <div class="text-white font-35"><i class='bx bxs-check-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Selamat!</h6>
                                    <div class="text-white">{{ session()->get('error') }}</div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">Ubah Password</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $user->nama_lengkap }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center d-flex flex-column align-items-center">
                                        @if ($user->avatar == null)
                                            <img src="{{ asset('assets/images/avatars/avatar-default.jpg') }}"
                                                alt="{{ $user->nama_lengkap }}"
                                                class="p-1 rounded-circle bg-{{ $color }}" width="110">
                                        @else
                                            <img src="{{ asset('storage/' . $user->avatar) }}"
                                                alt="{{ $user->nama_lengkap }}"
                                                class="p-1 rounded-circle bg-{{ $color }}" width="110">
                                        @endif

                                        <div class="mt-3">
                                            <h4>{{ $user->nama_lengkap }}</h4>
                                            <p class="mb-1 text-secondary">
                                                {{ $user->no_identitas }}</p>
                                        </div>
                                    </div>
                                    <hr class="my-4" />

                                    @if (Str::length(Auth::guard('student')->user()) > 0)
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0">
                                                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24">
                                                        <path
                                                            d="M20 12.875v5.068c0 2.754-5.789 4.057-9 4.057-3.052 0-9-1.392-9-4.057v-6.294l9 4.863 9-3.637zm-8.083-10.875l-12.917 5.75 12 6.5 11-4.417v7.167h2v-8.25l-12.083-6.75zm13.083 20h-4c.578-1 1-2.5 1-4h2c0 1.516.391 2.859 1 4z" />
                                                    </svg>
                                                    Jenjang Pendidikan
                                                </h6>
                                                <span
                                                    class="text-secondary">{{ $user->level->jenjang_pendidikan }}</span>
                                            </li>

                                            <li
                                                class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0">
                                                    <svg class="me-1" width="24" height="24"
                                                        xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                                        clip-rule="evenodd">
                                                        <path
                                                            d="M13 2h2v2h1v19h1v-15l6 3v12h1v1h-24v-1h1v-11h7v11h1v-19h1v-2h2v-2h1v2zm8 21v-2h-2v2h2zm-15 0v-2h-3v2h3zm8 0v-2h-3v2h3zm-2-4v-13h-1v13h1zm9 0v-1h-2v1h2zm-18 0v-2h-1v2h1zm4 0v-2h-1v2h1zm-2 0v-2h-1v2h1zm9 0v-13h-1v13h1zm7-2v-1h-2v1h2zm-18-1v-2h-1v2h1zm2 0v-2h-1v2h1zm2 0v-2h-1v2h1zm14-1v-1h-2v1h2zm0-2.139v-1h-2v1h2z" />
                                                    </svg>
                                                    Semester
                                                </h6>
                                                <span class="text-secondary">Semester {{ $semester }}</span>
                                            </li>
                                        </ul>
                                    @else
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-globe me-2 icon-inline">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="2" y1="12" x2="22" y2="12">
                                                        </line>
                                                        <path
                                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                                        </path>
                                                    </svg>Jabatan</h6>
                                                <span class="text-secondary">{{ $user->role }}</span>
                                            </li>

                                            <li
                                                class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-instagram me-2 icon-inline text-danger">
                                                        <rect x="2" y="2" width="20"
                                                            height="20" rx="5" ry="5"></rect>
                                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                        <line x1="17.5" y1="6.5" x2="17.51"
                                                            y2="6.5"></line>
                                                    </svg>
                                                    Instagram
                                                </h6>
                                                <span class="text-secondary">{{ $user->social_media->instagram }}</span>
                                            </li>

                                            <li
                                                class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-facebook me-2 icon-inline text-primary">
                                                        <path
                                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                        </path>
                                                    </svg>
                                                    Facebook
                                                </h6>
                                                <span class="text-secondary">{{ $user->social_media->facebook }}</span>
                                            </li>

                                            <li
                                                class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0">
                                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24">
                                                        <path
                                                            d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                                    </svg>
                                                    Whatsapp
                                                </h6>
                                                <span class="text-secondary">{{ $user->social_media->whatsapp }}</span>
                                            </li>
                                        </ul>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('settings.password.update') }}" method="post">
                                        @csrf
                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Password Lama</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    name="current_password" id="current_password" />

                                                @error('current_password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Password Baru</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" id="password"" />

                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Konfirmasi Password Baru</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" id="password_confirmation"" />

                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="px-4 btn btn-primary"
                                                    value="Update Password" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
