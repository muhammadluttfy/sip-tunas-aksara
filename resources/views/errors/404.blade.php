@extends('layouts.front.app')

@section('style')
    {{-- Wizard Style --}}
    <link href="{{ asset('assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="error-404 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="py-5 card">
                <div class="row g-0">
                    <div class="col col-xl-5">
                        <div class="p-4 card-body">
                            <h1 class="display-1"><span class="text-primary">4</span><span class="text-danger">0</span><span
                                    class="text-success">4</span></h1>
                            <h2 class="font-weight-bold display-4">Halaman Tidak Ditemukan</h2>
                            <p>Halaman yang Anda cari tidak ditemukan atau mungkin
                                <br>pemilik website sudah menghapus halaman ini.
                            </p>
                            <div class="mt-5"> <a href="{{ route('dashboard') }}"
                                    class="btn btn-primary btn-lg px-md-5 radius-30">Kembali ke Dashboard</a>
                                {{-- <a href="javascript:;"
                                        class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <img src="https://cdn.searchenginejournal.com/wp-content/uploads/2019/03/shutterstock_1338315902.png"
                            class="img-fluid" alt="">
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
@endsection
