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
                <div class="breadcrumb-title pe-3">Kelulusan</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('playgroup.index') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $student->nama_lengkap }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="card-title">Form Konfirmasi Kelulusan</h5>
                    <hr />

                    <div class="mt-4 form-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <div class="p-4 border rounded border-3">
                                    @if ($student->level_id == 1 || $student->level_id == 2)
                                        <form action="{{ route('graduate.store', $student->username) }}" method="POST">
                                            <div class="row g-3">
                                                @csrf

                                                @if ($student->level_id == 1)
                                                    <div class="col-md-6">
                                                        <label for="tanggal_lulus_kb" class="form-label"><span
                                                                class="text-danger">*</span>Tanggal
                                                            Lulus KB</label>
                                                        <input type="date"
                                                            class="form-control @error('tanggal_lulus_kb') is-invalid @enderror"
                                                            name="tanggal_lulus_kb" id="tanggal_lulus_kb" required>
                                                        @error('tanggal_lulus_kb')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                @elseif($student->level_id == 2)
                                                    <div class="col-md-6">
                                                        <label for="tanggal_lulus_tk" class="form-label"><span
                                                                class="text-danger">*</span>Tanggal
                                                            Lulus TK</label>
                                                        <input type="date"
                                                            class="form-control @error('tanggal_lulus_tk') is-invalid @enderror"
                                                            name="tanggal_lulus_tk" id="tanggal_lulus_tk" required>
                                                        @error('tanggal_lulus_tk')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                @endif

                                                <div class="col-md-6">
                                                    <label for="level_id" class="form-label"><span
                                                            class="text-danger">*</span>Lanjut Jenjang Pendidikan
                                                        ke-</label>
                                                    <select class="form-select @error('level_id') is-invalid @enderror"
                                                        name="level_id" id="level_id">
                                                        @if (old('level_id', $student->level_id) == '1')
                                                            <option value="2" selected>TK Tunas Aksara</option>
                                                            <option value="3">Pindah PAUD</option>
                                                        @elseif (old('level_id', $student->level_id) == '2')
                                                            <option value="4" selected>Lulus PAUD Tunas Aksara</option>
                                                        @endif
                                                    </select>
                                                </div>

                                                @if ($student->level_id == 1)
                                                    <div class="mt-4 col-12" style="margin-top: -0px !important">
                                                        <hr>
                                                        <p><span class="text-danger">Catatan : </span>Form dibawah ini diisi
                                                            jika
                                                            peserta didik
                                                            pindah
                                                            PAUD
                                                        </p>

                                                        <label for="paud_tujuan_pindah" class="form-label">Pindah ke
                                                            PAUD</label>
                                                        <input type="text"
                                                            class="form-control @error('paud_tujuan_pindah') is-invalid @enderror"
                                                            name="paud_tujuan_pindah" id="paud_tujuan_pindah"">
                                                        @error('paud_tujuan_pindah')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="alasan_pindah_paud" class="form-label">Alasan</label>
                                                        <textarea class="form-control @error('alasan_pindah_paud') is-invalid @enderror" name="alasan_pindah_paud"
                                                            id="alasan_pindah_paud" rows="5" placeholder="Alasan meninggalkan PAUD Tunas Aksara..."></textarea>
                                                        @error('alasan_pindah_paud')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                @endif

                                                <div class="col-md-4">
                                                    <button type="submit" class="px-5 btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    @elseif($student->level_id == 3)
                                        <div class="text-center row justify-content-center">
                                            <p class="text-center">Peserta didik <b>{{ $student->nama_lengkap }}</b> telah
                                                <span class="text-success">dinyatakan lulus KB Tunas Aksara dan
                                                    pindah</span> ke
                                                {{ $student->student_detail->paud_tujuan_pindah }} pada tanggal
                                                {{ date('d F Y', strtotime($student->student_detail->tanggal_lulus_kb)) }}
                                            </p>
                                            </p>
                                            <div class="col-md-4">
                                                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to
                                                    Dashboard</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center row justify-content-center">
                                            <p class="text-center">Peserta didik <b>{{ $student->nama_lengkap }}</b>
                                                sudah
                                                <span class="text-success">dinyatakan lulus</span> PAUD Tunas Aksara pada
                                                tanggal
                                                {{ date('d F Y', strtotime($student->student_detail->tanggal_lulus_tk)) }}
                                            </p>
                                            <div class="col-md-4">
                                                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to
                                                    Dashboard</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->
@endsection
