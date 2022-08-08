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
                            <li class="breadcrumb-item"><a href="{{ route('playgroup.index') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $student->nama_lengkap }}</li>
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
                                        @if ($student->avatar)
                                            <img src="{{ asset('storage/' . $student->avatar) }}"
                                                alt="{{ $student->nama_lengkap }}"
                                                class="p-1 rounded-circle bg-gradient-scooter" width="110">
                                        @else
                                            <img src="{{ asset('assets/images/avatars/avatar-default.jpg') }}"
                                                alt="{{ $student->nama_lengkap }}"
                                                class="p-1 rounded-circle bg-gradient-scooter" width="110">
                                        @endif

                                        <div class="mt-3">
                                            <h4>{{ $student->nama_lengkap }}</h4>
                                            <p class="mb-1 text-secondary">{{ $student->no_identitas }}</p>
                                            <p class="text-muted font-size-sm">Kelompok
                                                <strong>{{ $student->student_detail->kelompok }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tanggal Masuk</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ date('d F Y', strtotime($student->student_detail->tanggal_masuk)) }}"
                                                disabled />
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Lengkap</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $student->nama_lengkap }}"
                                                disabled />
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Panggilan</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $student->student_detail->nama_panggilan }}" disabled />
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Jenis Kelamin</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $student->jenis_kelamin }}" disabled />
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tempat Tanggal Lahir</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $student->student_detail->tempat_lahir }}, {{ date('d F Y', strtotime($student->tanggal_lahir)) }}"
                                                disabled />
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Agama</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $student->student_detail->agama }}" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- START Identitas Peserta Didik --}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Kewarganegaraan</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->kewarganegaraan }}" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Jumlah Sdr Kandung</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->saudara_kandung }}" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Jumlah Sdr Tiri</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->saudara_tiri }}" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Jumlah Sdr Angkat</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->saudara_angkat }}" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Bahasa sehari - hari</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->bahasa }}" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Imunitas yg pernah diterima</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->imunitas_diterima }}"
                                                        disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Ciri - ciri khusus</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->ciri_khusus }}" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Golongan Darah</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->gol_darah }}" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Alamat</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <textarea class="form-control" name="alamat" id="alamat" rows="3" disabled>{{ $student->student_detail->alamat }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Nomor Telepon</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->no_telepon }}" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Jarak Rumah ke Sekolah</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ $student->student_detail->jarak_sekolah_rumah }} KM"
                                                        disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END Identitas Peserta Didik --}}


                    {{-- START Identitas Orang Tua & Mutasi --}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="mb-0 nav nav-tabs nav-primary" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome"
                                                role="tab" aria-selected="true">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i
                                                            class='bx bx-comment-detail font-18 me-1'></i>
                                                    </div>
                                                    <div class="tab-title"> Identitas Ayah </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile"
                                                role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                                                    </div>
                                                    <div class="tab-title">Identitas Ibu</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#primarycontact"
                                                role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
                                                    </div>
                                                    <div class="tab-title">Mutasi</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="pt-3 tab-content">
                                        <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Nama</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->father->nama_lengkap }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Tempat Tanggal Lahir</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->father->tempat_lahir }}, {{ date('d F Y', strtotime($student->father->tangal_lahir)) }}"
                                                                disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Agama</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->father->agama }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Kewarganegaraan</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->father->kewarganegaraan }}"
                                                                disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Pendidikan</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->father->pendidikan }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Pekerjaan</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->father->pekerjaan }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Alamat Rumah</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <textarea class="form-control" rows="3" disabled>{{ $student->father->alamat }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Nomor Telepon</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->father->no_telepon }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Nama</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->mother->nama_lengkap }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Tempat Tanggal Lahir</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->mother->tempat_lahir }}, {{ date('d F Y', strtotime($student->mother->tanggal_lahir)) }}"
                                                                disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Agama</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->mother->agama }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Kewarganegaraan</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->mother->kewarganegaraan }}"
                                                                disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Pendidikan</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->mother->pendidikan }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Pekerjaan</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->mother->pekerjaan }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Alamat Rumah</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <textarea class="form-control" rows="3" disabled>{{ $student->mother->alamat }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="col-sm-5">
                                                            <h6 class="mb-0">Nomor Telepon</h6>
                                                        </div>
                                                        <div class="col-sm-7 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="{{ $student->mother->no_telepon }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="primarycontact" role="tabpanel">

                                            {{-- get data if mutation not empty --}}
                                            @if ($student->mutation_id != null)
                                                <div class="mb-3 row align-items-center">
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0">Diterima Tanggal</h6>
                                                    </div>
                                                    <div class="col-sm-8 text-secondary">
                                                        <input type="text" class="form-control"
                                                            value="{{ date('d F Y', strtotime($student->mutation->diterima_tanggal)) }}"
                                                            disabled />
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0">Ditempatkan di Kelompok</h6>
                                                    </div>
                                                    <div class="col-sm-8 text-secondary">
                                                        <input type="text" class="form-control"
                                                            value="{{ $student->mutation->ditempatkan_di_kelompok }}"
                                                            disabled />
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0">Berasal Dari PAUD / TK</h6>
                                                    </div>
                                                    <div class="col-sm-8 text-secondary">
                                                        <input type="text" class="form-control"
                                                            value="{{ $student->mutation->instansi_asal }}" disabled />
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0">Meninggalkan PAUD / TK Tanggal
                                                        </h6>
                                                    </div>
                                                    <div class="col-sm-8 text-secondary">
                                                        <input type="text" class="form-control"
                                                            value="{{ date('d F Y', strtotime($student->mutation->tgl_meninggalkan_instansi)) }}"
                                                            disabled />
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0">Alasan Meninggalkan PAUD / TK
                                                        </h6>
                                                    </div>
                                                    <div class="col-sm-8 text-secondary">
                                                        <textarea class="form-control" name="alasan" id="alasan" rows="3" disabled>{{ $student->mutation->alasan }}</textarea>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="mb-3 row align-items-center">
                                                        <div class="text-center col-12">
                                                            <h6 class="mb-0 text-danger">Tidak ada data mutasi!</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END Identitas Orang Tua & Mutasi --}}
                </div>
            </div>
        </div>
    @endsection
