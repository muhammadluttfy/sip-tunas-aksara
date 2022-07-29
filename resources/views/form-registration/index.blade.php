@extends('layouts.front.app')

@section('content')
    <div class="content-center d-flex align-items-center justify-content-center mt-md-4">
        <div class="container">
            <div class="row">
                <h4 class="">Pendaftaran Penerimaan Peserta Didik Baru PAUD Tunas Aksara</h4>
                <p class="mb-0">Pilih jalur penerimaan sesuai dengan keinginan dan kebutuhan Anda. <a href="">Lihat
                        Panduan</a>
                    atau <a href="">Tanya Admin</a> jika Anda kebingunan dalam proses pendaftaran.</p>
            </div>

            <hr>

            <div class="row justify-content-center">

                @foreach ($programs as $program)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="header">
                                    <div class="row d-flex">
                                        <div class="col-6">
                                            <h5 class="card-title">{{ $program->nama_program }}</h5>
                                            @if ($program->status == 'Buka')
                                                <span class="px-3 badge bg-success">{{ $program->status }}</span>
                                            @else
                                                <span class="px-3 badge bg-secondary">{{ $program->status }}</span>
                                            @endif
                                            <span class="px-3 badge bg-warning">Berbayar</span>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="#" class="px-2 border-0 badge bg-success"><i
                                                    class="bx bx-info-square me-1"></i> Info
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text text-secondary">
                                                Mulai :
                                                <br>
                                                <strong>{{ date('d F Y', strtotime($program->mulai_program)) }}</strong>
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text text-secondary">
                                                Selesai :
                                                <br>
                                                <strong>{{ date('d F Y', strtotime($program->selesai_program)) }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="/program-paud-tunas-aksara/daftar/{{ $program->slug }}"
                                        class="mt-4 btn btn-primary @if ($program->status == 'Tutup') disabled @endif">Daftar
                                        Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
