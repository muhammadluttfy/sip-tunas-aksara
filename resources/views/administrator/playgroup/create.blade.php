@extends('layouts.app')

@section('style')
    <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />

    {{-- Wizard Style --}}
    <link href="{{ asset('assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">KB Tunas Aksara</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="card-title">Tambah Data Peserta Didik</h5>
                    <hr />

                    <!-- SmartWizard html -->
                    <div id="smartwizard">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#step-1"> <strong>Step 1</strong>
                                    <br>Form Data Peserta Didik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-2"> <strong>Step 2</strong>
                                    <br>Form Identitas Ayah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-3"> <strong>Step 3</strong>
                                    <br>Form Identitas Ibu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#step-4"> <strong>Step 4 (Opsional)</strong>
                                    <br>Mutasi</a>
                            </li>
                        </ul>
                        <form action="{{ route('playgroup.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content">
                                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                    <div class="mt-4 form-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="p-4 border rounded border-3">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <div class="input-group">
                                                                <div class="row align-items-center">
                                                                    <div class="col-12 col-md-2">
                                                                        <img class="p-1 rounded avatar-preview bg-primary"
                                                                            width="70">
                                                                    </div>

                                                                    <div class="col-12 col-md-10">
                                                                        <input type="file"
                                                                            class="form-control @error('avatar') is-invalid @enderror"
                                                                            id="avatar" name="avatar"
                                                                            onchange="previewAvatar()">
                                                                        @error('avatar')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <label for="tanggal_masuk" class="form-label">Tanggal
                                                                Masuk</label>
                                                            <input type="date"
                                                                class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                                                name="tanggal_masuk" id="tanggal_masuk"
                                                                placeholder="dd-mm-yyyy" required
                                                                value="{{ old('tanggal_masuk') }}">
                                                            @error('tanggal_masuk')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-8">
                                                            <label for="nama_lengkap_murid" class="form-label">Nama
                                                                Lengkap</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_lengkap_murid') is-invalid @enderror"
                                                                name="nama_lengkap_murid" id="nama_lengkap_murid"
                                                                placeholder="Masukkan Nama Lengkap" required
                                                                value="{{ old('nama_lengkap_murid') }}">
                                                            @error('nama_lengkap_murid')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-6">
                                                            <label for="nama_panggilan_murid" class="form-label">Nama
                                                                Panggilan</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_panggilan_murid') is-invalid @enderror"
                                                                name="nama_panggilan_murid" id="nama_panggilan_murid"
                                                                placeholder="Masukkan Nama Panggilan" required
                                                                value="{{ old('nama_panggilan_murid') }}">
                                                            @error('nama_panggilan_murid')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-6">
                                                            <label for="kelompok" class="form-label">Kelompok</label>
                                                            <input type="text"
                                                                class="form-control @error('kelompok') is-invalid @enderror"
                                                                name="kelompok" id="kelompok" placeholder="Kelompok Murid"
                                                                value="{{ old('kelompok') }}">
                                                            @error('kelompok')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="jenis_kelamin" class="form-label">Jenis
                                                                Kelamin</label>
                                                            <select
                                                                class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                                                name="jenis_kelamin" id="jenis_kelamin">
                                                                <option value="Laki - Laki">Laki - Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                            @error('jenis_kelamin')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="agama_murid" class="form-label">Agama</label>
                                                            <select
                                                                class="form-select @error('agama_murid') is-invalid @enderror"
                                                                name="agama_murid" id="agama_murid" required>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                            @error('agama_murid')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="kewarganegaraan_murid"
                                                                class="form-label">Kewarganegaraan</label>
                                                            <select
                                                                class="form-select @error('kewarganegaraan_murid') is-invalid @enderror"
                                                                name="kewarganegaraan_murid" id="kewarganegaraan_murid"
                                                                required>
                                                                <option value="WNI">WNI</option>
                                                                <option value="WNI Keturunan">WNI Keturunan</option>
                                                            </select>
                                                            @error('kewarganegaraan_murid')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="tempat_lahir_murid"
                                                                class="form-label @error('tempat_lahir_murid') is-invalid @enderror">Tempat
                                                                Lahir</label>
                                                            <input type="text" class="form-control"
                                                                name="tempat_lahir_murid" id="tempat_lahir_murid"
                                                                placeholder="Masukkan Tempat Lahir" required
                                                                value="{{ old('tempat_lahir_murid') }}">
                                                            @error('tempat_lahir_murid')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="tanggal_lahir_murid" class="form-label">Tanggal
                                                                Lahir</label>
                                                            <input type="date"
                                                                class="form-control @error('tanggal_lahir_murid') is-invalid @enderror"
                                                                name="tanggal_lahir_murid" id="tanggal_lahir_murid"
                                                                placeholder="dd-mm-yyyy" required
                                                                value="{{ old('tanggal_lahir_murid') }}">
                                                            @error('tanggal_lahir_murid')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="saudara_kandung" class="form-label">Saudara
                                                                Kandung</label>
                                                            <input type="number"
                                                                class="form-control @error('saudara_kandung') is-invalid @enderror"
                                                                name="saudara_kandung" id="saudara_kandung"
                                                                placeholder="Jumlah"
                                                                value="{{ old('saudara_kandung') }}">
                                                            @error('saudara_kandung')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="saudara_tiri" class="form-label">Saudara
                                                                Tiri</label>
                                                            <input type="number"
                                                                class="form-control @error('saudara_tiri') is-invalid @enderror"
                                                                name="saudara_tiri" id="saudara_tiri"
                                                                placeholder="Jumlah" value="{{ old('saudara_tiri') }}">
                                                            @error('saudara_tiri')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="saudara_angkat" class="form-label">Saudara
                                                                Angkat</label>
                                                            <input type="number"
                                                                class="form-control @error('saudara_angkat') is-invalid @enderror"
                                                                name="saudara_angkat" id="saudara_angkat"
                                                                placeholder="Jumlah" value="{{ old('saudara_angkat') }}">
                                                            @error('saudara_angkat')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="p-4 border rounded border-3">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="bahasa" class="form-label">Bahasa Sehari -
                                                                hari</label>
                                                            <input type="text"
                                                                class="form-control @error('bahasa') is-invalid @enderror"
                                                                name="bahasa" id="bahasa"
                                                                placeholder="Masukkan Bahasa Sehari - hari"
                                                                value="{{ old('bahasa') }}">
                                                            @error('bahasa')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="gol_darah" class="form-label">Golongan
                                                                Darah</label>
                                                            <select
                                                                class="form-select @error('gol_darah') is-invalid @enderror"
                                                                name="gol_darah" id="gol_darah">
                                                                <option value="Belum Cek">Belum Cek</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="AB">AB</option>
                                                                <option value="O">O</option>
                                                            </select>
                                                            @error('gol_darah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="imunitas_diterima" class="form-label">Imunitas
                                                                yang pernah
                                                                diterima</label>
                                                            <input type="text"
                                                                class="form-control @error('imunitas_diterima') is-invalid @enderror"
                                                                name="imunitas_diterima" id="imunitas_diterima"
                                                                placeholder="Masukkan imunitas yg pernah diterima"
                                                                value="{{ old('imunitas_diterima') }}">
                                                            @error('imunitas_diterima')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="ciri_khusus" class="form-label">Ciri - ciri
                                                                Khusus</label>
                                                            <input type="text"
                                                                class="form-control @error('ciri_khusus') is-invalid @enderror"
                                                                name="ciri_khusus" id="ciri_khusus"
                                                                placeholder="Masukkan ciri - ciri khusus peserta didik"
                                                                value="{{ old('ciri_khusus') }}">
                                                            @error('ciri_khusus')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="alamat_murid" class="form-label">Alamat</label>
                                                            <textarea class="form-control @error('alamat_murid') is-invalid @enderror" name="alamat_murid" id="alamat_murid"
                                                                rows="3" placeholder="Masukkan detail alamat atau nama jalan..." required
                                                                value="{{ old('alamat_murid') }}"></textarea>
                                                            @error('alamat_murid')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="no_telepon_murid" class="form-label">Nomor
                                                                Telepon</label>
                                                            <input type="text"
                                                                class="form-control @error('no_telepon_murid') is-invalid @enderror"
                                                                name="no_telepon_murid" id="no_telepon_murid"
                                                                placeholder="082XXXXXXXXX" required
                                                                value="{{ old('no_telepon_murid') }}">
                                                            @error('no_telepon_murid')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="jarak_sekolah_rumah" class="form-label">Jarak
                                                                Rumah ke Sekolah</label>
                                                            <input type="text"
                                                                class="form-control @error('jarak_sekolah_rumah') is-invalid @enderror"
                                                                name="jarak_sekolah_rumah" id="jarak_sekolah_rumah"
                                                                placeholder="Misal : 1 KM atau 500 M" required
                                                                value="{{ old('jarak_sekolah_rumah') }}">
                                                            @error('jarak_sekolah_rumah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                    <div class="mt-4 form-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="p-4 border rounded border-3">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <label for="nama_lengkap_ayah" class="form-label">Nama
                                                                Lengkap</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_lengkap_ayah') is-invalid @enderror"
                                                                name="nama_lengkap_ayah" id="nama_lengkap_ayah"
                                                                placeholder="Masukkan Nama Lengkap" required
                                                                value="{{ old('nama_lengkap_ayah') }}">
                                                            @error('nama_lengkap_ayah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="tempat_lahir_ayah" class="form-label">Tempat
                                                                Lahir</label>
                                                            <input type="text"
                                                                class="form-control @error('tempat_lahir_ayah') is-invalid @enderror"
                                                                name="tempat_lahir_ayah" id="tempat_lahir_ayah"
                                                                placeholder="Masukkan Tempat Lahir" required
                                                                value="{{ old('tempat_lahir_ayah') }}">
                                                            @error('tempat_lahir_ayah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="tanggal_lahir_ayah" class="form-label">Tanggal
                                                                Lahir</label>
                                                            <input type="date"
                                                                class="form-control @error('tanggal_lahir_ayah') is-invalid @enderror"
                                                                name="tanggal_lahir_ayah" id="tanggal_lahir_ayah"
                                                                placeholder="dd-mm-yyyy" required
                                                                value="{{ old('tanggal_lahir_ayah') }}">
                                                            @error('tanggal_lahir_ayah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="agama_ayah" class="form-label">Agama</label>
                                                            <select
                                                                class="form-select @error('agama_ayah') is-invalid @enderror"
                                                                name="agama_ayah" id="agama_ayah" required>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                            @error('agama_ayah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="kewarganegaraan_ayah"
                                                                class="form-label">Kewarganegaraan</label>
                                                            <select
                                                                class="form-select @error('kewarganegaraan_ayah') is-invalid @enderror"
                                                                name="kewarganegaraan_ayah" id="kewarganegaraan_ayah"
                                                                required value="{{ old('kewarganegaraan_ayah') }}">
                                                                <option value="WNI">WNI</option>
                                                                <option value="WNI Keturunan">WNI Keturunan</option>
                                                            </select>
                                                            @error('kewarganegaraan_ayah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="p-4 border rounded border-3">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="pendidikan_ayah"
                                                                class="form-label">Pendidikan</label>
                                                            <input type="text"
                                                                class="form-control @error('pendidikan_ayah') is-invalid @enderror"
                                                                name="pendidikan_ayah" id="pendidikan_ayah"
                                                                placeholder="Pendidikan Terakhir" required
                                                                value="{{ old('pendidikan_ayah') }}">
                                                            @error('pendidikan_ayah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="pekerjaan_ayah" class="form-label">Pekerjaan
                                                                Ayah</label>
                                                            <input type="text"
                                                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                                name="pekerjaan_ayah" id="pekerjaan_ayah"
                                                                placeholder="Masukkan Pekerjaan" required
                                                                value="{{ old('pekerjaan_ayah') }}">
                                                            @error('pekerjaan_ayah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="alamat_ayah" class="form-label">Alamat</label>
                                                            <textarea class="form-control @error('alamat_ayah') is-invalid @enderror" name="alamat_ayah" id="alamat_ayah"
                                                                rows="3" placeholder="Masukkan detail alamat atau nama jalan..." required
                                                                value="{{ old('alamat_ayah') }}"></textarea>
                                                            @error('alamat_ayah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="no_telepon_ayah" class="form-label">Nomor
                                                                Telepon</label>
                                                            <input type="text"
                                                                class="form-control @error('no_telepon_ayah') is-invalid @enderror"
                                                                name="no_telepon_ayah" id="no_telepon_ayah"
                                                                placeholder="082XXXXXXXXX"
                                                                value="{{ old('no_telepon_ayah') }}">
                                                            @error('no_telepon_ayah')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>

                                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                    <div class="mt-4 form-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="p-4 border rounded border-3">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <label for="nama_lengkap_ibu" class="form-label">Nama
                                                                Lengkap</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_lengkap_ibu') is-invalid @enderror"
                                                                name="nama_lengkap_ibu" id="nama_lengkap_ibu"
                                                                placeholder="Masukkan Nama Lengkap" required
                                                                value="{{ old('nama_lengkap_ibu') }}">
                                                            @error('nama_lengkap_ibu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="tempat_lahir_ibu" class="form-label">Tempat
                                                                Lahir</label>
                                                            <input type="text"
                                                                class="form-control @error('tempat_lahir_ibu') is-invalid @enderror"
                                                                name="tempat_lahir_ibu" id="tempat_lahir_ibu"
                                                                placeholder="Masukkan Tempat Lahir" required
                                                                value="{{ old('tempat_lahir_ibu') }}">
                                                            @error('tempat_lahir_ibu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="tanggal_lahir_ibu" class="form-label">Tanggal
                                                                Lahir</label>
                                                            <input type="date"
                                                                class="form-control @error('tanggal_lahir_ibu') is-invalid @enderror"
                                                                name="tanggal_lahir_ibu" id="tanggal_lahir_ibu"
                                                                placeholder="dd-mm-yyyy" required
                                                                value="{{ old('tanggal_lahir_ibu') }}">
                                                            @error('tanggal_lahir_ibu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="agama_ibu" class="form-label">Agama</label>
                                                            <select
                                                                class="form-select @error('agama_ibu') is-invalid @enderror"
                                                                name="agama_ibu" id="agama_ibu" required>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                            @error('agama_ibu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="kewarganegaraan_ibu"
                                                                class="form-label">Kewarganegaraan</label>
                                                            <select
                                                                class="form-select @error('kewarganegaraan_ibu') is-invalid @enderror"
                                                                name="kewarganegaraan_ibu" id="kewarganegaraan_ibu"
                                                                required>
                                                                <option value="WNI">WNI</option>
                                                                <option value="WNI Keturunan">WNI Keturunan</option>
                                                            </select>
                                                            @error('kewarganegaraan_ibu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="p-4 border rounded border-3">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="pendidikan_ibu"
                                                                class="form-label">Pendidikan</label>
                                                            <input type="text"
                                                                class="form-control @error('pendidikan_ibu') is-invalid @enderror"
                                                                name="pendidikan_ibu" id="pendidikan_ibu"
                                                                placeholder="Pendidikan Terakhir" required
                                                                value="{{ old('pendidikan_ibu') }}">
                                                            @error('pendidikan_ibu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="pekerjaan_ibu"
                                                                class="form-label">Pekerjaan</label>
                                                            <input type="text"
                                                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                                name="pekerjaan_ibu" id="pekerjaan_ibu"
                                                                placeholder="Masukkan Pekerjaan" required
                                                                value="{{ old('pekerjaan_ibu') }}">
                                                            @error('pekerjaan_ibu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="alamat_ibu" class="form-label">Alamat</label>
                                                            <textarea class="form-control @error('alamat_ibu') is-invalid @enderror" name="alamat_ibu" id="alamat_ibu"
                                                                rows="3" placeholder="Masukkan detail alamat atau nama jalan..." required value="{{ old('alamat_ibu') }}"></textarea>
                                                            @error('alamat_ibu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="no_telepon_ibu" class="form-label">Nomor
                                                                Telepon</label>
                                                            <input type="text"
                                                                class="form-control @error('no_telepon_ibu') is-invalid @enderror"
                                                                name="no_telepon_ibu" id="no_telepon_ibu"
                                                                placeholder="082XXXXXXXXX"
                                                                value="{{ old('no_telepon_ibu') }}">
                                                            @error('no_telepon_ibu')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>

                                <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                    <div class="mt-4 form-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="p-4 border rounded border-3">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label for="diterima_tanggal" class="form-label">Diterima
                                                                Tanggal</label>
                                                            <input type="date"
                                                                class="form-control @error('diterima_tanggal') is-invalid @enderror"
                                                                name="diterima_tanggal" id="diterima_tanggal"
                                                                placeholder="dd-mm-yyyy"
                                                                value="{{ old('diterima_tanggal') }}">
                                                            @error('diterima_tanggal')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="ditempatkan_di_kelompok"
                                                                class="form-label">Ditempatkan di Kelompok</label>
                                                            <input type="text"
                                                                class="form-control @error('ditempatkan_di_kelompok') is-invalid @enderror"
                                                                name="ditempatkan_di_kelompok"
                                                                id="ditempatkan_di_kelompok" placeholder="Kelompok"
                                                                value="{{ old('ditempatkan_di_kelompok') }}">
                                                            @error('ditempatkan_di_kelompok')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="instansi_asal" class="form-label">Berasal dari
                                                                PAUD / TK</label>
                                                            <input type="text"
                                                                class="form-control @error('instansi_asal') is-invalid @enderror"
                                                                name="instansi_asal" id="instansi_asal"
                                                                placeholder="PAUD / TK Asal"
                                                                value="{{ old('instansi_asal') }}">
                                                            @error('instansi_asal')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="p-4 border rounded border-3">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label for="tgl_meninggalkan_instansi"
                                                                class="form-label">Tanggal Meninggalkan PAUD / TK
                                                                Lama</label>
                                                            <input type="date"
                                                                class="form-control @error('tgl_meninggalkan_instansi') is-invalid @enderror"
                                                                name="tgl_meninggalkan_instansi"
                                                                id="tgl_meninggalkan_instansi" placeholder="dd-mm-yyyy"
                                                                value="{{ old('tgl_meninggalkan_instansi') }}">
                                                            @error('tgl_meninggalkan_instansi')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="alasan" class="form-label">Alasan</label>
                                                            <textarea class="form-control @error('alasan') is-invalid @enderror" name="alasan" id="alasan" rows="5"
                                                                placeholder="Alasan meninggalkan PAUD / TK..."></textarea>
                                                            @error('alasan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button type="submit" id="submit"
                                                                    class="btn btn-primary">
                                                                    Tambah Peserta Didik
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <p><strong class="text-danger">Catatan :</strong> kosongkan
                                                                form mutasi jika calon peserta didik bukan pindahan dari
                                                                PAUD / TK lain.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#image-uploadify').imageuploadify();
        });
    </script>



    {{-- wizard scripts --}}
    <script src="{{ asset('assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish').addClass('btn btn-primary').on('click',
                function() {
                    alert('Finish Clicked');
                });
            var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click',
                function() {
                    $('#smartwizard').smartWizard("reset");
                });
            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
                if (stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled');
                } else if (stepPosition === 'last') {
                    $("#next-btn").addClass('disabled');
                } else {
                    $("#prev-btn").removeClass('disabled');
                    $("#next-btn").removeClass('disabled');
                }
            });
            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                transition: {
                    animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                },
                toolbarSettings: {
                    toolbarPosition: 'both', // both bottom
                    // toolbarExtraButtons: [btnFinish, btnCancel]
                    toolbarExtraButtons: []
                }
            });
            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });
            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });
            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });
            // Demo Button Events
            $("#got_to_step").on("change", function() {
                // Go to step
                var step_index = $(this).val() - 1;
                $('#smartwizard').smartWizard("goToStep", step_index);
                return true;
            });
            $("#is_justified").on("click", function() {
                // Change Justify
                var options = {
                    justified: $(this).prop("checked")
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });
            $("#animation").on("change", function() {
                // Change theme
                var options = {
                    transition: {
                        animation: $(this).val()
                    },
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });
            $("#theme_selector").on("change", function() {
                // Change theme
                var options = {
                    theme: $(this).val()
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });
        });

        // avatarPreview
        function previewAvatar() {
            const avatar = document.querySelector('#avatar');
            const avatarPreview = document.querySelector('.avatar-preview');
            // avatarPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(avatar.files[0]);
            oFReader.onload = function(oFREvent) {
                avatarPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
