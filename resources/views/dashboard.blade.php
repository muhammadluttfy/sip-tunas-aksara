@extends('layouts.app')
@section('style')
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="border-0 card radius-10 border-start border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">KB Tunas Aksara</p>
                                    <h4 class="my-1 text-info">{{ $kb_student }}</h4>
                                    <p class="mb-0 font-13">Peserta Didik</p>
                                </div>
                                <div class="text-white widgets-icons-2 rounded-circle bg-gradient-scooter ms-auto"><i
                                        class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="border-0 card radius-10 border-start border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">PAUD Tunas Aksara</p>
                                    <h4 class="my-1 text-danger">{{ $tk_student }}</h4>
                                    <p class="mb-0 font-13">Peserta Didik</p>
                                </div>
                                <div class="text-white widgets-icons-2 rounded-circle bg-gradient-bloody ms-auto"><i
                                        class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="border-0 card radius-10 border-start border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Pengajar</p>
                                    <h4 class="my-1 text-success">{{ $count_teachers }}</h4>
                                    <p class="mb-0 font-13">Tenaga Pendidik</p>
                                </div>
                                <div class="text-white widgets-icons-2 rounded-circle bg-gradient-ohhappiness ms-auto"><i
                                        class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="border-0 card radius-10 border-start border-3 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Lulus</p>
                                    <h4 class="my-1 text-warning">{{ $count_graduated }}</h4>
                                    <p class="mb-0 font-13">Peserta Didik Lulus</p>
                                </div>
                                <div class="text-white widgets-icons-2 rounded-circle bg-gradient-blooker ms-auto"><i
                                        class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->


            @if (Auth::user()->role == 'Administrator')
                <div class="row">
                    <div class="container">
                        <div class="main-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card radius-10">
                                        <div class="card-body">
                                            <div class="text-center d-flex flex-column align-items-center">
                                                @if ($user->avatar == null)
                                                    <img src="{{ asset('assets/images/avatars/avatar-default.jpg') }}"
                                                        alt="{{ $user->nama_lengkap }}"
                                                        class="p-1 rounded-circle bg-gradient-scooter" width="110">
                                                @else
                                                    <img src="{{ asset('storage/' . $user->avatar) }}"
                                                        alt="{{ $user->nama_lengkap }}"
                                                        class="p-1 rounded-circle bg-gradient-scooter" width="110">
                                                @endif
                                            </div>
                                            <hr class="mt-4" />

                                            <ul class="gap-1 list-group list-group-flush">
                                                <li
                                                    class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">
                                                        No Identitas
                                                    </h6>
                                                    <span class="text-secondary">{{ $user->no_identitas }}</span>
                                                </li>

                                                <li
                                                    class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">
                                                        Nama Lengkap
                                                    </h6>
                                                    <span class="text-secondary">{{ $user->nama_lengkap }}</span>
                                                </li>

                                                <li
                                                    class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">
                                                        Jabatan
                                                    </h6>
                                                    <span class="text-secondary">{{ $user->jabatan }}</span>
                                                </li>

                                                <li
                                                    class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">
                                                        Username
                                                    </h6>
                                                    <span class="text-secondary">{{ $user->username }}</span>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--end row-->


            @if (Auth::user()->role == 'Student')
                <div class="row">
                    <div class="container">
                        <div class="main-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card radius-10">
                                        <div class="card-body">
                                            <div class="text-center d-flex flex-column align-items-center">
                                                @if ($user->avatar == null)
                                                    <img src="{{ asset('assets/images/avatars/avatar-default.jpg') }}"
                                                        alt="{{ $user->nama_lengkap }}"
                                                        class="p-1 rounded-circle bg-gradient-scooter" width="110">
                                                @else
                                                    <img src="{{ asset('storage/' . $user->avatar) }}"
                                                        alt="{{ $user->nama_lengkap }}"
                                                        class="p-1 rounded-circle bg-gradient-scooter" width="110">
                                                @endif
                                            </div>
                                            <hr class="mt-4" />

                                            <ul class="gap-1 list-group list-group-flush">
                                                <li
                                                    class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">
                                                        No Identitas
                                                    </h6>
                                                    <span class="text-secondary">{{ $user->no_identitas }}</span>
                                                </li>

                                                <li
                                                    class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">
                                                        Nama Lengkap
                                                    </h6>
                                                    <span class="text-secondary">{{ $user->nama_lengkap }}</span>
                                                </li>

                                                <li
                                                    class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">
                                                        Nama Panggilan
                                                    </h6>
                                                    <span
                                                        class="text-secondary">{{ $user->student_detail->nama_panggilan }}</span>
                                                </li>

                                                <li
                                                    class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">
                                                        Username
                                                    </h6>
                                                    <span class="text-secondary">{{ $user->username }}</span>
                                                </li>

                                                <li
                                                    class="flex-wrap list-group-item d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">
                                                        Kelompok
                                                    </h6>
                                                    <span class="text-secondary">Kelompok
                                                        {{ $user->student_detail->kelompok }}</span>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="card radius-10">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div
                                                            class="mx-auto mb-3 widgets-icons rounded-circle bg-light-primary text-primary">
                                                            <i class='lni lni-graduation'></i>
                                                        </div>
                                                        <h5 class="my-1">{{ $user->level->jenjang_pendidikan }}</h5>
                                                        <p class="mb-0 text-secondary">Jenjang Pendidikan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-6 col-md-4">
                                            <div class="card radius-10">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div
                                                            class="mx-auto mb-3 widgets-icons rounded-circle bg-light-danger text-danger">
                                                            <i class='fadeIn animated bx bx-buildings'></i>
                                                        </div>
                                                        <h5 class="my-1">Semester {{ $semester }}</h5>
                                                        <p class="mb-0 text-secondary">Semester</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-6 col-md-4">
                                            <div class="card radius-10">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div
                                                            class="mx-auto mb-3 widgets-icons rounded-circle bg-light-success text-success">
                                                            <i class='lni lni-graduation'></i>
                                                        </div>
                                                        <h5 class="my-1">{{ $tahun_masuk }}</h5>
                                                        <p class="mb-0 text-secondary">Angkatan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="card radius-10">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div
                                                            class="mx-auto mb-3 widgets-icons rounded-circle bg-light-warning text-warning">
                                                            <i class='lni lni-graduation'></i>
                                                        </div>
                                                        <h5 class="my-1">{{ $tahun_lulus }}</h5>
                                                        <p class="mb-0 text-secondary">Tahun Kelulusan</p>
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
            @endif
            <!--end row-->

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
@endsection
