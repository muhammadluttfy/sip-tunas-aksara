@extends('layouts.app')

@section('style')
    <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
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
                            <li class="breadcrumb-item active" aria-current="page">Form Kelulusan |
                                <b>{{ $student->nama_lengkap }}</b>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="card-title">Form Kelulusan Peserta Didik KB Tunas Aksara</h5>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <hr />
                    <div class="mt-4 form-body">
                        <form action="/kb-tunas-aksara/peserta-didik-lulus/{{ $student->id }}" method="POST">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-12">
                                    <div class="p-4 border rounded border-3">
                                        <div class="row g-3">

                                            <div class="mb-1 col-12">
                                                <label for="tanggal_lulus_kb" class="form-label">
                                                    Tanggal
                                                    Kelulusan <strong class="text-danger">*</strong>(Diisi
                                                    jika peserta didik telah dinyatakan
                                                    lulus)
                                                </label>
                                                <input type="date"
                                                    class="form-control @error('tanggal_lulus_kb') is-invalid @enderror"
                                                    name="tanggal_lulus_kb" id="tanggal_lulus_kb" required
                                                    value="{{ old('tanggal_lulus_kb', $student->student_detail->tanggal_lulus_kb) }}">
                                                @error('tanggal_lulus_kb')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-1 col-12">
                                                <label for="jenjang_pendidikan" class="form-label">Jenjang
                                                    Pendidikan <strong class="text-danger">*</strong>(Pindah ke jenjang
                                                    pendidikan <b>TK Tunas Aksara</b> jika peserta didik sudah dinyatakan
                                                    lulus <b>KB Tunas Aksara</b>)</label>
                                                <select
                                                    class="form-select @error('jenjang_pendidikan') is-invalid @enderror"
                                                    name="jenjang_pendidikan" id="jenjang_pendidikan">
                                                    @if (old('jenjang_pendidikan', $student->level->jenjang_pendidikan) == 'KB Tunas Aksara')
                                                        <option value="1" selected>KB Tunas Aksara</option>
                                                        <option value="2">TK Tunas Aksara</option>
                                                    @else
                                                        <option value="1">KB Tunas Aksara</option>
                                                        <option value="2" selected>TK Tunas Aksara</option>
                                                    @endif
                                                </select>
                                                @error('jenjang_pendidikan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-1 col-12">
                                                <div class="d-grid">
                                                    <button type="submit" id="submit" class="btn btn-primary">Tambah Peserta
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
