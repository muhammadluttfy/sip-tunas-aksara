    @extends('layouts.app')
    @section('wrapper')
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="breadcrumb-title pe-3">Forum PAUD</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Postingan</li>
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
                                        <form action="{{ route('incoming.letter.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-2 mb-md-0">Asal Surat</h6>
                                                </div>
                                                <div
                                                    class="col-sm-9 text-secondary @error('asal_surat') is-invalid @enderror">
                                                    <input type="text" name="asal_surat" id="asal_surat"
                                                        class="form-control" value="{{ old('asal_surat') }}" />
                                                </div>
                                                @error('asal_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-2 mb-md-0">Nomor Surat</h6>
                                                </div>
                                                <div
                                                    class="col-sm-9 text-secondary @error('no_surat') is-invalid @enderror">
                                                    <input type="text" name="no_surat" id="no_surat"
                                                        class="form-control" value="{{ old('no_surat') }}" />
                                                </div>
                                                @error('no_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-2 mb-md-0">Perihal</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary @error('perihal') is-invalid @enderror">
                                                    <input type="text" name="perihal" id="perihal" class="form-control"
                                                        value="{{ old('perihal') }}" />
                                                    @error('perihal')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-2 mb-md-0">Tujuan</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary @error('tujuan') is-invalid @enderror">
                                                    <input type="text" name="tujuan" id="tujuan" class="form-control"
                                                        value="{{ old('tujuan') }}" />
                                                </div>
                                                @error('tujuan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-2 mb-md-0">Tanggal Surat</h6>
                                                </div>
                                                <div
                                                    class="col-sm-9 text-secondary @error('no_surat') is-invalid @enderror">
                                                    <input type="date"
                                                        class="form-control @error('tanggal_surat') is-invalid @enderror"
                                                        name="tanggal_surat" id="tanggal_surat" placeholder="dd-mm-yyyy"
                                                        value="{{ old('tanggal_surat') }}">
                                                </div>
                                                @error('tanggal_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-2 mb-md-0">Jenis Surat</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <select class="form-select @error('jenis_surat') is-invalid @enderror"
                                                        name="jenis_surat" id="jenis_surat">
                                                        @foreach ($categories as $category)
                                                            @if (old('jenis_surat') == $category->id)
                                                                <option value="{{ $category->id }}" selected>
                                                                    {{ $category->nama }}</option>
                                                            @else
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->nama }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('jenis_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-2 mb-md-0">Tipe Surat</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <select class="form-select @error('tipe_surat') is-invalid @enderror"
                                                        name="tipe_surat" id="tipe_surat">
                                                        <option value="Surat Masuk">Surat Masuk</option>
                                                        <option value="Surat Keluar">Surat Keluar</option>
                                                    </select>
                                                </div>
                                                @error('tipe_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-2 mb-md-0">Keterangan</h6>
                                                </div>
                                                <div
                                                    class="col-sm-9 text-secondary @error('keterangan') is-invalid @enderror">
                                                    <input id="keterangan" type="hidden" name="keterangan"
                                                        value="{{ old('keterangan') }}">
                                                    <trix-editor input="keterangan"></trix-editor>
                                                </div>

                                                @error('keterangan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="mb-3 row align-items-center">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-2 mb-md-0">Foto Surat</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary @error('banner') is-invalid @enderror">
                                                    <img class="mb-3 img-preview img-fluid col-sm-5">
                                                    <input class="form-control @error('image') is-invalid @enderror"
                                                        type="file" id="image" name="image"
                                                        onchange="previewImage()">

                                                    @error('image')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <button type="submit" id="submit" class="px-4 btn btn-primary">
                                                        Tambah Surat
                                                    </button>
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
