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
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $letter->no_surat }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('letter.update', $letter->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Asal Surat</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="asal_surat" id="asal_surat" class="form-control"
                                                    value="{{ $letter->asal_surat }}" disabled />
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Nomor Surat</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="no_surat" id="no_surat" class="form-control"
                                                    value="{{ $letter->no_surat }}" disabled />
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Perihal</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="perihal" id="perihal" class="form-control"
                                                    value="{{ $letter->perihal }}" disabled />
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Tujuan</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="tujuan" id="tujuan" class="form-control"
                                                    value="{{ $letter->tujuan }}" disabled />
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Tanggal Surat</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="date" class="form-control" name="tanggal_surat"
                                                    id="tanggal_surat" placeholder="dd-mm-yyyy"
                                                    value="{{ old('tanggal_surat', $letter->tanggal_surat) }}" disabled>
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Jenis Surat</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="jenis_surat" id="jenis_surat"
                                                    class="form-control" value="{{ $letter->letter_category->nama }}"
                                                    disabled />
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Keterangan</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <div class="mx-1 p-2 rounded border text-dark"
                                                    style="background-color: #E9ECEF">
                                                    <p>{!! $letter->keterangan !!}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Foto Surat</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                @if ($letter->image)
                                                    <img src="{{ asset('storage/' . $letter->image) }}"
                                                        class="mb-3 img-preview img-fluid col-sm-5">
                                                @else
                                                    <p class="text-danger">*Tidak ada gambar</p>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
