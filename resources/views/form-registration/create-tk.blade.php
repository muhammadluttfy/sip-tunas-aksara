@extends('layouts.front.app')

@section('content')
    <div class="content-center d-flex align-items-start justify-content-center mt-md-4">
        <div class="container">
            <div class="row">
                <h4 class="">Form Pendaftarn Program TK Tunas Aksara</h4>
                <p class="mb-0">Selamat datang! Silahkan mengisi formulir pendaftaran dibawah ini. <br> <a
                        href="{{ route('registration.panduan') }}">Lihat
                        Panduan</a>
                    atau <a href="https://wa.me/6285299848346">Hubungi Kami</a> jika Anda kebingunan dalam proses
                    pendaftaran.</p>
            </div>

            <hr>

            <form action="{{ route('registration.storeTK') }}" method="POST" class="row" enctype="multipart/form-data">
                @csrf
                <div class="gap-3 mb-3">
                    <a href="{{ route('registration.index') }}" class="me-1 btn btn-outline-info"><i
                            class="bx bx-share fs-6"></i> Kembali</a>

                    <button type="submit" class="me-1 btn btn-success"><i class="lni lni-save fs-6"></i> Simpan</button>

                    <a href="{{ route('registration.index') }}" class="me-1 btn btn-danger"><i
                            class="lni lni-close fs-6"></i>Batal</a>
                </div>
                <div class="m-0 row">
                    <div class="p-0 col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-primary" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#formProfile" role="tab"
                                            aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">Data Pribadi</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#formFather" role="tab"
                                            aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">Data Ayah</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#formMother" role="tab"
                                            aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">Data Ibu</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>


                                <div class="py-3 tab-content">
                                    <div class="tab-pane fade show active" id="formProfile" role="tabpanel">
                                        <div class="p-4 border rounded">
                                            <div class="row g-3">
                                                <h6 class="mb-0 text-uppercase"><i class="bx bxs-user me-2"></i>Form Data
                                                    Peserta Didik
                                                </h6>
                                                <hr class="mb-0">
                                                <div class="col-md-4">
                                                    <label for="avatar" class="form-label">Upload Foto Peserta
                                                        Didik</label>
                                                    <input type="file"
                                                        class="form-control @error('avatar') is-invalid @enderror"
                                                        id="avatar" name="avatar" onchange="previewAvatar()" required>
                                                    @error('avatar')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="nama_lengkap_murid" class="form-label">Nama Lengkap</label>
                                                    <input type="text"
                                                        class="form-control @error('nama_lengkap_murid') is-invalid @enderror"
                                                        name="nama_lengkap_murid" id="nama_lengkap_murid"
                                                        placeholder="Nama Lengkap" value="{{ old('nama_lengkap_murid') }}"
                                                        required>
                                                    @error('nama_lengkap_murid')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="nama_panggilan_murid" class="form-label">Nama
                                                        Panggilan</label>
                                                    <input type="text"
                                                        class="form-control @error('nama_panggilan_murid') is-invalid @enderror"
                                                        name="nama_panggilan_murid" id="nama_panggilan_murid"
                                                        placeholder="Nama Panggilan"
                                                        value="{{ old('nama_panggilan_murid') }}" required>
                                                    @error('nama_panggilan_murid')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="text"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" id="email" placeholder="Nama Panggilan"
                                                        value="{{ old('email') }}" required>
                                                    @error('email')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="jenis_kelamin" class="form-label">Jenis
                                                        Kelamin</label>
                                                    <select
                                                        class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                                        name="jenis_kelamin" id="jenis_kelamin" required>
                                                        @if (old('jenis_kelamin') == 'Laki - Laki')
                                                            <option value="Laki - Laki" selected>Laki - Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        @elseif (old('jenis_kelamin') == 'Perempuan')
                                                            <option value="Laki - Laki">Laki - Laki</option>
                                                            <option value="Perempuan" selected>Perempuan</option>
                                                        @else
                                                            <option selected disabled>Pilih Jenis Kelamin...
                                                            </option>
                                                            <option value="Laki - Laki">Laki - Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        @endif

                                                        @error('jenis_kelamin')
                                                            <div id="jenis_kelamin" class="invalid-feedback">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </select>
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="agama_murid" class="form-label">Agama</label>
                                                    <select class="form-select @error('agama_murid') is-invalid @enderror"
                                                        name="agama_murid" id="agama_murid" required>
                                                        <option selected="" disabled="" value="">Pilih
                                                            Agama...
                                                        </option>
                                                        @if (old('agama_murid') == 'Islam')
                                                            <option value="Islam" selected>Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_murid') == 'Kristen')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen" selected>Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_murid') == 'Katholik')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik" selected>Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_murid') == 'Hindu')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu" selected>Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_murid') == 'Budha')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha" selected>Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_murid') == 'Konghucu')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu" selected>Konghucu</option>
                                                        @else
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @endif
                                                    </select>

                                                    @error('agama_murid')
                                                        <div id="agama_murid" class="invalid-feedback">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="kewarganegaraan_murid"
                                                        class="form-label">Kewarganegaraan</label>
                                                    <select
                                                        class="form-select @error('kewarganegaraan_murid') is-invalid @enderror"
                                                        name="kewarganegaraan_murid" id="kewarganegaraan_murid" required>

                                                        @if (old('kewarganegaraan_murid') == 'WNI')
                                                            <option value="WNI" selected>WNI</option>
                                                            <option value="WNI Keturunan">WNI Keturunan</option>
                                                        @elseif (old('kewarganegaraan_murid') == 'WNI Keturunan')
                                                            <option value="WNI">WNI</option>
                                                            <option value="WNI Keturunan">WNI Keturunan</option>
                                                        @else
                                                            <option disabled selected>Pilih Kewarganegaraan
                                                            </option>
                                                            <option value="WNI">WNI</option>
                                                            <option value="WNI Keturunan">WNI Keturunan</option>
                                                        @endif



                                                    </select>

                                                    @error('kewarganegaraan_murid')
                                                        <div id="kewarganegaraan_murid" class="invalid-feedback">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="tempat_lahir_murid" class="form-label">Tempat
                                                        Lahir</label>
                                                    <input type="text"
                                                        class="form-control @error('tempat_lahir_murid') is-invalid @enderror"
                                                        name="tempat_lahir_murid" id="tempat_lahir_murid"
                                                        placeholder="Tempat Lahir"
                                                        value="{{ old('tempat_lahir_murid') }}" required>
                                                    @error('tempat_lahir_murid')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="tanggal_lahir_murid" class="form-label">Tanggal
                                                        Lahir</label>
                                                    <input type="date"
                                                        class="form-control @error('tanggal_lahir_murid') is-invalid @enderror"
                                                        name="tanggal_lahir_murid" id="tanggal_lahir_murid"
                                                        placeholder="Nama Lengkap"
                                                        value="{{ old('tanggal_lahir_murid') }}" required>
                                                    @error('tanggal_lahir_murid')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="saudara_kandung" class="form-label">Saudara
                                                        Kandung</label>
                                                    <input type="number"
                                                        class="form-control @error('saudara_kandung') is-invalid @enderror"
                                                        name="saudara_kandung" id="saudara_kandung"
                                                        placeholder="Misal : 2" value="{{ old('saudara_kandung') }}">
                                                    @error('saudara_kandung')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="saudara_tiri" class="form-label">Saudara
                                                        Tiri</label>
                                                    <input type="number"
                                                        class="form-control @error('saudara_tiri') is-invalid @enderror"
                                                        name="saudara_tiri" id="saudara_tiri" placeholder="Misal : 0"
                                                        value="{{ old('saudara_tiri') }}">
                                                    @error('saudara_tiri')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="saudara_angkat" class="form-label">Saudara
                                                        Angkat</label>
                                                    <input type="number"
                                                        class="form-control @error('saudara_angkat') is-invalid @enderror"
                                                        name="saudara_angkat" id="saudara_angkat" placeholder="Misal : 0"
                                                        value="{{ old('saudara_angkat') }}">
                                                    @error('saudara_angkat')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="bahasa" class="form-label">Bahasa</label>
                                                    <input type="text"
                                                        class="form-control @error('bahasa') is-invalid @enderror"
                                                        name="bahasa" id="bahasa" placeholder="Contoh : Bahasa Sasak"
                                                        value="{{ old('bahasa') }}" required>
                                                    @error('bahasa')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="imunitas_diterima" class="form-label">Imunitas
                                                        Diterima</label>
                                                    <input type="text"
                                                        class="form-control @error('imunitas_diterima') is-invalid @enderror"
                                                        name="imunitas_diterima" id="imunitas_diterima"
                                                        placeholder="Imunitas Diterima"
                                                        value="{{ old('imunitas_diterima') }}">
                                                    @error('imunitas_diterima')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="ciri_khusus" class="form-label">Ciri Khusus</label>
                                                    <input type="text"
                                                        class="form-control @error('ciri_khusus') is-invalid @enderror"
                                                        name="ciri_khusus" id="ciri_khusus" placeholder="Ciri Khusus"
                                                        value="{{ old('ciri_khusus') }}">
                                                    @error('ciri_khusus')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="gol_darah" class="form-label">Golongan Darah</label>
                                                    <input type="text"
                                                        class="form-control @error('gol_darah') is-invalid @enderror"
                                                        name="gol_darah" id="gol_darah" placeholder="A, B, AB, O"
                                                        value="{{ old('gol_darah') }}">
                                                    @error('gol_darah')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="jarak_sekolah_rumah" class="form-label">Jarak Rumah ke
                                                        Sekolah</label>
                                                    <input type="text"
                                                        class="form-control @error('jarak_sekolah_rumah') is-invalid @enderror"
                                                        name="jarak_sekolah_rumah" id="jarak_sekolah_rumah"
                                                        placeholder="Misal : 1 KM atau 200 Meter"
                                                        value="{{ old('jarak_sekolah_rumah') }}">
                                                    @error('jarak_sekolah_rumah')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="alamat_murid" class="form-label">Alamat</label>
                                                    <textarea class="form-control @error('alamat_murid') is-invalid @enderror" name="alamat_murid" id="alamat_murid"
                                                        rows="3" placeholder="Masukkan detail alamat atau nama jalan..." required>{{ old('alamat_murid') }}</textarea>
                                                    @error('alamat_murid')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="formFather" role="tabpanel">
                                        <div class="p-4 border rounded">
                                            <div class="row g-3">
                                                <h6 class="mb-0 text-uppercase"><i class="bx bxs-user me-2"></i>Form Data
                                                    Ayah
                                                </h6>
                                                <hr class="mb-0">
                                                <div class="col-md-4">
                                                    <label for="nama_lengkap_ayah" class="form-label">Nama
                                                        Lengkap</label>
                                                    <input type="text"
                                                        class="form-control @error('nama_lengkap_ayah') is-invalid @enderror"
                                                        name="nama_lengkap_ayah" id="nama_lengkap_ayah"
                                                        placeholder="Nama Lengkap" value="{{ old('nama_lengkap_ayah') }}"
                                                        required>
                                                    @error('nama_lengkap_ayah')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="tempat_lahir_ayah" class="form-label">Tempat
                                                        Lahir</label>
                                                    <input type="text"
                                                        class="form-control @error('tempat_lahir_ayah') is-invalid @enderror"
                                                        name="tempat_lahir_ayah" id="tempat_lahir_ayah"
                                                        placeholder="Tempat Lahir" value="{{ old('tempat_lahir_ayah') }}"
                                                        required>
                                                    @error('tempat_lahir_ayah')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="tanggal_lahir_ayah" class="form-label">Tanggal
                                                        Lahir</label>
                                                    <input type="date"
                                                        class="form-control @error('tanggal_lahir_ayah') is-invalid @enderror"
                                                        name="tanggal_lahir_ayah" id="tanggal_lahir_ayah"
                                                        placeholder="Nama Lengkap"
                                                        value="{{ old('tanggal_lahir_ayah') }}" required>
                                                    @error('tanggal_lahir_ayah')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="agama_ayah" class="form-label">Agama</label>
                                                    <select class="form-select @error('agama_ayah') is-invalid @enderror"
                                                        name="agama_ayah" id="agama_ayah" required>
                                                        <option selected disabled>Pilih
                                                            Agama...
                                                        </option>
                                                        @if (old('agama_ayah') == 'Islam')
                                                            <option value="Islam" selected>Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ayah') == 'Kristen')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen" selected>Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ayah') == 'Katholik')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik" selected>Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ayah') == 'Hindu')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu" selected>Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ayah') == 'Budha')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha" selected>Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ayah') == 'Konghucu')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu" selected>Konghucu</option>
                                                        @else
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @endif
                                                    </select>

                                                    @error('agama_ayah')
                                                        <div id="agama_ayah" class="invalid-feedback">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="kewarganegaraan_ayah"
                                                        class="form-label">Kewarganegaraan</label>
                                                    <select
                                                        class="form-select @error('kewarganegaraan_ayah') is-invalid @enderror"
                                                        name="kewarganegaraan_ayah" id="kewarganegaraan_ayah" required>

                                                        @if (old('kewarganegaraan_ayah') == 'WNI')
                                                            <option value="WNI" selected>WNI</option>
                                                            <option value="WNI Keturunan">WNI Keturunan</option>
                                                        @elseif (old('kewarganegaraan_ayah') == 'WNI Keturunan')
                                                            <option value="WNI">WNI</option>
                                                            <option value="WNI Keturunan" selected>WNI Keturunan</option>
                                                        @else
                                                            <option disabled selected>Pilih Kewarganegaraan
                                                            </option>
                                                            <option value="WNI">WNI</option>
                                                            <option value="WNI Keturunan">WNI Keturunan</option>
                                                        @endif



                                                    </select>

                                                    @error('kewarganegaraan_ayah')
                                                        <div id="kewarganegaraan_ayah" class="invalid-feedback">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="pendidikan_ayah" class="form-label">Pendidikan
                                                        Terakhir</label>
                                                    <input type="text"
                                                        class="form-control @error('pendidikan_ayah') is-invalid @enderror"
                                                        name="pendidikan_ayah" id="pendidikan_ayah"
                                                        placeholder="Pendidikan Terakhir Ayah"
                                                        value="{{ old('pendidikan_ayah') }}">
                                                    @error('pendidikan_ayah')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                                    <input type="text"
                                                        class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                        name="pekerjaan_ayah" id="pekerjaan_ayah"
                                                        placeholder="Pekerjaan Ayah" value="{{ old('pekerjaan_ayah') }}">
                                                    @error('pekerjaan_ayah')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="no_telepon_ayah" class="form-label">No Telepon</label>
                                                    <input type="text"
                                                        class="form-control @error('no_telepon_ayah') is-invalid @enderror"
                                                        name="no_telepon_ayah" id="no_telepon_ayah"
                                                        placeholder="08XXXXXXXXXX" value="{{ old('no_telepon_ayah') }}">
                                                    @error('no_telepon_ayah')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="formMother" role="tabpanel">
                                        <div class="p-4 border rounded">
                                            <div class="row g-3">
                                                <h6 class="mb-0 text-uppercase"><i class="bx bxs-user me-2"></i>Form Data
                                                    Ibu
                                                </h6>
                                                <hr class="mb-0">
                                                <div class="col-md-4">
                                                    <label for="nama_lengkap_ibu" class="form-label">Nama
                                                        Lengkap</label>
                                                    <input type="text"
                                                        class="form-control @error('nama_lengkap_ibu') is-invalid @enderror"
                                                        name="nama_lengkap_ibu" id="nama_lengkap_ibu"
                                                        placeholder="Nama Lengkap" value="{{ old('nama_lengkap_ibu') }}"
                                                        required>
                                                    @error('nama_lengkap_ibu')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="tempat_lahir_ibu" class="form-label">Tempat
                                                        Lahir</label>
                                                    <input type="text"
                                                        class="form-control @error('tempat_lahir_ibu') is-invalid @enderror"
                                                        name="tempat_lahir_ibu" id="tempat_lahir_ibu"
                                                        placeholder="Tempat Lahir" value="{{ old('tempat_lahir_ibu') }}"
                                                        required>
                                                    @error('tempat_lahir_ibu')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="tanggal_lahir_ibu" class="form-label">Tanggal
                                                        Lahir</label>
                                                    <input type="date"
                                                        class="form-control @error('tanggal_lahir_ibu') is-invalid @enderror"
                                                        name="tanggal_lahir_ibu" id="tanggal_lahir_ibu"
                                                        placeholder="Nama Lengkap" value="{{ old('tanggal_lahir_ibu') }}"
                                                        required>
                                                    @error('tanggal_lahir_ibu')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="agama_ibu" class="form-label">Agama</label>
                                                    <select class="form-select @error('agama_ibu') is-invalid @enderror"
                                                        name="agama_ibu" id="agama_ibu" required>
                                                        <option selected="" disabled="" value="">Pilih
                                                            Agama...
                                                        </option>
                                                        @if (old('agama_ibu') == 'Islam')
                                                            <option value="Islam" selected>Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ibu') == 'Kristen')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen" selected>Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ibu') == 'Katholik')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik" selected>Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ibu') == 'Hindu')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu" selected>Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ibu') == 'Budha')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha" selected>Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @elseif(old('agama_ibu') == 'Konghucu')
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu" selected>Konghucu</option>
                                                        @else
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katholik">Katholik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        @endif
                                                    </select>

                                                    @error('agama_ibu')
                                                        <div id="agama_ibu" class="invalid-feedback">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="kewarganegaraan_ibu"
                                                        class="form-label">Kewarganegaraan</label>
                                                    <select
                                                        class="form-select @error('kewarganegaraan_ibu') is-invalid @enderror"
                                                        name="kewarganegaraan_ibu" id="kewarganegaraan_ibu">

                                                        @if (old('kewarganegaraan_ibu') == 'WNI')
                                                            <option value="WNI" selected>WNI</option>
                                                            <option value="WNI Keturunan">WNI Keturunan</option>
                                                        @elseif (old('kewarganegaraan_ibu') == 'WNI Keturunan')
                                                            <option value="WNI">WNI</option>
                                                            <option value="WNI Keturunan">WNI Keturunan</option>
                                                        @else
                                                            <option disabled selected>Pilih Kewarganegaraan
                                                            </option>
                                                            <option value="WNI">WNI</option>
                                                            <option value="WNI Keturunan">WNI Keturunan</option>
                                                        @endif



                                                    </select>

                                                    @error('kewarganegaraan_ibu')
                                                        <div id="kewarganegaraan_ibu" class="invalid-feedback">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="pendidikan_ibu" class="form-label">Pendidikan
                                                        Terakhir</label>
                                                    <input type="text"
                                                        class="form-control @error('pendidikan_ibu') is-invalid @enderror"
                                                        name="pendidikan_ibu" id="pendidikan_ibu"
                                                        placeholder="Pendidikan Terakhir Ayah"
                                                        value="{{ old('pendidikan_ibu') }}">
                                                    @error('pendidikan_ibu')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                                    <input type="text"
                                                        class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                        name="pekerjaan_ibu" id="pekerjaan_ibu"
                                                        placeholder="Pekerjaan Ibu" value="{{ old('pekerjaan_ibu') }}">
                                                    @error('pekerjaan_ibu')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="no_telepon_ibu" class="form-label">No Telepon</label>
                                                    <input type="text"
                                                        class="form-control @error('no_telepon_ibu') is-invalid @enderror"
                                                        name="no_telepon_ibu" id="no_telepon_ibu"
                                                        placeholder="08XXXXXXXXXX" value="{{ old('no_telepon_ibu') }}">
                                                    @error('no_telepon_ibu')
                                                        <div class="valid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    @section('script')
        <script>
            // avatarPreview
            function previewAvatar() {
                const avatar = document.querySelector("#avatar");
                const avatarPreview = document.querySelector(".avatar-preview");
                // avatarPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(avatar.files[0]);
                oFReader.onload = function(oFREvent) {
                    avatarPreview.src = oFREvent.target.result;
                };
            }
        </script>
    @endsection
