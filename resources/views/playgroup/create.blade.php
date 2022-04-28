@extends("layouts.app")

@section('style')
    <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
@endsection

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">KB Tunas Aksara</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Tambah Data Peserta Didik Baru</h5>
                    <hr />
                    <div class="form-body mt-4">
                        <form action="{{ route('parent.create') }}" method="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <input type="email" class="form-control" name="nama_lengkap"
                                                    id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                                            </div>
                                            <div class="col-12">
                                                <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                                                <input type="email" class="form-control" name="nama_panggilan"
                                                    id="nama_panggilan" placeholder="Masukkan Nama Panggilan">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="agama" class="form-label">Agama</label>
                                                <select class="form-select" name="agama" id="agama">
                                                    <option value="1">Islam</option>
                                                    <option value="2">Protestan</option>
                                                    <option value="3">Katolik</option>
                                                    <option value="4">Hindu</option>
                                                    <option value="5">Buddha</option>
                                                    <option value="6">Konghucu</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="email" class="form-control" name="tempat_lahir"
                                                    id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggal_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir"
                                                    id="tanggal_lahir" placeholder="dd-mm-yyyy">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="saudara_kandung" class="form-label">Saudara
                                                    Kandung</label>
                                                <input type="number" class="form-control" name="saudara_kandung"
                                                    id="saudara_kandung" placeholder="Jumlah">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="saudara_tiri" class="form-label">Saudara
                                                    Tiri</label>
                                                <input type="number" class="form-control" name="saudara_tiri"
                                                    id="saudara_tiri" placeholder="Jumlah">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="saudara_angkat" class="form-label">Saudara
                                                    Angkat</label>
                                                <input type="number" class="form-control" name="saudara_angkat"
                                                    id="saudara_angkat" placeholder="Jumlah">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="imunitas_diterima" class="form-label">Imunitas yang pernah
                                                    diterima</label>
                                                <input type="text" class="form-control" name="imunitas_diterima"
                                                    id="imunitas_diterima"
                                                    placeholder="Masukkan imunitas yg pernah diterima">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="ciri_khusus" class="form-label">Ciri - ciri Khusus</label>
                                                <input type="text" class="form-control" name="ciri_khusus"
                                                    id="ciri_khusus"
                                                    placeholder="Masukkan ciri - ciri khusus peserta didik">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="bahasa" class="form-label">Bahasa Sehari - hari</label>
                                                <input type="text" class="form-control" name="bahasa" id="bahasa"
                                                    placeholder="Masukkan Bahasa Sehari - hari">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="gol_darah" class="form-label">Golongan Darah</label>
                                                <select class="form-select" name="gol_darah" id="gol_darah">
                                                    <option value="1">A</option>
                                                    <option value="2">B</option>
                                                    <option value="3">AB</option>
                                                    <option value="4">O</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat" rows="3"
                                                    placeholder="Masukkan detail alamat atau nama jalan..."></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="no_telepon" id="no_telepon"
                                                    placeholder="082XXXXXXXXX">
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" id="tambah-peserta-didik"
                                                        class="btn btn-primary">Tambah Peserta
                                                        Didik</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end row-->
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
@endsection
