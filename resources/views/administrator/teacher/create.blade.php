@extends('layouts.app')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">Data Guru</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data Tenaga Pendidik</li>
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
                                    <form action="{{ route('teacher.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Foto Profil</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <div class="input-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-2">
                                                            <img class="p-1 mb-2 rounded avatar-preview bg-primary mb-md-0"
                                                                width="70">
                                                        </div>

                                                        <div class="col-12 col-md-10">
                                                            <input type="file"
                                                                class="form-control @error('avatar') is-invalid @enderror"
                                                                id="avatar" name="avatar" onchange="previewAvatar()"
                                                                required>
                                                            @error('avatar')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Nama Lengkap</h6>
                                            </div>
                                            <div
                                                class="col-sm-9 text-secondary @error('nama_lengkap') is-invalid @enderror">
                                                <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                    class="form-control" value="{{ old('nama_lengkap') }}" required />
                                            </div>

                                            @error('nama_lengkap')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Username</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary @error('username') is-invalid @enderror">
                                                <input type="text" name="username" id="username" class="form-control"
                                                    value="{{ old('username') }}" />
                                            </div>

                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Tanggal Lahir</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary @error('username') is-invalid @enderror">
                                                <input type="date"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    name="tanggal_lahir" id="tanggal_lahir" placeholder="dd-mm-yyyy"
                                                    required value="{{ old('tanggal_lahir') }}">
                                                @error('tanggal_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Jabatan</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select class="form-select @error('jabatan') is-invalid @enderror"
                                                    name="jabatan" id="jabatan" required>
                                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Sekretaris">Sekretaris</option>
                                                    <option value="Bendahara">Bendahara</option>
                                                    <option value="Guru">Guru</option>
                                                </select>
                                            </div>

                                            @error('jabatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary @error('email') is-invalid @enderror">
                                                <input type="email" name="email" id="email" class="form-control"
                                                    value="{{ old('email') }}" />
                                            </div>

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Sosial Media</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary @error('instagram') is-invalid @enderror">
                                                <div class="row">
                                                    <div class=" col-md-4 mt-md-0">
                                                        <label for="instagram" class="form-label">Instagram</label>
                                                        <input type="test" name="instagram" id="instagram"
                                                            class="form-control" placeholder="Username"
                                                            value="{{ old('instagram') }}" />

                                                        @error('instagram')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mt-3 col-md-4 mt-md-0">
                                                        <label for="facebook" class="form-label">Facebook</label>
                                                        <input type="test" name="facebook" id="facebook"
                                                            class="form-control" placeholder="Username"
                                                            value="{{ old('facebook') }}" />

                                                        @error('facebook')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mt-3 col-md-4 mt-md-0">
                                                        <label for="whatsapp" class="form-label">Whatsapp</label>
                                                        <input type="test" name="whatsapp" id="whatsapp"
                                                            class="form-control" placeholder="No. Whatsapp"
                                                            value="{{ old('whatsapp') }}" />

                                                        @error('whatsapp')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Password</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" name="password"
                                                        id="password" placeholder="Enter Password"> <a href="javascript:;"
                                                        class="bg-transparent input-group-text"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                        </div> --}}


                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <button type="submit" id="submit" class="px-4 btn btn-primary">
                                                    Tambah Tenaga Pendidik
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
        // avatarPreview
        function previewAvatar() {
            const avatar = document.querySelector('#avatar');
            const avatarPreview = document.querySelector('.avatar-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(avatar.files[0]);
            oFReader.onload = function(oFREvent) {
                avatarPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
