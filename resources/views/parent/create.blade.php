@extends("layouts.app")

@section('style')
    <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />

    {{-- select --}}
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
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
                    <h5 class="card-title">Tambah Data Ayah</h5>
                    <hr />
                    <div class="form-body mt-4">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">Pilih Anak dari Ayah</label>
                                                <select class="single-select">
                                                    <option value="Muhammad Lutfi">Muhammad Lutfi</option>
                                                    <option value="Annida Ayyasya Kusuma">Annida Ayyasya Kusuma</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama" id="nama"
                                                    placeholder="Masukkan Nama Lengkap">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir"
                                                    id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggal_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir"
                                                    id="tanggal_lahir" placeholder="dd-mm-yyyy">
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
                                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                                <select class="form-select" name="kewarganegaraan" id="kewarganegaraan">
                                                    <option value="1">WNI</option>
                                                    <option value="2">WNI Keturunan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                                <input type="text" class="form-control" name="pendidikan" id="pendidikan"
                                                    placeholder="Pendidikan Terakhir">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                                                    placeholder="Masukkan Pekerjaan">
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
                                                    <button type="submit" id="tambah-data-ayah"
                                                        class="btn btn-primary">Tambah Data Ayah</button>
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

    {{-- select scripts --}}
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
