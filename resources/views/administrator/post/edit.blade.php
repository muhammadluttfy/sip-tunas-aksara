@extends('layouts.app')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">Edit</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->judul }}</li>
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
                                    <form action="{{ route('posts.update', $post->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Judul</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary @error('judul') is-invalid @enderror">
                                                <input type="text" name="judul" id="judul" class="form-control"
                                                    value="{{ old('judul', $post->judul) }}" />
                                            </div>

                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Banner</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary @error('banner') is-invalid @enderror">
                                                <input type="hidden" name="oldImage" value="{{ $post->image }}">

                                                @if ($post->image)
                                                    <img src="{{ asset('storage/' . $post->image) }}"
                                                        class="mb-3 img-preview img-fluid col-sm-5">
                                                @else
                                                    <img class="mb-3 img-preview img-fluid col-sm-5">
                                                @endif
                                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                                    id="image" name="image" onchange="previewImage()">

                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            @error('banner')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Kategori</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select class="form-select @error('kategori') is-invalid @enderror"
                                                    name="kategori" id="kategori">
                                                    @foreach ($categories as $category)
                                                        @if (old('kategori', $post->category_id) == $category->id)
                                                            <option value="{{ $category->id }}" selected>
                                                                {{ $category->nama }}</option>
                                                        @else
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->nama }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            @error('kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Konten</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary @error('konten') is-invalid @enderror">
                                                <input id="konten" type="hidden" name="konten"
                                                    value="{{ old('konten', $post->konten) }}">
                                                <trix-editor input="konten"></trix-editor>
                                            </div>

                                            @error('konten')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <button type="submit" id="submit" class="px-4 btn btn-primary">
                                                    Simpan Perubahan
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
