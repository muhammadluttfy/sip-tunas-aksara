@extends('layouts.front.app')

@section('content')
    <div class="content-center d-flex align-items-center justify-content-center mt-md-4">
        <div class="container">

            <div class="row justify-content-center">
                <div class="mx-auto col-12 col-lg-9">
                    <div class="text-center">
                        <h5 class="text-uppercase">Panduan Pendaftaran PPDB PAUD Tunas Aksara {{ date('Y') }}</h5>
                        <p><a href="https://wa.me/6285299848346">Hubungi Kami</a> jika masih kebingungan mengenai cara
                            pendaftaran.</p>
                        <hr>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Berapa biaya pendidikan di PAUD Tunas Aksara Lombok Barat ?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <p>
                                                Kamu dikenakan biaya diawal masuk sekolah sebesar
                                                <strong>Rp.***.***</strong> untuk seragam peserta didik dan biaya SPP
                                                sebesar
                                                <strong>Rp. 25.000</strong> per bulan.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Bagaimana cara melakukan pendaftaran di PAUD Tunas Aksara ?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                <strong>1: </strong><a href="{{ route('registration.index') }}"
                                                    target="_blank">Klik link
                                                    ini</a> lalu pilih program yang sesuai dengan yang ingin anda daftarkan.
                                            </p>
                                            <p>
                                                <strong>2: </strong>Isi formulir pendaftaran dengan data yang valid.
                                            </p>
                                            <p>
                                                <strong>3: </strong>Buka email untuk mendapatkan akses <a
                                                    href="{{ route('dashboard') }}">login</a> berupa username dan password
                                            </p>
                                            <p>
                                                <strong>
                                                    Catatan:
                                                </strong>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('registration.createKB') }}" target="_blank">Pilih
                                                        Program KB Tunas
                                                        Aksara</a> jika peserta didik
                                                    memulai dari awal pendidikan.
                                                </li>
                                                <li>
                                                    <a href="{{ route('registration.createTK') }}" target="_blank">Pilih
                                                        Program TK Tunas Aksara</a> jika peserta didik
                                                    sudah selesai program KB Tunas Aksara di PAUD lain dan melanjutkan TK di
                                                    PAUD Tunas Aksara.
                                                </li>
                                                <li>
                                                    <a href="{{ route('registration.createPindahan') }}"
                                                        target="_blank">Pilih Program Pindahan</a> jika peserta didik pindah
                                                    ke PAUD Tunas Aksara
                                                    saat masa pendidikan berjalan.
                                                </li>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Tonton video demo pendaftaran
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <div class="ratio ratio-16x9">
                                                {{-- <div> --}}
                                                <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/mRttyh1GQ5I"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                                {{-- </div> --}}
                                            </div>

                                            <p><strong>Example: </strong>Actually, that's still true. Well, let's just dump
                                                it in the sewer and say we delivered it.</p>
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
