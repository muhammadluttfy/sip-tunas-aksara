@extends("layouts.app")

@section('style')
    <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />

    {{-- Wizard Style --}}
    <link href="{{ asset('assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet"
        type="text/css" />
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
                                    <br>Form Identitas Ayah</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#step-4"> <strong>Step 4 (Opsional)</strong>
                                    <br>Mutasi</a>
                            </li> --}}
                        </ul>
                        <form action="{{ route('playgroup.store') }}" method="POST">
                            @csrf
                            <div class="tab-content">
                                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                    <div class="form-body mt-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <label for="nama_lengkap_murid" class="form-label">Nama
                                                                Lengkap</label>
                                                            <input type="text" class="form-control"
                                                                name="nama_lengkap_murid" id="nama_lengkap_murid"
                                                                placeholder="Masukkan Nama Lengkap">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="nama_panggilan_murid" class="form-label">Nama
                                                                Panggilan</label>
                                                            <input type="text" class="form-control"
                                                                name="nama_panggilan_murid" id="nama_panggilan"
                                                                placeholder="Masukkan Nama Panggilan">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="jenis_kelamin" class="form-label">Jenis
                                                                Kelamin</label>
                                                            <select class="form-select" name="jenis_kelamin"
                                                                id="jenis_kelamin">
                                                                <option value="Laki - Laki">Laki - Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="agama_murid" class="form-label">Agama</label>
                                                            <select class="form-select" name="agama_murid"
                                                                id="agama_murid">
                                                                <option value="Islam">Islam</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="kewarganegaraan_murid"
                                                                class="form-label">Kewarganegaraan</label>
                                                            <select class="form-select" name="kewarganegaraan_murid"
                                                                id="kewarganegaraan_murid">
                                                                <option value="WNI">WNI</option>
                                                                <option value="WNI Keturunan">WNI Keturunan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tempat_lahir_murid" class="form-label">Tempat
                                                                Lahir</label>
                                                            <input type="text" class="form-control"
                                                                name="tempat_lahir_murid" id="tempat_lahir_murid"
                                                                placeholder="Masukkan Tempat Lahir">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tanggal_lahir_murid" class="form-label">Tempat
                                                                Lahir</label>
                                                            <input type="date" class="form-control"
                                                                name="tanggal_lahir_murid" id="tanggal_lahir_murid"
                                                                placeholder="dd-mm-yyyy">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="saudara_kandung" class="form-label">Saudara
                                                                Kandung</label>
                                                            <input type="number" class="form-control"
                                                                name="saudara_kandung" id="saudara_kandung"
                                                                placeholder="Jumlah">
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
                                                            <input type="number" class="form-control"
                                                                name="saudara_angkat" id="saudara_angkat"
                                                                placeholder="Jumlah">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label for="imunitas_diterima" class="form-label">Imunitas
                                                                yang pernah
                                                                diterima</label>
                                                            <input type="text" class="form-control"
                                                                name="imunitas_diterima" id="imunitas_diterima"
                                                                placeholder="Masukkan imunitas yg pernah diterima">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="ciri_khusus" class="form-label">Ciri - ciri
                                                                Khusus</label>
                                                            <input type="text" class="form-control" name="ciri_khusus"
                                                                id="ciri_khusus"
                                                                placeholder="Masukkan ciri - ciri khusus peserta didik">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="bahasa" class="form-label">Bahasa Sehari -
                                                                hari</label>
                                                            <input type="text" class="form-control" name="bahasa"
                                                                id="bahasa" placeholder="Masukkan Bahasa Sehari - hari">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="gol_darah" class="form-label">Golongan
                                                                Darah</label>
                                                            <select class="form-select" name="gol_darah" id="gol_darah">
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="AB">AB</option>
                                                                <option value="O">O</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="alamat_murid" class="form-label">Alamat</label>
                                                            <textarea class="form-control" name="alamat_murid" id="alamat_murid" rows="3"
                                                                placeholder="Masukkan detail alamat atau nama jalan..."></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="no_telepon_murid" class="form-label">Nomor
                                                                Telepon</label>
                                                            <input type="text" class="form-control"
                                                                name="no_telepon_murid" id="no_telepon_murid"
                                                                placeholder="082XXXXXXXXX">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                    <div class="form-body mt-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <label for="nama_lengkap_ayah" class="form-label">Nama
                                                                Lengkap</label>
                                                            <input type="text" class="form-control"
                                                                name="nama_lengkap_ayah" id="nama_lengkap_ayah"
                                                                placeholder="Masukkan Nama Lengkap">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tempat_lahir_ayah" class="form-label">Tempat
                                                                Lahir</label>
                                                            <input type="text" class="form-control"
                                                                name="tempat_lahir_ayah" id="tempat_lahir_ayah"
                                                                placeholder="Masukkan Tempat Lahir">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tanggal_lahir_ayah" class="form-label">Tanggal
                                                                Lahir</label>
                                                            <input type="date" class="form-control"
                                                                name="tanggal_lahir_ayah" id="tanggal_lahir_ayah"
                                                                placeholder="dd-mm-yyyy">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="agama_ayah" class="form-label">Agama</label>
                                                            <select class="form-select" name="agama_ayah"
                                                                id="agama_ayah">
                                                                <option value="Islam">Islam</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="kewarganegaraan_ayah"
                                                                class="form-label">Kewarganegaraan</label>
                                                            <select class="form-select" name="kewarganegaraan_ayah"
                                                                id="kewarganegaraan_ayah">
                                                                <option value="WNI">WNI</option>
                                                                <option value="WNI Keturunan">WNI Keturunan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="pendidikan_ayah"
                                                                class="form-label">Pendidikan</label>
                                                            <input type="text" class="form-control"
                                                                name="pendidikan_ayah" id="pendidikan_ayah"
                                                                placeholder="Pendidikan Terakhir">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="pekerjaan_ayah"
                                                                class="form-label">Pekerjaan_ayah</label>
                                                            <input type="text" class="form-control" name="pekerjaan_ayah"
                                                                id="pekerjaan_ayah" placeholder="Masukkan Pekerjaan">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="alamat_ayah" class="form-label">Alamat</label>
                                                            <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" rows="3"
                                                                placeholder="Masukkan detail alamat atau nama jalan..."></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="no_telepon_ayah" class="form-label">Nomor
                                                                Telepon</label>
                                                            <input type="text" class="form-control"
                                                                name="no_telepon_ayah" id="no_telepon_ayah"
                                                                placeholder="082XXXXXXXXX">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                    <div class="form-body mt-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <label for="nama_lengkap_ibu" class="form-label">Nama
                                                                Lengkap</label>
                                                            <input type="text" class="form-control"
                                                                name="nama_lengkap_ibu" id="nama_lengkap_ibu"
                                                                placeholder="Masukkan Nama Lengkap">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tempat_lahir_ibu" class="form-label">Tempat
                                                                Lahir</label>
                                                            <input type="text" class="form-control"
                                                                name="tempat_lahir_ibu" id="tempat_lahir_ibu"
                                                                placeholder="Masukkan Tempat Lahir">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="tanggal_lahir_ibu" class="form-label">Tanggal
                                                                Lahir</label>
                                                            <input type="date" class="form-control"
                                                                name="tanggal_lahir_ibu" id="tanggal_lahir_ibu"
                                                                placeholder="dd-mm-yyyy">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="agama_ibu" class="form-label">Agama</label>
                                                            <select class="form-select" name="agama_ibu" id="agama_ibu">
                                                                <option value="Islam">Islam</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="kewarganegaraan_ibu"
                                                                class="form-label">Kewarganegaraan</label>
                                                            <select class="form-select" name="kewarganegaraan_ibu"
                                                                id="kewarganegaraan_ibu">
                                                                <option value="WNI">WNI</option>
                                                                <option value="WNI Keturunan">WNI Keturunan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="pendidikan_ibu"
                                                                class="form-label">Pendidikan</label>
                                                            <input type="text" class="form-control" name="pendidikan_ibu"
                                                                id="pendidikan_ibu" placeholder="Pendidikan Terakhir">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="pekerjaan_ibu"
                                                                class="form-label">Pekerjaan</label>
                                                            <input type="text" class="form-control" name="pekerjaan_ibu"
                                                                id="pekerjaan_ibu" placeholder="Masukkan Pekerjaan">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="alamat_ibu" class="form-label">Alamat</label>
                                                            <textarea class="form-control" name="alamat_ibu" id="alamat_ibu" rows="3"
                                                                placeholder="Masukkan detail alamat atau nama jalan..."></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="no_telepon_ibu" class="form-label">Nomor
                                                                Telepon</label>
                                                            <input type="text" class="form-control" name="no_telepon_ibu"
                                                                id="no_telepon_ibu" placeholder="082XXXXXXXXX">
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button type="submit" id="submit" class="btn btn-primary">
                                                                    Tambah Peserta Didik
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <p><strong class="text-danger">Catatan :</strong> Klik
                                                                tombol
                                                                "Tambah Peserta Didik" jika calon peserta didik
                                                                mendaftarkan diri di
                                                                PAUD Tunas Aksara secara langsung dan bukan pindahan.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                                <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                    <div class="form-body mt-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label for="diterima_tanggal" class="form-label">Diterima
                                                                Tanggal</label>
                                                            <input type="date" class="form-control"
                                                                name="diterima_tanggal" id="diterima_tanggal"
                                                                placeholder="dd-mm-yyyy">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="ditempatkan_di_kelompok"
                                                                class="form-label">Ditempatkan di Kelompok</label>
                                                            <input type="text" class="form-control"
                                                                name="ditempatkan_di_kelompok" id="ditempatkan_di_kelompok"
                                                                placeholder="Kelompok">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="instansi_asal" class="form-label">Berasal dari
                                                                PAUD / TK</label>
                                                            <input type="text" class="form-control" name="instansi_asal"
                                                                id="instansi_asal" placeholder="PAUD / TK Asal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label for="tgl_meninggalkan_instansi"
                                                                class="form-label">Diterima
                                                                Tanggal</label>
                                                            <input type="date" class="form-control"
                                                                name="tgl_meninggalkan_instansi"
                                                                id="tgl_meninggalkan_instansi" placeholder="dd-mm-yyyy">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="alasan" class="form-label">Alasan</label>
                                                            <textarea class="form-control" name="alasan" id="alasan" rows="5"
                                                                placeholder="Alasan meninggalkan PAUD / TK..."></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button type="submit" id="submit" class="btn btn-primary">
                                                                    Tambah Peserta Didik
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <p><strong class="text-danger">Catatan :</strong> Klik
                                                                tombol
                                                                "Tambah Peserta Didik" jika calon peserta didik
                                                                mendaftarkan diri di
                                                                PAUD Tunas Aksara secara langsung dan bukan pindahan.</p>
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
    </script>
@endsection
