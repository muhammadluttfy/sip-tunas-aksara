@extends('layouts.app')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">Raport</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('raport.show', $student->id) }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $student->nama_lengkap }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
                <div class="col">
                    <h6 class="mb-0 text-uppercase">Nilai / Raport Peserta Didik</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('raport.updateSemester6', $student->username) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-3 mb-lg-0">
                                        <div class="form-group">
                                            <label for="">Nama Peserta Didik</label>
                                            <input type="text" class="form-control"
                                                value="{{ $student->nama_lengkap }}" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-3 mb-lg-0">
                                        <div class="form-group">
                                            <label for="">
                                                Pilih Semester <span class="text-danger">(*Wajib
                                                    dipilih)</span>
                                            </label>
                                            <select name="semester" id="semester"
                                                class="form-control @error('semester') is-invalid @enderror" required>
                                                <option value="1">Semester 1</option>
                                                <option value="2">Semester 2</option>
                                                <option value="3">Semester 3</option>
                                                <option value="4">Semester 4</option>
                                                <option value="5">Semester 5</option>
                                                <option value="6" selected>Semester 6</option>
                                                <option value="7">Semester 7</option>
                                                <option value="8">Semester 8</option>
                                            </select>
                                            @error('semester')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-2 mb-lg-0">
                                        <div class="form-group">
                                            <label for="">
                                                Tahun Ajaran<span class="text-danger">*</span>
                                            </label>
                                            <select name="tahun_ajaran" id="tahun_ajaran"
                                                class="form-control @error('tahun_ajaran') is-invalid @enderror" required>
                                                <option value="1" selected disabled>-- Pilih Tahun Ajaran --
                                                </option>
                                                <option value="{{ $raport_6->tahun_ajaran }}" selected>
                                                    {{ $raport_6->tahun_ajaran }}</option>
                                                @foreach ($years as &$year)
                                                    <option value="{{ $year = $year . '/' . ($year + 1) }}">
                                                        {{ $year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tahun_ajaran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-2 mb-lg-0">
                                        <div class="form-group">
                                            <label for="">
                                                Tanggal Mulai<span class="text-danger">*</span>
                                            </label>
                                            <input type="date"
                                                class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                                name="tanggal_mulai" id="tanggal_mulai" placeholder="dd-mm-yyyy" required
                                                value="{{ old('tanggal_mulai', $raport_6->tanggal_mulai) }}">
                                            @error('tanggal_mulai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-2 mb-lg-0">
                                        <div class="form-group">
                                            <label for="">
                                                Tanggal Selesai<span class="text-danger">*</span>
                                            </label>
                                            <input type="date"
                                                class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                                name="tanggal_selesai" id="tanggal_selesai" placeholder="dd-mm-yyyy"
                                                required
                                                value="{{ old('tanggal_selesai', $raport_6->tanggal_selesai) }}">
                                            @error('tanggal_selesai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="">No.</th>
                                                        <th width="" class="text-center">URAIAN PROGRAM
                                                            PENGEMBANGAN KEMAMPUAN
                                                        </th>
                                                        <th width="30%" class="text-center" colspan="4">
                                                            NILAI
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- Penilaian A --}}
                                                    <tr>
                                                        <th>A</th>
                                                        <th class="text-uppercase">Pembentukan
                                                            Perilaku Melalui
                                                            Pembiasaan Moral dan nilai -
                                                            Nilai Agama, Sosial, Emosional dan Kemandirian</th>
                                                        <th wid class="text-center">BB</th>
                                                        <th wid class="text-center">MB</th>
                                                        <th wid class="text-center">BSH</th>
                                                        <th wid class="text-center">BSB</th>
                                                    </tr>
                                                    <div class="behavior_formations">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Berdoa sebelum dan sesudah melaksanakan kegiatan
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_1" name="point_1" class="form-select">
                                                                    @if (old('point_1', $raport_6->behavior_formation->point_1) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_1', $raport_6->behavior_formation->point_1) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_1', $raport_6->behavior_formation->point_1) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_1', $raport_6->behavior_formation->point_1) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Menyanyikan lagu - lagu bernafaskan agama yang
                                                                sederhana
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_2" name="point_2"
                                                                    class="form-select">
                                                                    @if (old('point_2', $raport_6->behavior_formation->point_2) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_1', $raport_6->behavior_formation->point_2) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_1', $raport_6->behavior_formation->point_2) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_1', $raport_6->behavior_formation->point_2) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>
                                                                Menyebut tempat - tempat ibadah
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_3" name="point_3"
                                                                    class="form-select">
                                                                    @if (old('point_3', $raport_6->behavior_formation->point_3) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_3', $raport_6->behavior_formation->point_3) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_3', $raport_6->behavior_formation->point_3) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_3', $raport_6->behavior_formation->point_3) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>
                                                                Menyebut hari - hari besar Agama
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_4" name="point_4"
                                                                    class="form-select">
                                                                    @if (old('point_4', $raport_6->behavior_formation->point_4) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_4', $raport_6->behavior_formation->point_4) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_4', $raport_6->behavior_formation->point_4) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_4', $raport_6->behavior_formation->point_4) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Meniru pelaksanaan kegiatan ibadah secara sederhana
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_5" name="point_5"
                                                                    class="form-select">
                                                                    @if (old('point_5', $raport_6->behavior_formation->point_5) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_5', $raport_6->behavior_formation->point_5) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_5', $raport_6->behavior_formation->point_5) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_5', $raport_6->behavior_formation->point_5) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>6</td>
                                                            <td>Menyebutkan waktu beribadah</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_6" name="point_6"
                                                                    class="form-select">
                                                                    @if (old('point_6', $raport_6->behavior_formation->point_6) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_6', $raport_6->behavior_formation->point_6) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_6', $raport_6->behavior_formation->point_6) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_6', $raport_6->behavior_formation->point_6) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>7</td>
                                                            <td>Menyebutkan ciptaan - ciptaan Tuhan (manusia, bumi,
                                                                langit,
                                                                tanaman, hewan)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_7" name="point_7"
                                                                    class="form-select">
                                                                    @if (old('point_7', $raport_6->behavior_formation->point_7) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_7', $raport_6->behavior_formation->point_7) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_7', $raport_6->behavior_formation->point_7) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_7', $raport_6->behavior_formation->point_7) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>8</td>
                                                            <td>Tidak mengganggu teman yang sedang melakukan
                                                                kegiatan /
                                                                melaksanakan ibadah</td>

                                                            <td class="text-center" colspan="4">
                                                                <select id="point_8" name="point_8"
                                                                    class="form-select">
                                                                    @if (old('point_8', $raport_6->behavior_formation->point_8) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_8', $raport_6->behavior_formation->point_8) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_8', $raport_6->behavior_formation->point_8) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_8', $raport_6->behavior_formation->point_8) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>9</td>
                                                            <td>
                                                                Berterima kasih jika memperoleh sesuatu
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_9" name="point_9"
                                                                    class="form-select">
                                                                    @if (old('point_9', $raport_6->behavior_formation->point_9) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_9', $raport_6->behavior_formation->point_9) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_9', $raport_6->behavior_formation->point_9) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_9', $raport_6->behavior_formation->point_9) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>
                                                                Selalu bersikap ramah
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_10" name="point_10"
                                                                    class="form-select">
                                                                    @if (old('point_10', $raport_6->behavior_formation->point_10) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_10', $raport_6->behavior_formation->point_10) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_10', $raport_6->behavior_formation->point_10) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_10', $raport_6->behavior_formation->point_10) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>11</td>
                                                            <td>
                                                                Meminta tolong dengan baik, mengucapkan salam
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_11" name="point_11"
                                                                    class="form-select">
                                                                    @if (old('point_11', $raport_6->behavior_formation->point_11) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_11', $raport_6->behavior_formation->point_11) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_11', $raport_6->behavior_formation->point_11) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_11', $raport_6->behavior_formation->point_11) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>12</td>
                                                            <td>
                                                                Melaksanakan tata tertib yang ada di sekolah
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_12" name="point_12"
                                                                    class="form-select">
                                                                    @if (old('point_12', $raport_6->behavior_formation->point_12) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_12', $raport_6->behavior_formation->point_12) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_12', $raport_6->behavior_formation->point_12) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_12', $raport_6->behavior_formation->point_12) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>13</td>
                                                            <td>
                                                                Mengikuti aturan permainan
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_13" name="point_13"
                                                                    class="form-select">
                                                                    @if (old('point_13', $raport_6->behavior_formation->point_13) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_13', $raport_6->behavior_formation->point_13) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_13', $raport_6->behavior_formation->point_13) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_13', $raport_6->behavior_formation->point_13) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>14</td>
                                                            <td>Mau mengalah</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_14" name="point_14"
                                                                    class="form-select">
                                                                    @if (old('point_14', $raport_6->behavior_formation->point_14) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_14', $raport_6->behavior_formation->point_14) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_14', $raport_6->behavior_formation->point_14) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_14', $raport_6->behavior_formation->point_14) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>15</td>
                                                            <td>Mendengarkan orang tua / teman bicara</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_15" name="point_15"
                                                                    class="form-select">
                                                                    @if (old('point_15', $raport_6->behavior_formation->point_15) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_15', $raport_6->behavior_formation->point_15) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_15', $raport_6->behavior_formation->point_15) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_15', $raport_6->behavior_formation->point_15) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>16</td>
                                                            <td>Berbahasa sopan dalam berbicara</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_16" name="point_16"
                                                                    class="form-select">
                                                                    @if (old('point_16', $raport_6->behavior_formation->point_16) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_16', $raport_6->behavior_formation->point_16) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_16', $raport_6->behavior_formation->point_16) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_16', $raport_6->behavior_formation->point_16) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>17</td>
                                                            <td>tidak lekas marah atau membentak - bentak</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_17" name="point_17"
                                                                    class="form-select">
                                                                    @if (old('point_17', $raport_6->behavior_formation->point_17) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_17', $raport_6->behavior_formation->point_17) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_17', $raport_6->behavior_formation->point_17) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_17', $raport_6->behavior_formation->point_17) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>18</td>
                                                            <td>Mudah bergaul / berteman</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_18" name="point_18"
                                                                    class="form-select">
                                                                    @if (old('point_18', $raport_6->behavior_formation->point_18) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_18', $raport_6->behavior_formation->point_18) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_18', $raport_6->behavior_formation->point_18) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_18', $raport_6->behavior_formation->point_18) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>19</td>
                                                            <td>Dapat / suka menolong teman</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_19" name="point_19"
                                                                    class="form-select">
                                                                    @if (old('point_19', $raport_6->behavior_formation->point_19) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_19', $raport_6->behavior_formation->point_19) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_19', $raport_6->behavior_formation->point_19) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_19', $raport_6->behavior_formation->point_19) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>20</td>
                                                            <td>Saling membantu sesama teman</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_20" name="point_20"
                                                                    class="form-select">
                                                                    @if (old('point_20', $raport_6->behavior_formation->point_20) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_20', $raport_6->behavior_formation->point_20) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_20', $raport_6->behavior_formation->point_20) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_20', $raport_6->behavior_formation->point_20) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>21</td>
                                                            <td>Saling membantu sesama teman</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_21" name="point_21"
                                                                    class="form-select">
                                                                    @if (old('point_21', $raport_6->behavior_formation->point_21) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_21', $raport_6->behavior_formation->point_21) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_21', $raport_6->behavior_formation->point_21) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_21', $raport_6->behavior_formation->point_21) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>22</td>
                                                            <td>Menunjukkan kebanggaan terhadap hasil kerjanya</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_22" name="point_22"
                                                                    class="form-select">
                                                                    @if (old('point_22', $raport_6->behavior_formation->point_22) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_22', $raport_6->behavior_formation->point_22) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_22', $raport_6->behavior_formation->point_22) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_22', $raport_6->behavior_formation->point_22) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>23</td>
                                                            <td>Menggunakan barang orang lain dengan hati - hati
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_23" name="point_23"
                                                                    class="form-select">
                                                                    @if (old('point_23', $raport_6->behavior_formation->point_23) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_23', $raport_6->behavior_formation->point_23) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_23', $raport_6->behavior_formation->point_23) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_23', $raport_6->behavior_formation->point_23) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>24</td>
                                                            <td>Mau membagi miliknya (makn, minum, dll)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_24" name="point_24"
                                                                    class="form-select">
                                                                    @if (old('point_24', $raport_6->behavior_formation->point_24) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_24', $raport_6->behavior_formation->point_24) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_24', $raport_6->behavior_formation->point_24) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_24', $raport_6->behavior_formation->point_24) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>25</td>
                                                            <td>Meminjamkan miliknya dengan senang hati</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_25" name="point_25"
                                                                    class="form-select">
                                                                    @if (old('point_25', $raport_6->behavior_formation->point_25) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_25', $raport_6->behavior_formation->point_25) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_25', $raport_6->behavior_formation->point_25) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_25', $raport_6->behavior_formation->point_25) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>26</td>
                                                            <td>Membersihkan diri sendiri dengan bantuan (menggosok
                                                                gigi,
                                                                mandi, buang air, dll)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_26" name="point_26"
                                                                    class="form-select">
                                                                    @if (old('point_26', $raport_6->behavior_formation->point_26) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_26', $raport_6->behavior_formation->point_26) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_26', $raport_6->behavior_formation->point_26) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_26', $raport_6->behavior_formation->point_26) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>27</td>
                                                            <td>Mengurus dirinya sendiri dengan sedikit bantuan
                                                                (berpakaian
                                                                sendiri, makan sendiri, dll)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_27" name="point_27"
                                                                    class="form-select">
                                                                    @if (old('point_27', $raport_6->behavior_formation->point_27) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_27', $raport_6->behavior_formation->point_27) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_27', $raport_6->behavior_formation->point_27) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_27', $raport_6->behavior_formation->point_27) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>28</td>
                                                            <td>Mengembalikan mainan pada tempatnya setelah
                                                                digunakan
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_28" name="point_28"
                                                                    class="form-select">
                                                                    @if (old('point_28', $raport_6->behavior_formation->point_28) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_28', $raport_6->behavior_formation->point_28) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_28', $raport_6->behavior_formation->point_28) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_28', $raport_6->behavior_formation->point_28) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>29</td>
                                                            <td>Membuang sampah pada tempatnya</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_29" name="point_29"
                                                                    class="form-select">
                                                                    @if (old('point_29', $raport_6->behavior_formation->point_29) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_29', $raport_6->behavior_formation->point_29) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_29', $raport_6->behavior_formation->point_29) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_29', $raport_6->behavior_formation->point_29) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>30</td>
                                                            <td>Membantu membersihkan lingkungan</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_30" name="point_30"
                                                                    class="form-select">
                                                                    @if (old('point_30', $raport_6->behavior_formation->point_30) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_30', $raport_6->behavior_formation->point_30) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_30', $raport_6->behavior_formation->point_30) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_30', $raport_6->behavior_formation->point_30) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>31</td>
                                                            <td>Mau berpisah dengan ibu tanpa menangis</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_31" name="point_31"
                                                                    class="form-select">
                                                                    @if (old('point_31', $raport_6->behavior_formation->point_31) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_31', $raport_6->behavior_formation->point_31) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_31', $raport_6->behavior_formation->point_31) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_31', $raport_6->behavior_formation->point_31) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>32</td>
                                                            <td>Sabar menunggu giliran</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_32" name="point_32"
                                                                    class="form-select">
                                                                    @if (old('point_32', $raport_6->behavior_formation->point_32) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_32', $raport_6->behavior_formation->point_32) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_32', $raport_6->behavior_formation->point_32) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_32', $raport_6->behavior_formation->point_32) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>33</td>
                                                            <td>Berhenti bermain pada waktunya</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_33" name="point_33"
                                                                    class="form-select">
                                                                    @if (old('point_33', $raport_6->behavior_formation->point_33) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_33', $raport_6->behavior_formation->point_33) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_33', $raport_6->behavior_formation->point_33) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_33', $raport_6->behavior_formation->point_33) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>34</td>
                                                            <td>Dapat dibujuk</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_34" name="point_34"
                                                                    class="form-select">
                                                                    @if (old('point_34', $raport_6->behavior_formation->point_34) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_34', $raport_6->behavior_formation->point_34) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_34', $raport_6->behavior_formation->point_34) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_34', $raport_6->behavior_formation->point_34) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>35</td>
                                                            <td>Tidak cengeng</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_35" name="point_35"
                                                                    class="form-select">
                                                                    @if (old('point_35', $raport_6->behavior_formation->point_35) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_35', $raport_6->behavior_formation->point_35) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_35', $raport_6->behavior_formation->point_35) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_35', $raport_6->behavior_formation->point_35) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>36</td>
                                                            <td>Mau menerima tugas</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_36" name="point_36"
                                                                    class="form-select">
                                                                    @if (old('point_36', $raport_6->behavior_formation->point_36) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_36', $raport_6->behavior_formation->point_36) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_36', $raport_6->behavior_formation->point_36) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_36', $raport_6->behavior_formation->point_36) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>37</td>
                                                            <td>Mengerjakan tugas sampai selesai</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_37" name="point_37"
                                                                    class="form-select">
                                                                    @if (old('point_37', $raport_6->behavior_formation->point_37) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_37', $raport_6->behavior_formation->point_37) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_37', $raport_6->behavior_formation->point_37) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_37', $raport_6->behavior_formation->point_37) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>38</td>
                                                            <td>Mengenal dan menghindari benda - benda yang
                                                                berbahaya
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_38" name="point_38"
                                                                    class="form-select">
                                                                    @if (old('point_38', $raport_6->behavior_formation->point_38) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_38', $raport_6->behavior_formation->point_38) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_38', $raport_6->behavior_formation->point_38) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_38', $raport_6->behavior_formation->point_38) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>39</td>
                                                            <td>Mengenal dan menghindari obat - obatan yang
                                                                berbahaya
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_39" name="point_39"
                                                                    class="form-select">
                                                                    @if (old('point_39', $raport_6->behavior_formation->point_39) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_39', $raport_6->behavior_formation->point_39) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_39', $raport_6->behavior_formation->point_39) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_39', $raport_6->behavior_formation->point_39) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>40</td>
                                                            <td>Melaksanakan tugas yang diberikan guru</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_40" name="point_40"
                                                                    class="form-select">
                                                                    @if (old('point_40', $raport_6->behavior_formation->point_40) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_40', $raport_6->behavior_formation->point_40) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_40', $raport_6->behavior_formation->point_40) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_40', $raport_6->behavior_formation->point_40) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>41</td>
                                                            <td>Mengetahui barang milik sendiri dan milik orang lain
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_41" name="point_41"
                                                                    class="form-select">
                                                                    @if (old('point_41', $raport_6->behavior_formation->point_41) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_41', $raport_6->behavior_formation->point_41) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_41', $raport_6->behavior_formation->point_41) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_41', $raport_6->behavior_formation->point_41) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </div>


                                                    {{-- Penilaian B-1 --}}
                                                    <tr>
                                                        <td></td>
                                                        <th colspan="5" class="text-uppercase">Kemampuan
                                                            Berbahasa
                                                        </th>
                                                    </tr>
                                                    <div class="language_abilities">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Menyebutkan berbagai bunyi / suara tertentu</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_42" name="point_42"
                                                                    class="form-select">
                                                                    @if (old('point_42', $raport_6->language_ability->point_1) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_42', $raport_6->language_ability->point_1) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_42', $raport_6->language_ability->point_1) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_42', $raport_6->language_ability->point_1) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Menirukan kembali 3 - 4 urutan kata</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_43" name="point_43"
                                                                    class="form-select">
                                                                    @if (old('point_43', $raport_6->language_ability->point_2) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_43', $raport_6->language_ability->point_2) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_43', $raport_6->language_ability->point_2) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_43', $raport_6->language_ability->point_2) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>Menyebutkan kata - kata yang mempunyai suku kata
                                                                awal yang sama, <br> misal : kaki - kali. atau suku
                                                                kata akhir yang sama, misal : nama - sama, dll</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_44" name="point_44"
                                                                    class="form-select">
                                                                    @if (old('point_44', $raport_6->language_ability->point_3) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_44', $raport_6->language_ability->point_3) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_44', $raport_6->language_ability->point_3) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_44', $raport_6->language_ability->point_3) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>Melakukan 2 - 3 perintah secara sederhana</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_45" name="point_45"
                                                                    class="form-select">
                                                                    @if (old('point_45', $raport_6->language_ability->point_4) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_45', $raport_6->language_ability->point_4) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_45', $raport_6->language_ability->point_4) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_45', $raport_6->language_ability->point_4) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Mendengarkan cerita dan menceritakan kembali isi
                                                                cerita secara sederhana</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_46" name="point_46"
                                                                    class="form-select">
                                                                    @if (old('point_46', $raport_6->language_ability->point_5) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_46', $raport_6->language_ability->point_5) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_46', $raport_6->language_ability->point_5) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_46', $raport_6->language_ability->point_5) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>6</td>
                                                            <td>Menyebutkan nama diri, nama orang tua, jenis
                                                                kelamin, alamat rumah secara sederhana</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_47" name="point_47"
                                                                    class="form-select">
                                                                    @if (old('point_47', $raport_6->language_ability->point_6) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_47', $raport_6->language_ability->point_6) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_47', $raport_6->language_ability->point_6) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_47', $raport_6->language_ability->point_6) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>7</td>
                                                            <td>Menceritakan pengalaman / kejadian secara sederhana
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_48" name="point_48"
                                                                    class="form-select">
                                                                    @if (old('point_48', $raport_6->language_ability->point_7) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_48', $raport_6->language_ability->point_7) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_48', $raport_6->language_ability->point_7) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_48', $raport_6->language_ability->point_7) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>8</td>
                                                            <td>Menjawab pertanyaan tentang keterangan / informasi
                                                                secara sederhana</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_49" name="point_49"
                                                                    class="form-select">
                                                                    @if (old('point_49', $raport_6->language_ability->point_8) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_49', $raport_6->language_ability->point_8) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_49', $raport_6->language_ability->point_8) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_49', $raport_6->language_ability->point_8) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>9</td>
                                                            <td>Bercerita menggunakan kata ganti aku, saya</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_50" name="point_50"
                                                                    class="form-select">
                                                                    @if (old('point_50', $raport_6->language_ability->point_9) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_50', $raport_6->language_ability->point_9) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_50', $raport_6->language_ability->point_9) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_50', $raport_6->language_ability->point_9) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>Menunjukkan gerakan - gerakan, misal : duduk,
                                                                jongkok, berlari, makan, melompat, menangis, senang,
                                                                sedih, dll</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_51" name="point_51"
                                                                    class="form-select">
                                                                    @if (old('point_51', $raport_6->language_ability->point_10) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_51', $raport_6->language_ability->point_10) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_51', $raport_6->language_ability->point_10) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_51', $raport_6->language_ability->point_10) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>11</td>
                                                            <td>Menyebutkan posisi / keterangan tempat, misal : di
                                                                luar, di dalam, di atas, di bawah, <br> di depan, di
                                                                belakang, di kiri, di kanan dsb</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_52" name="point_52"
                                                                    class="form-select">
                                                                    @if (old('point_52', $raport_6->language_ability->point_11) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_52', $raport_6->language_ability->point_11) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_52', $raport_6->language_ability->point_11) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_52', $raport_6->language_ability->point_11) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>12</td>
                                                            <td>Menyebutkan waktu (pagi, siang, malam)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_53" name="point_53"
                                                                    class="form-select">
                                                                    @if (old('point_53', $raport_6->language_ability->point_12) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_53', $raport_6->language_ability->point_12) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_53', $raport_6->language_ability->point_12) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_53', $raport_6->language_ability->point_12) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>13</td>
                                                            <td>Membuat berbagai macam coretan</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_54" name="point_54"
                                                                    class="form-select">
                                                                    @if (old('point_54', $raport_6->language_ability->point_13) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_54', $raport_6->language_ability->point_13) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_54', $raport_6->language_ability->point_13) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_54', $raport_6->language_ability->point_13) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>14</td>
                                                            <td>Membuat gambar dan coretan (tulisan) tentang cerita
                                                                mengenai gambar yang dibuatnya</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_55" name="point_55"
                                                                    class="form-select">
                                                                    @if (old('point_55', $raport_6->language_ability->point_14) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_55', $raport_6->language_ability->point_14) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_55', $raport_6->language_ability->point_14) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_55', $raport_6->language_ability->point_14) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>15</td>
                                                            <td>Bercerita tentang gambar yang disediakan atau yang
                                                                dibuat sendiri</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_56" name="point_56"
                                                                    class="form-select">
                                                                    @if (old('point_56', $raport_6->language_ability->point_15) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_56', $raport_6->language_ability->point_15) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_56', $raport_6->language_ability->point_15) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_56', $raport_6->language_ability->point_15) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>16</td>
                                                            <td>Mengurutkan dan menceritakan isi gambar seri
                                                                sederhana (3 - 4 gambar)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_57" name="point_57"
                                                                    class="form-select">
                                                                    @if (old('point_57', $raport_6->language_ability->point_16) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_57', $raport_6->language_ability->point_16) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_57', $raport_6->language_ability->point_16) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_57', $raport_6->language_ability->point_16) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>17</td>
                                                            <td>Menghubungkan gambar / benda dengan kata</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_58" name="point_58"
                                                                    class="form-select">
                                                                    @if (old('point_58', $raport_6->language_ability->point_17) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_58', $raport_6->language_ability->point_17) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_58', $raport_6->language_ability->point_17) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_58', $raport_6->language_ability->point_17) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>18</td>
                                                            <td>Membaca gambar yang memiliki kata / kalimat
                                                                sederhana</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_59" name="point_59"
                                                                    class="form-select">
                                                                    @if (old('point_59', $raport_6->language_ability->point_18) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_59', $raport_6->language_ability->point_18) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_59', $raport_6->language_ability->point_18) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_59', $raport_6->language_ability->point_18) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>19</td>
                                                            <td>Menceritakan isi buku walaupun tidak sama tulisan
                                                                dengan yang diungkapkan</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_60" name="point_60"
                                                                    class="form-select">
                                                                    @if (old('point_60', $raport_6->language_ability->point_19) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_60', $raport_6->language_ability->point_19) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_60', $raport_6->language_ability->point_19) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_60', $raport_6->language_ability->point_19) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>20</td>
                                                            <td>Menghubungkan tulisan sederhana dengan simbol yang
                                                                melambangkannya</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_61" name="point_61"
                                                                    class="form-select">
                                                                    @if (old('point_61', $raport_6->language_ability->point_20) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_61', $raport_6->language_ability->point_20) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_61', $raport_6->language_ability->point_20) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_61', $raport_6->language_ability->point_20) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>


                                                    </div>

                                                    {{-- Penilaian B-2 --}}
                                                    <tr>
                                                        <td></td>
                                                        <th colspan="5" class="text-uppercase">Kognitif</th>
                                                    </tr>
                                                    <div class="cognitives">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Mengelompokkan benda dengan berbagai cara yang
                                                                diketahui anak, misal : menurut warna, bentuk,
                                                                ukuran, jenis, dll</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_62" name="point_62"
                                                                    class="form-select">
                                                                    @if (old('point_62', $raport_6->cognitive->point_1) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_62', $raport_6->cognitive->point_1) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_62', $raport_6->cognitive->point_1) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_62', $raport_6->cognitive->point_1) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Menunjuk sebanyak - banyaknya benda, hewan, tanaman,
                                                                yang mempunyai warna, <br> bentuk atau ukuran atau
                                                                menurut cita - cita tertentu</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_63" name="point_63"
                                                                    class="form-select">
                                                                    @if (old('point_63', $raport_6->cognitive->point_2) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_63', $raport_6->cognitive->point_2) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_63', $raport_6->cognitive->point_2) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_63', $raport_6->cognitive->point_2) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>Mengenal kasar - halus, berat - ringan, panjang -
                                                                pendek, jauh - dekat, banyak - sedikit, sama - tidak
                                                                sama</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_64" name="point_64"
                                                                    class="form-select">
                                                                    @if (old('point_64', $raport_6->cognitive->point_3) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_64', $raport_6->cognitive->point_3) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_64', $raport_6->cognitive->point_3) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_64', $raport_6->cognitive->point_3) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>Mencari lokasi tempat asal suara</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_65" name="point_65"
                                                                    class="form-select">
                                                                    @if (old('point_65', $raport_6->cognitive->point_4) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_65', $raport_6->cognitive->point_4) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_65', $raport_6->cognitive->point_4) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_65', $raport_6->cognitive->point_4) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Memasangkan benda sesuai dengan pasangannya</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_66" name="point_66"
                                                                    class="form-select">
                                                                    @if (old('point_66', $raport_6->cognitive->point_5) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_66', $raport_6->cognitive->point_5) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_66', $raport_6->cognitive->point_5) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_66', $raport_6->cognitive->point_5) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>6</td>
                                                            <td>
                                                                Mencoba dan menceritakan apa yang terjadi jika warna
                                                                dicampur, proses pertumbuhan tanaman (biji - bijian,
                                                                <br>
                                                                umbi - umbian, batang - abtangan), balon ditiup
                                                                lalu
                                                                dilepaskan, benda - benda dimasukkan ke dalam air
                                                                <br>
                                                                (terapung, melayang, tenggelam), benda - benda
                                                                yang
                                                                dijatuhkan (gravitasi) percobaan dengan magnet, <br>
                                                                mengamati dengan kaca pembesar, mencoba dan
                                                                membedakan bermacam - macam rasa, bau dan suara
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_67" name="point_67"
                                                                    class="form-select">
                                                                    @if (old('point_67', $raport_6->cognitive->point_6) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_67', $raport_6->cognitive->point_6) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_67', $raport_6->cognitive->point_6) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_67', $raport_6->cognitive->point_6) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>7</td>
                                                            <td>Membilang / menyebut urutan bilangan dari 1 sampai
                                                                10</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_68" name="point_68"
                                                                    class="form-select">
                                                                    @if (old('point_68', $raport_6->cognitive->point_7) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_68', $raport_6->cognitive->point_7) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_68', $raport_6->cognitive->point_7) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_68', $raport_6->cognitive->point_7) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>8</td>
                                                            <td>Membilang dan menunjuk benda (mengenal konsep
                                                                bilangan dengan benda - benda) sampai 5</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_69" name="point_69"
                                                                    class="form-select">
                                                                    @if (old('point_69', $raport_6->cognitive->point_8) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_69', $raport_6->cognitive->point_8) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_69', $raport_6->cognitive->point_8) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_69', $raport_6->cognitive->point_8) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>9</td>
                                                            <td>Menunjukkan urutan benda untuk bilangan sampai 5
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_70" name="point_70"
                                                                    class="form-select">
                                                                    @if (old('point_70', $raport_6->cognitive->point_9) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_70', $raport_6->cognitive->point_9) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_70', $raport_6->cognitive->point_9) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_70', $raport_6->cognitive->point_9) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>Menghubungkan / memasangkan lambang bilangan dengan
                                                                benda - benda sampai 5 (anak tidak disuruh menulis)
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_71" name="point_71"
                                                                    class="form-select">
                                                                    @if (old('point_71', $raport_6->cognitive->point_10) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_71', $raport_6->cognitive->point_10) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_71', $raport_6->cognitive->point_10) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_71', $raport_6->cognitive->point_10) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>11</td>
                                                            <td>Menunjuk 2 kumpulan benda yang sama jenisnya, yang
                                                                tidak sama, lebih banyak dan lebih sedikit</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_72" name="point_72"
                                                                    class="form-select">
                                                                    @if (old('point_72', $raport_6->cognitive->point_11) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_72', $raport_6->cognitive->point_11) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_72', $raport_6->cognitive->point_11) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_72', $raport_6->cognitive->point_11) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>12</td>
                                                            <td>Menyebutkan kembali benda - benda yang baru
                                                                dilihatnya</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_73" name="point_73"
                                                                    class="form-select">
                                                                    @if (old('point_73', $raport_6->cognitive->point_13) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_73', $raport_6->cognitive->point_13) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_73', $raport_6->cognitive->point_13) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_73', $raport_6->cognitive->point_13) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>13</td>
                                                            <td>Menyebut dan menunjuk bentuk - bentuk geometri</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_74" name="point_74"
                                                                    class="form-select">
                                                                    @if (old('point_74', $raport_6->cognitive->point_13) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_74', $raport_6->cognitive->point_13) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_74', $raport_6->cognitive->point_13) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_74', $raport_6->cognitive->point_13) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>14</td>
                                                            <td>Mengelompokkan bentuk - bentuk geometri (lingkaran,
                                                                segitiga, segiempat)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_75" name="point_75"
                                                                    class="form-select">
                                                                    @if (old('point_75', $raport_6->cognitive->point_14) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_75', $raport_6->cognitive->point_14) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_75', $raport_6->cognitive->point_14) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_75', $raport_6->cognitive->point_14) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>15</td>
                                                            <td>Menyebutkan dan menunjukkan benda - benda yang
                                                                berbentuk geometri</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_76" name="point_76"
                                                                    class="form-select">
                                                                    @if (old('point_76', $raport_6->cognitive->point_15) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_76', $raport_6->cognitive->point_15) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_76', $raport_6->cognitive->point_15) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_76', $raport_6->cognitive->point_15) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>16</td>
                                                            <td>Mengerjakan "maze" (mencari jejak) yang sederhana
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_77" name="point_77"
                                                                    class="form-select">
                                                                    @if (old('point_77', $raport_6->cognitive->point_16) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_77', $raport_6->cognitive->point_16) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_77', $raport_6->cognitive->point_16) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_77', $raport_6->cognitive->point_16) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>17</td>
                                                            <td>Menyusun kepingan puzzle menjadi bentuk utuh (4 - 6
                                                                keping)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_78" name="point_78"
                                                                    class="form-select">
                                                                    @if (old('point_78', $raport_6->cognitive->point_17) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_78', $raport_6->cognitive->point_17) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_78', $raport_6->cognitive->point_17) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_78', $raport_6->cognitive->point_17) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>18</td>
                                                            <td>Mengukur panjang dengan langkah dan jengkal</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_79" name="point_79"
                                                                    class="form-select">
                                                                    @if (old('point_79', $raport_6->cognitive->point_18) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_79', $raport_6->cognitive->point_18) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_79', $raport_6->cognitive->point_18) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_79', $raport_6->cognitive->point_18) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>19</td>
                                                            <td>Meninmbang benda dengan timbangan buatan</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_80" name="point_80"
                                                                    class="form-select">
                                                                    @if (old('point_80', $raport_6->cognitive->point_19) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_80', $raport_6->cognitive->point_19) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_80', $raport_6->cognitive->point_19) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_80', $raport_6->cognitive->point_19) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>20</td>
                                                            <td>Mengisi wadah dengan timbangan air, pasir, biji -
                                                                bijian, beras, dll</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_81" name="point_81"
                                                                    class="form-select">
                                                                    @if (old('point_81', $raport_6->cognitive->point_19) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_81', $raport_6->cognitive->point_19) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_81', $raport_6->cognitive->point_19) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_81', $raport_6->cognitive->point_19) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>21</td>
                                                            <td>Menyatakan dan membedakan waktu (pagi, siang, malam)
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_82" name="point_82"
                                                                    class="form-select">
                                                                    @if (old('point_82', $raport_6->cognitive->point_21) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_82', $raport_6->cognitive->point_21) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_82', $raport_6->cognitive->point_21) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_82', $raport_6->cognitive->point_21) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>22</td>
                                                            <td>Mengetahui nama - nama dalam satu minggu, bulan, dan
                                                                tahun</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_83" name="point_83"
                                                                    class="form-select">
                                                                    @if (old('point_83', $raport_6->cognitive->point_22) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_83', $raport_6->cognitive->point_22) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_83', $raport_6->cognitive->point_22) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_83', $raport_6->cognitive->point_22) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>23</td>
                                                            <td>Menyebutkan hasil pembahasan (menggabungkan 2
                                                                kumpulan benda) dan <br> pengurangan (memisahkan
                                                                kumpulan benda) dengan benda sampai 5</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_84" name="point_84"
                                                                    class="form-select">
                                                                    @if (old('point_84', $raport_6->cognitive->point_23) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_84', $raport_6->cognitive->point_23) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_84', $raport_6->cognitive->point_23) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_84', $raport_6->cognitive->point_23) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>24</td>
                                                            <td>Memperkirakan urutan berikutnya setelah melihat
                                                                bentuk 2 pola yang berurutan, <br> misal : merah,
                                                                putih,
                                                                merah, putih, merah,...</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_85" name="point_85"
                                                                    class="form-select">
                                                                    @if (old('point_85', $raport_6->cognitive->point_24) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_85', $raport_6->cognitive->point_24) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_85', $raport_6->cognitive->point_24) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_85', $raport_6->cognitive->point_24) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                    </div>

                                                    {{-- Penilaian B-3 --}}
                                                    <tr>
                                                        <td></td>
                                                        <th colspan="5" class="text-uppercase">Fisik dan
                                                            Motorik
                                                        </th>
                                                    </tr>
                                                    <div class="physical_motorics">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Mengurus dirinya sendiri dengan sedikit bantuan,
                                                                misalnya : makan, <br> mandi, menyisir rambut,
                                                                mencuci
                                                                dan mengelap tangan, mengikat tali sepatu</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_86" name="point_86"
                                                                    class="form-select">
                                                                    @if (old('point_86', $raport_6->physical_motoric->point_1) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_86', $raport_6->physical_motoric->point_1) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_86', $raport_6->physical_motoric->point_1) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_86', $raport_6->physical_motoric->point_1) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Membuat berbagai bentuk dengan menggunakan
                                                                plastisin, playdough / tanah liat</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_87" name="point_87"
                                                                    class="form-select">
                                                                    @if (old('point_87', $raport_6->physical_motoric->point_2) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_87', $raport_6->physical_motoric->point_2) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_87', $raport_6->physical_motoric->point_2) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_87', $raport_6->physical_motoric->point_2) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>Menjiplak dan meniru membuat garis tegak, datar,
                                                                miring, lengkung dan lingkaran</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_88" name="point_88"
                                                                    class="form-select">
                                                                    @if (old('point_88', $raport_6->physical_motoric->point_3) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_88', $raport_6->physical_motoric->point_3) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_88', $raport_6->physical_motoric->point_3) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_88', $raport_6->physical_motoric->point_3) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>meniru melipat kertas sederhana (1 - 6 lipatan)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_89" name="point_89"
                                                                    class="form-select">
                                                                    @if (old('point_89', $raport_6->physical_motoric->point_4) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_89', $raport_6->physical_motoric->point_4) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_89', $raport_6->physical_motoric->point_4) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_89', $raport_6->physical_motoric->point_4) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Menjahit jelujur 10 lubang dengan tali sepatu</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_90" name="point_90"
                                                                    class="form-select">
                                                                    @if (old('point_90', $raport_6->physical_motoric->point_5) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_90', $raport_6->physical_motoric->point_5) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_90', $raport_6->physical_motoric->point_5) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_90', $raport_6->physical_motoric->point_5) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>6</td>
                                                            <td>Menggunting bebas</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_91" name="point_91"
                                                                    class="form-select">
                                                                    @if (old('point_91', $raport_6->physical_motoric->point_6) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_91', $raport_6->physical_motoric->point_6) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_91', $raport_6->physical_motoric->point_6) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_91', $raport_6->physical_motoric->point_6) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>7</td>
                                                            <td>Merobek bebas</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_92" name="point_92"
                                                                    class="form-select">
                                                                    @if (old('point_92', $raport_6->physical_motoric->point_7) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_92', $raport_6->physical_motoric->point_7) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_92', $raport_6->physical_motoric->point_7) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_92', $raport_6->physical_motoric->point_7) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>8</td>
                                                            <td>Menyusun menara dari kubus minimal 8 kubus</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_93" name="point_93"
                                                                    class="form-select">
                                                                    @if (old('point_93', $raport_6->physical_motoric->point_8) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_93', $raport_6->physical_motoric->point_8) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_93', $raport_6->physical_motoric->point_8) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_93', $raport_6->physical_motoric->point_8) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>9</td>
                                                            <td>Membuat lingkaran dan segi empat</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_94" name="point_94"
                                                                    class="form-select">
                                                                    @if (old('point_94', $raport_6->physical_motoric->point_9) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_94', $raport_6->physical_motoric->point_9) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_94', $raport_6->physical_motoric->point_9) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_94', $raport_6->physical_motoric->point_9) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>Memegang pensil (belum sempurna)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_95" name="point_95"
                                                                    class="form-select">
                                                                    @if (old('point_95', $raport_6->physical_motoric->point_10) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_95', $raport_6->physical_motoric->point_10) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_95', $raport_6->physical_motoric->point_10) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_95', $raport_6->physical_motoric->point_10) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>11</td>
                                                            <td>Menangkap dan melempar bola besar dari jarak kira -
                                                                kira 1 - 2 meter</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_96" name="point_96"
                                                                    class="form-select">
                                                                    @if (old('point_96', $raport_6->physical_motoric->point_11) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_96', $raport_6->physical_motoric->point_11) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_96', $raport_6->physical_motoric->point_11) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_96', $raport_6->physical_motoric->point_11) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>12</td>
                                                            <td>Memantulkan bola besar (diam di tempat)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_97" name="point_97"
                                                                    class="form-select">
                                                                    @if (old('point_97', $raport_6->physical_motoric->point_12) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_97', $raport_6->physical_motoric->point_12) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_97', $raport_6->physical_motoric->point_12) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_97', $raport_6->physical_motoric->point_12) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>13</td>
                                                            <td>Memantulkan bola besar sambil berjalan / bergerak
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_98" name="point_98"
                                                                    class="form-select">
                                                                    @if (old('point_98', $raport_6->physical_motoric->point_13) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_98', $raport_6->physical_motoric->point_13) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_98', $raport_6->physical_motoric->point_13) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_98', $raport_6->physical_motoric->point_13) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>14</td>
                                                            <td>Melambungkan dan menangkap kantong biji</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_99" name="point_99"
                                                                    class="form-select">
                                                                    @if (old('point_99', $raport_6->physical_motoric->point_14) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_99', $raport_6->physical_motoric->point_14) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_99', $raport_6->physical_motoric->point_14) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_99', $raport_6->physical_motoric->point_14) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>15</td>
                                                            <td>Berjalan masu dan garis lurus, berjalan di atas
                                                                papan titian, berjalan berjinjit</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_100" name="point_100"
                                                                    class="form-select">
                                                                    @if (old('point_100', $raport_6->physical_motoric->point_15) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_100', $raport_6->physical_motoric->point_15) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_100', $raport_6->physical_motoric->point_15) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_100', $raport_6->physical_motoric->point_15) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>16</td>
                                                            <td>Berjalan mundur dan keamping pada garis lurus sejauh
                                                                1 - 2 meter</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_101" name="point_101"
                                                                    class="form-select">
                                                                    @if (old('point_101', $raport_6->physical_motoric->point_16) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_101', $raport_6->physical_motoric->point_16) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_101', $raport_6->physical_motoric->point_16) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_101', $raport_6->physical_motoric->point_16) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>17</td>
                                                            <td>Meloncat dari ketinggian 20 - 30 cm</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_102" name="point_102"
                                                                    class="form-select">
                                                                    @if (old('point_102', $raport_6->physical_motoric->point_17) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_102', $raport_6->physical_motoric->point_17) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_102', $raport_6->physical_motoric->point_17) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_102', $raport_6->physical_motoric->point_17) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>18</td>
                                                            <td>Memanjat dan bergantung</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_103" name="point_103"
                                                                    class="form-select">
                                                                    @if (old('point_103', $raport_6->physical_motoric->point_18) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_103', $raport_6->physical_motoric->point_18) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_103', $raport_6->physical_motoric->point_18) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_103', $raport_6->physical_motoric->point_18) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>19</td>
                                                            <td>Berdiri diatas satu kaki selama 10 detik</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_104" name="point_104"
                                                                    class="form-select">
                                                                    @if (old('point_104', $raport_6->physical_motoric->point_19) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_104', $raport_6->physical_motoric->point_19) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_104', $raport_6->physical_motoric->point_19) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_104', $raport_6->physical_motoric->point_19) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>20</td>
                                                            <td>Berlari sambil melompat</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_105" name="point_105"
                                                                    class="form-select">
                                                                    @if (old('point_105', $raport_6->physical_motoric->point_20) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_105', $raport_6->physical_motoric->point_20) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_105', $raport_6->physical_motoric->point_20) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_105', $raport_6->physical_motoric->point_20) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>21</td>
                                                            <td>Menendang bola dengan terarah</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_106" name="point_106"
                                                                    class="form-select">
                                                                    @if (old('point_106', $raport_6->physical_motoric->point_21) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_106', $raport_6->physical_motoric->point_21) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_106', $raport_6->physical_motoric->point_21) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_106', $raport_6->physical_motoric->point_21) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>22</td>
                                                            <td>Merayap dan merangkak lurus kedepan</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_107" name="point_107"
                                                                    class="form-select">
                                                                    @if (old('point_107', $raport_6->physical_motoric->point_22) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_107', $raport_6->physical_motoric->point_22) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_107', $raport_6->physical_motoric->point_22) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_107', $raport_6->physical_motoric->point_22) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>23</td>
                                                            <td>Bermain dengan simpai (bebas, melompat dalam simpai,
                                                                merangkak dalam terowongan dan simpai), dll</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_108" name="point_108"
                                                                    class="form-select">
                                                                    @if (old('point_108', $raport_6->physical_motoric->point_23) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_108', $raport_6->physical_motoric->point_23) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_108', $raport_6->physical_motoric->point_23) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_108', $raport_6->physical_motoric->point_23) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>24</td>
                                                            <td>Menirukan berbagai gerakan binatang / hewan</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_109" name="point_109"
                                                                    class="form-select">
                                                                    @if (old('point_109', $raport_6->physical_motoric->point_24) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_109', $raport_6->physical_motoric->point_24) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_109', $raport_6->physical_motoric->point_24) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_109', $raport_6->physical_motoric->point_24) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>25</td>
                                                            <td>Menirukan gerakan tanaman yang terkena angin (sepoi
                                                                - sepoi dan angin kencang)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_110" name="point_110"
                                                                    class="form-select">
                                                                    @if (old('point_110', $raport_6->physical_motoric->point_25) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_110', $raport_6->physical_motoric->point_25) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_110', $raport_6->physical_motoric->point_25) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_110', $raport_6->physical_motoric->point_25) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>26</td>
                                                            <td>Naik sepeda roda dua (belum seimbang)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_111" name="point_111"
                                                                    class="form-select">
                                                                    @if (old('point_111', $raport_6->physical_motoric->point_26) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_111', $raport_6->physical_motoric->point_26) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_111', $raport_6->physical_motoric->point_26) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_111', $raport_6->physical_motoric->point_26) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                    </div>

                                                    {{-- Penilaian B-4 --}}
                                                    <tr>
                                                        <td></td>
                                                        <th colspan="5" class="text-uppercase">Seni</th>
                                                    </tr>
                                                    <div class="arts">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Menggambar bebas dengan berbagai media (pensil

                                                                warna, krayon, arang, dll)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_112" name="point_112"
                                                                    class="form-select">
                                                                    @if (old('point_112', $raport_6->art->point_1) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_112', $raport_6->art->point_1) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_112', $raport_6->art->point_1) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_112', $raport_6->art->point_1) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Menggambar bebas dari bentuk lingkaran dan segiempat
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_113" name="point_113"
                                                                    class="form-select">
                                                                    @if (old('point_113', $raport_6->art->point_2) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_113', $raport_6->art->point_2) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_113', $raport_6->art->point_2) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_113', $raport_6->art->point_2) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>Menggambar orang dengan lengkap dan sederhana (belum
                                                                proporsional)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_114" name="point_114"
                                                                    class="form-select">
                                                                    @if (old('point_114', $raport_6->art->point_3) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_114', $raport_6->art->point_3) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_114', $raport_6->art->point_3) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_114', $raport_6->art->point_3) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>Stempel / mencetak dengan berbagai media (pelepah
                                                                pisang, batang pepaya, kertas, busa, dll)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_115" name="point_115"
                                                                    class="form-select">
                                                                    @if (old('point_115', $raport_6->art->point_4) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_115', $raport_6->art->point_4) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_115', $raport_6->art->point_4) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_115', $raport_6->art->point_4) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Mewarnai bentuk gambar sederhana</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_116" name="point_116"
                                                                    class="form-select">
                                                                    @if (old('point_116', $raport_6->art->point_5) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_116', $raport_6->art->point_5) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_116', $raport_6->art->point_5) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_116', $raport_6->art->point_5) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>6</td>
                                                            <td>Mewarnai bentuk - bentuk geometri dengan ukuran
                                                                besar</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_117" name="point_117"
                                                                    class="form-select">
                                                                    @if (old('point_117', $raport_6->art->point_6) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_117', $raport_6->art->point_6) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_117', $raport_6->art->point_6) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_117', $raport_6->art->point_6) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>7</td>
                                                            <td>Meronce dengan manik - manik/td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_118" name="point_118"
                                                                    class="form-select">
                                                                    @if (old('point_118', $raport_6->art->point_7) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_118', $raport_6->art->point_7) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_118', $raport_6->art->point_7) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_118', $raport_6->art->point_7) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>8</td>
                                                            <td>Mencipta 2 bentuk bangunan dari balok</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_119" name="point_119"
                                                                    class="form-select">
                                                                    @if (old('point_119', $raport_6->art->point_8) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_119', $raport_6->art->point_8) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_119', $raport_6->art->point_8) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_119', $raport_6->art->point_8) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>9</td>
                                                            <td>Mencipta 2 bentuk dari kepingan bentuk geometri</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_120" name="point_120"
                                                                    class="form-select">
                                                                    @if (old('point_120', $raport_6->art->point_9) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_120', $raport_6->art->point_9) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_120', $raport_6->art->point_9) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_120', $raport_6->art->point_9) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td>Mencipta bentuk dari lidi</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_121" name="point_121"
                                                                    class="form-select">
                                                                    @if (old('point_121', $raport_6->art->point_10) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_121', $raport_6->art->point_10) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_121', $raport_6->art->point_10) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_121', $raport_6->art->point_10) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>11</td>
                                                            <td>Menganyam dengan kertas</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_122" name="point_122"
                                                                    class="form-select">
                                                                    @if (old('point_122', $raport_6->art->point_11) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_122', $raport_6->art->point_11) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_122', $raport_6->art->point_11) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_122', $raport_6->art->point_11) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>12</td>
                                                            <td>Membatik dengan jumputan</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_123" name="point_123"
                                                                    class="form-select">
                                                                    @if (old('point_123', $raport_6->art->point_12) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_123', $raport_6->art->point_12) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_123', $raport_6->art->point_12) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_123', $raport_6->art->point_12) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>13</td>
                                                            <td>Mencocok dengan pola buatan guru</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_124" name="point_124"
                                                                    class="form-select">
                                                                    @if (old('point_124', $raport_6->art->point_13) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_124', $raport_6->art->point_13) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_124', $raport_6->art->point_13) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_124', $raport_6->art->point_13) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>14</td>
                                                            <td>Permainan warna dengan berbagai alat</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_125" name="point_125"
                                                                    class="form-select">
                                                                    @if (old('point_125', $raport_6->art->point_14) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_125', $raport_6->art->point_14) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_125', $raport_6->art->point_14) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_125', $raport_6->art->point_14) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>15</td>
                                                            <td>Melukis dengan jari (finger painting)</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_126" name="point_126"
                                                                    class="form-select">
                                                                    @if (old('point_126', $raport_6->art->point_15) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_126', $raport_6->art->point_15) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_126', $raport_6->art->point_15) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_126', $raport_6->art->point_15) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>16</td>
                                                            <td>Membuat bunyi - bunyian dengan berbagai alat</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_127" name="point_127"
                                                                    class="form-select">
                                                                    @if (old('point_127', $raport_6->art->point_16) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_127', $raport_6->art->point_16) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_127', $raport_6->art->point_16) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_127', $raport_6->art->point_16) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>17</td>
                                                            <td>Menciptakan alat perkusi sederhana</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_128" name="point_128"
                                                                    class="form-select">
                                                                    @if (old('point_128', $raport_6->art->point_17) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_128', $raport_6->art->point_17) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_128', $raport_6->art->point_17) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_128', $raport_6->art->point_17) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>18</td>
                                                            <td>Bertepuk tangan dengan 2 pola</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_129" name="point_129"
                                                                    class="form-select">
                                                                    @if (old('point_129', $raport_6->art->point_18) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_129', $raport_6->art->point_18) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_129', $raport_6->art->point_18) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_129', $raport_6->art->point_18) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>19</td>
                                                            <td>Menggerakkan kepala, tangan dan kaki sesuai dengan
                                                                irama musik / ritmik</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_130" name="point_130"
                                                                    class="form-select">
                                                                    @if (old('point_130', $raport_6->art->point_19) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_130', $raport_6->art->point_19) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_130', $raport_6->art->point_19) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_130', $raport_6->art->point_19) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>20</td>
                                                            <td>Mengekspresikan diri secara bebas sesuai irama musik
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_131" name="point_131"
                                                                    class="form-select">
                                                                    @if (old('point_131', $raport_6->art->point_20) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_131', $raport_6->art->point_20) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_131', $raport_6->art->point_20) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_131', $raport_6->art->point_20) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>21</td>
                                                            <td>Mengikuti gerakan tari sederhana sesuai irama musik
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_132" name="point_132"
                                                                    class="form-select">
                                                                    @if (old('point_132', $raport_6->art->point_21) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_132', $raport_6->art->point_21) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_132', $raport_6->art->point_21) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_132', $raport_6->art->point_21) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>22</td>
                                                            <td>Mengekspresikan diri dalam gerak bervariasi</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_133" name="point_133"
                                                                    class="form-select">
                                                                    @if (old('point_133', $raport_6->art->point_22) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_133', $raport_6->art->point_22) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_133', $raport_6->art->point_22) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_133', $raport_6->art->point_22) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>23</td>
                                                            <td>Menyanyi 15 lagu naak - anak</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_134" name="point_134"
                                                                    class="form-select">
                                                                    @if (old('point_134', $raport_6->art->point_23) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_134', $raport_6->art->point_23) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_134', $raport_6->art->point_23) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_134', $raport_6->art->point_23) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>24</td>
                                                            <td>Bermain dengan berbagai alat musik perkusi sederhana
                                                            </td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_135" name="point_135"
                                                                    class="form-select">
                                                                    @if (old('point_135', $raport_6->art->point_24) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_135', $raport_6->art->point_24) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_135', $raport_6->art->point_24) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_135', $raport_6->art->point_24) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>25</td>
                                                            <td>Mengucapkan sajak dengan ekspresi</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_136" name="point_136"
                                                                    class="form-select">
                                                                    @if (old('point_136', $raport_6->art->point_25) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_136', $raport_6->art->point_25) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_136', $raport_6->art->point_25) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_136', $raport_6->art->point_25) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>26</td>
                                                            <td>Mengucapkan syair dari berbagai lagu</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_137" name="point_137"
                                                                    class="form-select">
                                                                    @if (old('point_137', $raport_6->art->point_26) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_137', $raport_6->art->point_26) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_137', $raport_6->art->point_26) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_137', $raport_6->art->point_26) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>27</td>
                                                            <td>Dapat melakukan gerakan pantomim sederhana</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_138" name="point_138"
                                                                    class="form-select">
                                                                    @if (old('point_138', $raport_6->art->point_27) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_138', $raport_6->art->point_27) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_138', $raport_6->art->point_27) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_138', $raport_6->art->point_27) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>28</td>
                                                            <td>Melakukan gerak pantomim secara sederhana</td>
                                                            <td class="text-center" colspan="4">
                                                                <select id="point_139" name="point_139"
                                                                    class="form-select">
                                                                    @if (old('point_139', $raport_6->art->point_28) == 'Belum Berkembang (BB)')
                                                                        <option value="Belum Berkembang (BB)" selected>
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_139', $raport_6->art->point_28) == 'Mulai Berkembang (MB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)" selected>
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_139', $raport_6->art->point_28) == 'Berkembang Sesuai Harapan (BSH)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)"
                                                                            selected>
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)">
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @elseif(old('point_139', $raport_6->art->point_28) == 'Berkembang Sangat Baik (BSB)')
                                                                        <option value="Belum Berkembang (BB)">
                                                                            Belum Berkembang (BB)
                                                                        </option>
                                                                        <option value="Mulai Berkembang (MB)">
                                                                            Mulai Berkembang (MB)
                                                                        </option>
                                                                        <option value="Berkembang Sesuai Harapan (BSH)">
                                                                            Berkembang Sesuai Harapan (BSH)
                                                                        </option>
                                                                        <option value="Berkembang Sangat Baik (BSB)"
                                                                            selected>
                                                                            Berkembang Sangat Baik (BSB)
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                        </tr>

                                                    </div>


                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="4">
                                                            <div
                                                                class="mb-5 d-flex justify-content-end fixed-bottom me-5">
                                                                <button type="submit"
                                                                    class="px-5 btn btn-primary">Simpan</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    </div>
@endsection
