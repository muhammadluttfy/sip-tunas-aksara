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

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Sales Overview</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                                            class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gap-2 my-3 d-flex align-items-center ms-auto font-13">
                                <span class="px-1 border rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                        style="color: #14abef"></i>Sales</span>
                                <span class="px-1 border rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                        style="color: #ffc107"></i>Visits</span>
                            </div>
                            <div class="chart-container-1">
                                <canvas id="chart1"></canvas>
                            </div>
                        </div>
                        <div class="text-center row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group border-top">
                            <div class="col">
                                <div class="p-3">
                                    <h5 class="mb-0">24.15M</h5>
                                    <small class="mb-0">Overall Visitor <span> <i
                                                class="align-middle bx bx-up-arrow-alt"></i> 2.43%</span></small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3">
                                    <h5 class="mb-0">12:38</h5>
                                    <small class="mb-0">Visitor Duration <span> <i
                                                class="align-middle bx bx-up-arrow-alt"></i> 12.65%</span></small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3">
                                    <h5 class="mb-0">639.82</h5>
                                    <small class="mb-0">Pages/Visit <span> <i
                                                class="align-middle bx bx-up-arrow-alt"></i> 5.62%</span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Trending Products</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                                            class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-4 chart-container-2">
                                <canvas id="chart2"></canvas>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="bg-transparent list-group-item d-flex justify-content-between align-items-center">
                                Jeans <span class="badge bg-success rounded-pill">25</span>
                            </li>
                            <li class="bg-transparent list-group-item d-flex justify-content-between align-items-center">
                                T-Shirts <span class="badge bg-danger rounded-pill">10</span>
                            </li>
                            <li class="bg-transparent list-group-item d-flex justify-content-between align-items-center">
                                Shoes <span class="badge bg-primary rounded-pill">65</span>
                            </li>
                            <li class="bg-transparent list-group-item d-flex justify-content-between align-items-center">
                                Lingerie <span class="badge bg-warning text-dark rounded-pill">14</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
