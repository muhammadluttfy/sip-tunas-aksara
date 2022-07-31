@extends('layouts.app')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">Program PAUD</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Program</li>
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
                                    <form action="{{ route('ppdb.updateProgram', $program->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Nama Program</h6>
                                            </div>
                                            <div
                                                class="col-sm-9 text-secondary @error('nama_program') is-invalid @enderror">
                                                <input type="text" name="nama_program" id="nama_program"
                                                    class="form-control"
                                                    value="{{ old('nama_program', $program->nama_program) }}" required />
                                            </div>

                                            @error('nama_program')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Status Program</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary @error('status') is-invalid @enderror">
                                                <select class="form-select " name="status" id="status" required="">
                                                    @if ($program->status == 'Buka')
                                                        <option value="Buka" selected>Buka</option>
                                                        <option value="Tutup">Tutup</option>
                                                    @else
                                                        <option value="Buka">Buka</option>
                                                        <option value="Tutup" selected>Tutup</option>
                                                    @endif
                                                </select>
                                            </div>

                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Tangal Mulai</h6>
                                            </div>
                                            <div
                                                class="col-sm-9 text-secondary @error('mulai_program') is-invalid @enderror">
                                                <input type="date" class="form-control " name="mulai_program"
                                                    id="mulai_program" placeholder="dd-mm-yyyy" required=""
                                                    value="{{ old('mulai_program', $program->mulai_program) }}">
                                            </div>

                                            @error('mulai_program')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-3">
                                                <h6 class="mb-2 mb-md-0">Tangal Mulai</h6>
                                            </div>
                                            <div
                                                class="col-sm-9 text-secondary @error('selesai_program') is-invalid @enderror">
                                                <input type="date" class="form-control " name="selesai_program"
                                                    id="selesai_program" placeholder="dd-mm-yyyy" required=""
                                                    value="{{ old('selesai_program', $program->selesai_program) }}">
                                            </div>

                                            @error('selesai_program')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <button type="submit" id="submit" class="px-4 btn btn-primary">
                                                    Update Program
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
@endsection
