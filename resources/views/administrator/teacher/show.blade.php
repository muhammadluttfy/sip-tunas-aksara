@extends('layouts.app')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">Detail</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $teacher->nama_lengkap }}</li>
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
                                        <img src="{{ asset('assets/images/avatars/avatar-default.jpg') }}"
                                            alt="{{ $teacher->nama_lengkap }}" class="p-1 rounded-circle bg-primary"
                                            width="110">
                                        <div class="mt-3">
                                            <h4>{{ $teacher->nama_lengkap }}</h4>
                                            {{-- <p class="mb-1 text-secondary">{{ $teacher->role }}</p> --}}
                                            <p class="text-muted font-size-sm">{{ $teacher->role }}</p>
                                            {{-- <button class="btn btn-primary">Follow</button>
                                            <button class="btn btn-outline-primary">Message</button> --}}
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                            <h6 class="mb-2 mb-md-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-instagram me-2 icon-inline text-danger">
                                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                </svg>Instagram</h6>
                                            <span class="text-secondary">{{ $teacher->social_media->instagram }}</span>
                                        </li>
                                        <li
                                            class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                            <h6 class="mb-2 mb-md-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-facebook me-2 icon-inline text-primary">
                                                    <path
                                                        d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                    </path>
                                                </svg>Facebook</h6>
                                            <span class="text-secondary">{{ $teacher->social_media->facebook }}</span>
                                        </li>
                                        <li
                                            class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                            <h6 class="mb-2 mb-md-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-twitter me-2 icon-inline text-info">
                                                    <path
                                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                    </path>
                                                </svg>Twitter</h6>
                                            <span class="text-secondary">@codervent</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-2 mb-md-0">Nama Lengkap</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $teacher->nama_lengkap }}"
                                                disabled />
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-2 mb-md-0">Jabatan</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $teacher->role }}"
                                                disabled />
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-2 mb-md-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $teacher->email }}"
                                                disabled />
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-2 mb-md-0">No. Identitas</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $teacher->no_identitas }}" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
