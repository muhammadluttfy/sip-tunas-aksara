@extends('layouts.app')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Feedback</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Semua Feedback</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-12 col-lg-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Feedback - KB Tunas Aksara</h6>
                    <hr />
                    <div class="card radius-10">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center border-bottom pb-2">
                                    <img src="assets/images/avatars/avatar-8.png" class="rounded-circle p-1 border"
                                        width="90" height="90" alt="...">
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mt-0 mb-1">Muhammad Lutfi</h5>
                                        Masukan yang berhubungan dengan peserta didik maupun kinerja tenaga pendidik disini
                                        ya ges yak
                                    </div>
                                    <div class="flex-grow-1 ms-5">
                                        <a href="#" class="mx-md-1 delete">
                                            <span class="badge bg-danger"><i class='bx bxs-trash'></i> Delete</span>
                                        </a>
                                        <a href="#" class="mx-md-1 delete">
                                            <span class="badge bg-success"><i class='lni lni-whatsapp'></i> Follow Up</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center my-4 border-bottom pb-2">
                                    <img src="assets/images/avatars/avatar-9.png" class="rounded-circle p-1 border"
                                        width="90" height="90" alt="...">
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mt-0 mb-1">Edi Kurniawan</h5>
                                        Yokk bisa yok skripsi, semangat ya ges !!
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
