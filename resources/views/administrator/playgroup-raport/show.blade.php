@extends('layouts.app')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="row">
                <div class=" ms-auto col-md-5">
                    @if (session()->has('success'))
                        <div class="py-2 border-0 alert alert-success bg-success alert-dismissible fade show">
                            <div class="d-flex align-items-center">
                                <div class="text-white font-35"><i class='bx bxs-check-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Selamat!</h6>
                                    <div class="text-white">{{ session()->get('success') }} </div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="py-2 border-0 alert alert-danger bg-danger alert-dismissible fade show">
                            <div class="d-flex align-items-center">
                                <div class="text-white font-35"><i class='bx bxs-check-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Selamat!</h6>
                                    <div class="text-white">{{ session()->get('error') }} </div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">Raport</div>
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
                <div class="ms-auto">
                    <div class="gap-2">
                        <a href="{{ route('playgroup.raport.create', $student->id) }}" class="btn btn-primary">Tambah
                            Nilai</a>
                        {{-- <a href="{{ route('playgroup.raport.edit', $student->id) }}" class="btn btn-secondary">Edit
                            Nilai</a> --}}
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
                <div class="col">
                    <h6 class="mb-0 text-uppercase">Nilai / Raport Peserta Didik</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#semester1" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-category font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Semester 1</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#semester2" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-category font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Semester 2</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#semester3" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-category font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Semester 3</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#semester4" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-category font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Semester 4</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="py-3 tab-content">
                                <div class="tab-pane fade show active" id="semester1" role="tabpanel">
                                    @if ($raport_1 != null)
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-lg-9 col-xl-10">
                                                        <div class="row row-cols-lg-2 row-cols-xl-auto g-4">
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="position-relative">
                                                                    <label for="">Nama Peserta
                                                                        Didik</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $student->nama_lengkap }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="position-relative">
                                                                    <label for="">Tahun Ajaran</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $raport_1->tahun_ajaran }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="form-group">
                                                                    <label for="">
                                                                        Tanggal Mulai<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_mulai" id="tanggal_mulai"
                                                                        placeholder="dd-mm-yyyy" disabled
                                                                        value="{{ $raport_1->tanggal_mulai }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="form-group">
                                                                    <label for="">
                                                                        Tanggal Selesai<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_selesai" id="tanggal_selesai"
                                                                        placeholder="dd-mm-yyyy" disabled
                                                                        value="{{ $raport_1->tanggal_selesai }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-xl-2 mt-3 mt-lg-0">
                                                        <div class="float-lg-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-white" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Lainnya <i class='bx bx-slider'></i>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('playgroup.raport.editSemester1', $student->id) }}">Edit
                                                                            Nilai</a>
                                                                    </li>
                                                                    <li><a href="#" class="dropdown-item delete"
                                                                            data-id="{{ $raport_1->id }}"
                                                                            semester-name="semester {{ $raport_1->semester_id }}">Hapus
                                                                            Nilai</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($raport_1 != null)
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
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menyanyikan lagu - lagu bernafaskan agama yang
                                                                        sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        Menyebut tempat - tempat ibadah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>
                                                                        Menyebut hari - hari besar Agama
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Meniru pelaksanaan kegiatan ibadah secara sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menyebutkan waktu beribadah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Menyebutkan ciptaan - ciptaan Tuhan (manusia, bumi,
                                                                        langit,
                                                                        tanaman, hewan)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Tidak mengganggu teman yang sedang melakukan
                                                                        kegiatan /
                                                                        melaksanakan ibadah</td>

                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>
                                                                        Berterima kasih jika memperoleh sesuatu
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>
                                                                        Selalu bersikap ramah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>
                                                                        Meminta tolong dengan baik, mengucapkan salam
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>
                                                                        Melaksanakan tata tertib yang ada di sekolah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>
                                                                        Mengikuti aturan permainan
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Mau mengalah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Mendengarkan orang tua / teman bicara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Berbahasa sopan dalam berbicara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>tidak lekas marah atau membentak - bentak</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Mudah bergaul / berteman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Dapat / suka menolong teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Saling membantu sesama teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Saling membantu sesama teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Menunjukkan kebanggaan terhadap hasil kerjanya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menggunakan barang orang lain dengan hati - hati
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Mau membagi miliknya (makn, minum, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Meminjamkan miliknya dengan senang hati</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Membersihkan diri sendiri dengan bantuan (menggosok
                                                                        gigi,
                                                                        mandi, buang air, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>27</td>
                                                                    <td>Mengurus dirinya sendiri dengan sedikit bantuan
                                                                        (berpakaian
                                                                        sendiri, makan sendiri, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_27 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>28</td>
                                                                    <td>Mengembalikan mainan pada tempatnya setelah
                                                                        digunakan
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_28 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>29</td>
                                                                    <td>Membuang sampah pada tempatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_29 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>30</td>
                                                                    <td>Membantu membersihkan lingkungan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_30 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>31</td>
                                                                    <td>Mau berpisah dengan ibu tanpa menangis</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_31 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>32</td>
                                                                    <td>Sabar menunggu giliran</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_32 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>33</td>
                                                                    <td>Berhenti bermain pada waktunya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_33 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>34</td>
                                                                    <td>Dapat dibujuk</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_34 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>35</td>
                                                                    <td>Tidak cengeng</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_35 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>36</td>
                                                                    <td>Mau menerima tugas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_36 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>37</td>
                                                                    <td>Mengerjakan tugas sampai selesai</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_37 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>38</td>
                                                                    <td>Mengenal dan menghindari benda - benda yang
                                                                        berbahaya
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_38 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>39</td>
                                                                    <td>Mengenal dan menghindari obat - obatan yang
                                                                        berbahaya
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_39 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>40</td>
                                                                    <td>Melaksanakan tugas yang diberikan guru</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_40 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>41</td>
                                                                    <td>Mengetahui barang milik sendiri dan milik orang lain
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->behavior_formation->point_41 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menirukan kembali 3 - 4 urutan kata</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menyebutkan kata - kata yang mempunyai suku kata
                                                                        awal yang sama, <br> misal : kaki - kali. atau suku
                                                                        kata akhir yang sama, misal : nama - sama, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Melakukan 2 - 3 perintah secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Mendengarkan cerita dan menceritakan kembali isi
                                                                        cerita secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menyebutkan nama diri, nama orang tua, jenis
                                                                        kelamin, alamat rumah secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Menceritakan pengalaman / kejadian secara sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Menjawab pertanyaan tentang keterangan / informasi
                                                                        secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Bercerita menggunakan kata ganti aku, saya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Menunjukkan gerakan - gerakan, misal : duduk,
                                                                        jongkok, berlari, makan, melompat, menangis, senang,
                                                                        sedih, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menyebutkan posisi / keterangan tempat, misal : di
                                                                        luar, di dalam, di atas, di bawah, <br> di depan, di
                                                                        belakang, di kiri, di kanan dsb</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Menyebutkan waktu (pagi, siang, malam)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Membuat berbagai macam coretan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Membuat gambar dan coretan (tulisan) tentang cerita
                                                                        mengenai gambar yang dibuatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Bercerita tentang gambar yang disediakan atau yang
                                                                        dibuat sendiri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Mengurutkan dan menceritakan isi gambar seri
                                                                        sederhana (3 - 4 gambar)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menghubungkan gambar / benda dengan kata</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Membaca gambar yang memiliki kata / kalimat
                                                                        sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Menceritakan isi buku walaupun tidak sama tulisan
                                                                        dengan yang diungkapkan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Menghubungkan tulisan sederhana dengan simbol yang
                                                                        melambangkannya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->language_ability->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menunjuk sebanyak - banyaknya benda, hewan, tanaman,
                                                                        yang mempunyai warna, <br> bentuk atau ukuran atau
                                                                        menurut cita - cita tertentu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Mengenal kasar - halus, berat - ringan, panjang -
                                                                        pendek, jauh - dekat, banyak - sedikit, sama - tidak
                                                                        sama</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Mencari lokasi tempat asal suara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Memasangkan benda sesuai dengan pasangannya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Membilang / menyebut urutan bilangan dari 1 sampai
                                                                        10</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Membilang dan menunjuk benda (mengenal konsep
                                                                        bilangan dengan benda - benda) sampai 5</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Menunjukkan urutan benda untuk bilangan sampai 5
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Menghubungkan / memasangkan lambang bilangan dengan
                                                                        benda - benda sampai 5 (anak tidak disuruh menulis)
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menunjuk 2 kumpulan benda yang sama jenisnya, yang
                                                                        tidak sama, lebih banyak dan lebih sedikit</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Menyebutkan kembali benda - benda yang baru
                                                                        dilihatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Menyebut dan menunjuk bentuk - bentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Mengelompokkan bentuk - bentuk geometri (lingkaran,
                                                                        segitiga, segiempat)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Menyebutkan dan menunjukkan benda - benda yang
                                                                        berbentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Mengerjakan "maze" (mencari jejak) yang sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menyusun kepingan puzzle menjadi bentuk utuh (4 - 6
                                                                        keping)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Mengukur panjang dengan langkah dan jengkal</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Meninmbang benda dengan timbangan buatan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Mengisi wadah dengan timbangan air, pasir, biji -
                                                                        bijian, beras, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Menyatakan dan membedakan waktu (pagi, siang, malam)
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Mengetahui nama - nama dalam satu minggu, bulan, dan
                                                                        tahun</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menyebutkan hasil pembahasan (menggabungkan 2
                                                                        kumpulan benda) dan <br> pengurangan (memisahkan
                                                                        kumpulan benda) dengan benda sampai 5</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Memperkirakan urutan berikutnya setelah melihat
                                                                        bentuk 2 pola yang berurutan, <br> misal : merah,
                                                                        putih,
                                                                        merah, putih, merah,...</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->cognitive->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Membuat berbagai bentuk dengan menggunakan
                                                                        plastisin, playdough / tanah liat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menjiplak dan meniru membuat garis tegak, datar,
                                                                        miring, lengkung dan lingkaran</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>meniru melipat kertas sederhana (1 - 6 lipatan)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Menjahit jelujur 10 lubang dengan tali sepatu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menggunting bebas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Merobek bebas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Menyusun menara dari kubus minimal 8 kubus</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Membuat lingkaran dan segi empat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Memegang pensil (belum sempurna)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menangkap dan melempar bola besar dari jarak kira -
                                                                        kira 1 - 2 meter</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Memantulkan bola besar (diam di tempat)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Memantulkan bola besar sambil berjalan / bergerak
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Melambungkan dan menangkap kantong biji</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Berjalan masu dan garis lurus, berjalan di atas
                                                                        papan titian, berjalan berjinjit</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Berjalan mundur dan keamping pada garis lurus sejauh
                                                                        1 - 2 meter</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Meloncat dari ketinggian 20 - 30 cm</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Memanjat dan bergantung</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Berdiri diatas satu kaki selama 10 detik</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Berlari sambil melompat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Menendang bola dengan terarah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Merayap dan merangkak lurus kedepan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Bermain dengan simpai (bebas, melompat dalam simpai,
                                                                        merangkak dalam terowongan dan simpai), dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Menirukan berbagai gerakan binatang / hewan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Menirukan gerakan tanaman yang terkena angin (sepoi
                                                                        - sepoi dan angin kencang)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Naik sepeda roda dua (belum seimbang)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->physical_motoric->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menggambar bebas dari bentuk lingkaran dan segiempat
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menggambar orang dengan lengkap dan sederhana (belum
                                                                        proporsional)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Stempel / mencetak dengan berbagai media (pelepah
                                                                        pisang, batang pepaya, kertas, busa, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Mewarnai bentuk gambar sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Mewarnai bentuk - bentuk geometri dengan ukuran
                                                                        besar</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Meronce dengan manik - manik/td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Mencipta 2 bentuk bangunan dari balok</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Mencipta 2 bentuk dari kepingan bentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Mencipta bentuk dari lidi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menganyam dengan kertas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Membatik dengan jumputan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Mencocok dengan pola buatan guru</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Permainan warna dengan berbagai alat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Melukis dengan jari (finger painting)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Membuat bunyi - bunyian dengan berbagai alat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menciptakan alat perkusi sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Bertepuk tangan dengan 2 pola</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Menggerakkan kepala, tangan dan kaki sesuai dengan
                                                                        irama musik / ritmik</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Mengekspresikan diri secara bebas sesuai irama musik
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Mengikuti gerakan tari sederhana sesuai irama musik
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Mengekspresikan diri dalam gerak bervariasi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menyanyi 15 lagu naak - anak</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Bermain dengan berbagai alat musik perkusi sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Mengucapkan sajak dengan ekspresi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Mengucapkan syair dari berbagai lagu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>27</td>
                                                                    <td>Dapat melakukan gerakan pantomim sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_27 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>28</td>
                                                                    <td>Melakukan gerak pantomim secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_1)
                                                                            {{ $raport_1->art->point_28 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-center text-danger">Nilai peserta didik belum dimasukkan!</p>
                                    @endif
                                </div>


                                <div class="tab-pane fade" id="semester2" role="tabpanel">
                                    @if ($raport_2 != null)
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-lg-9 col-xl-10">
                                                        <div class="row row-cols-lg-2 row-cols-xl-auto g-4">
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="position-relative">
                                                                    <label for="">Nama Peserta
                                                                        Didik</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $student->nama_lengkap }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="position-relative">
                                                                    <label for="">Tahun Ajaran</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $raport_2->tahun_ajaran }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="form-group">
                                                                    <label for="">
                                                                        Tanggal Mulai<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_mulai" id="tanggal_mulai"
                                                                        placeholder="dd-mm-yyyy" disabled
                                                                        value="{{ $raport_2->tanggal_mulai }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="form-group">
                                                                    <label for="">
                                                                        Tanggal Selesai<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_selesai" id="tanggal_selesai"
                                                                        placeholder="dd-mm-yyyy" disabled
                                                                        value="{{ $raport_2->tanggal_selesai }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-xl-2 mt-3 mt-lg-0">
                                                        <div class="float-lg-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-white" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Lainnya <i class='bx bx-slider'></i>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('playgroup.raport.editSemester2', $student->id) }}">Edit
                                                                            Nilai</a>
                                                                    </li>
                                                                    <li><a href="#" class="dropdown-item delete"
                                                                            data-id="{{ $raport_2->id }}"
                                                                            semester-name="semester {{ $raport_2->semester_id }}">Hapus
                                                                            Nilai</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($raport_2 != null)
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
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menyanyikan lagu - lagu bernafaskan agama yang
                                                                        sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        Menyebut tempat - tempat ibadah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>
                                                                        Menyebut hari - hari besar Agama
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Meniru pelaksanaan kegiatan ibadah secara sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menyebutkan waktu beribadah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Menyebutkan ciptaan - ciptaan Tuhan (manusia, bumi,
                                                                        langit,
                                                                        tanaman, hewan)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Tidak mengganggu teman yang sedang melakukan
                                                                        kegiatan /
                                                                        melaksanakan ibadah</td>

                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>
                                                                        Berterima kasih jika memperoleh sesuatu
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>
                                                                        Selalu bersikap ramah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>
                                                                        Meminta tolong dengan baik, mengucapkan salam
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>
                                                                        Melaksanakan tata tertib yang ada di sekolah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>
                                                                        Mengikuti aturan permainan
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Mau mengalah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Mendengarkan orang tua / teman bicara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Berbahasa sopan dalam berbicara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>tidak lekas marah atau membentak - bentak</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Mudah bergaul / berteman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Dapat / suka menolong teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Saling membantu sesama teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Saling membantu sesama teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Menunjukkan kebanggaan terhadap hasil kerjanya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menggunakan barang orang lain dengan hati - hati
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Mau membagi miliknya (makn, minum, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Meminjamkan miliknya dengan senang hati</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Membersihkan diri sendiri dengan bantuan (menggosok
                                                                        gigi,
                                                                        mandi, buang air, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>27</td>
                                                                    <td>Mengurus dirinya sendiri dengan sedikit bantuan
                                                                        (berpakaian
                                                                        sendiri, makan sendiri, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_27 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>28</td>
                                                                    <td>Mengembalikan mainan pada tempatnya setelah
                                                                        digunakan
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_28 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>29</td>
                                                                    <td>Membuang sampah pada tempatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_29 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>30</td>
                                                                    <td>Membantu membersihkan lingkungan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_30 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>31</td>
                                                                    <td>Mau berpisah dengan ibu tanpa menangis</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_31 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>32</td>
                                                                    <td>Sabar menunggu giliran</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_32 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>33</td>
                                                                    <td>Berhenti bermain pada waktunya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_33 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>34</td>
                                                                    <td>Dapat dibujuk</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_34 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>35</td>
                                                                    <td>Tidak cengeng</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_35 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>36</td>
                                                                    <td>Mau menerima tugas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_36 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>37</td>
                                                                    <td>Mengerjakan tugas sampai selesai</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_37 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>38</td>
                                                                    <td>Mengenal dan menghindari benda - benda yang
                                                                        berbahaya
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_38 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>39</td>
                                                                    <td>Mengenal dan menghindari obat - obatan yang
                                                                        berbahaya
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_39 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>40</td>
                                                                    <td>Melaksanakan tugas yang diberikan guru</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_40 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>41</td>
                                                                    <td>Mengetahui barang milik sendiri dan milik orang lain
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->behavior_formation->point_41 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menirukan kembali 3 - 4 urutan kata</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menyebutkan kata - kata yang mempunyai suku kata
                                                                        awal yang sama, <br> misal : kaki - kali. atau suku
                                                                        kata akhir yang sama, misal : nama - sama, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Melakukan 2 - 3 perintah secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Mendengarkan cerita dan menceritakan kembali isi
                                                                        cerita secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menyebutkan nama diri, nama orang tua, jenis
                                                                        kelamin, alamat rumah secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Menceritakan pengalaman / kejadian secara sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Menjawab pertanyaan tentang keterangan / informasi
                                                                        secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Bercerita menggunakan kata ganti aku, saya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Menunjukkan gerakan - gerakan, misal : duduk,
                                                                        jongkok, berlari, makan, melompat, menangis, senang,
                                                                        sedih, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menyebutkan posisi / keterangan tempat, misal : di
                                                                        luar, di dalam, di atas, di bawah, <br> di depan, di
                                                                        belakang, di kiri, di kanan dsb</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Menyebutkan waktu (pagi, siang, malam)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Membuat berbagai macam coretan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Membuat gambar dan coretan (tulisan) tentang cerita
                                                                        mengenai gambar yang dibuatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Bercerita tentang gambar yang disediakan atau yang
                                                                        dibuat sendiri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Mengurutkan dan menceritakan isi gambar seri
                                                                        sederhana (3 - 4 gambar)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menghubungkan gambar / benda dengan kata</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Membaca gambar yang memiliki kata / kalimat
                                                                        sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Menceritakan isi buku walaupun tidak sama tulisan
                                                                        dengan yang diungkapkan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Menghubungkan tulisan sederhana dengan simbol yang
                                                                        melambangkannya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->language_ability->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menunjuk sebanyak - banyaknya benda, hewan, tanaman,
                                                                        yang mempunyai warna, <br> bentuk atau ukuran atau
                                                                        menurut cita - cita tertentu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Mengenal kasar - halus, berat - ringan, panjang -
                                                                        pendek, jauh - dekat, banyak - sedikit, sama - tidak
                                                                        sama</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Mencari lokasi tempat asal suara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Memasangkan benda sesuai dengan pasangannya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Membilang / menyebut urutan bilangan dari 1 sampai
                                                                        10</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Membilang dan menunjuk benda (mengenal konsep
                                                                        bilangan dengan benda - benda) sampai 5</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Menunjukkan urutan benda untuk bilangan sampai 5
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Menghubungkan / memasangkan lambang bilangan dengan
                                                                        benda - benda sampai 5 (anak tidak disuruh menulis)
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menunjuk 2 kumpulan benda yang sama jenisnya, yang
                                                                        tidak sama, lebih banyak dan lebih sedikit</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Menyebutkan kembali benda - benda yang baru
                                                                        dilihatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Menyebut dan menunjuk bentuk - bentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Mengelompokkan bentuk - bentuk geometri (lingkaran,
                                                                        segitiga, segiempat)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Menyebutkan dan menunjukkan benda - benda yang
                                                                        berbentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Mengerjakan "maze" (mencari jejak) yang sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menyusun kepingan puzzle menjadi bentuk utuh (4 - 6
                                                                        keping)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Mengukur panjang dengan langkah dan jengkal</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Meninmbang benda dengan timbangan buatan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Mengisi wadah dengan timbangan air, pasir, biji -
                                                                        bijian, beras, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Menyatakan dan membedakan waktu (pagi, siang, malam)
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Mengetahui nama - nama dalam satu minggu, bulan, dan
                                                                        tahun</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menyebutkan hasil pembahasan (menggabungkan 2
                                                                        kumpulan benda) dan <br> pengurangan (memisahkan
                                                                        kumpulan benda) dengan benda sampai 5</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Memperkirakan urutan berikutnya setelah melihat
                                                                        bentuk 2 pola yang berurutan, <br> misal : merah,
                                                                        putih,
                                                                        merah, putih, merah,...</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->cognitive->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Membuat berbagai bentuk dengan menggunakan
                                                                        plastisin, playdough / tanah liat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menjiplak dan meniru membuat garis tegak, datar,
                                                                        miring, lengkung dan lingkaran</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>meniru melipat kertas sederhana (1 - 6 lipatan)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Menjahit jelujur 10 lubang dengan tali sepatu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menggunting bebas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Merobek bebas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Menyusun menara dari kubus minimal 8 kubus</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Membuat lingkaran dan segi empat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Memegang pensil (belum sempurna)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menangkap dan melempar bola besar dari jarak kira -
                                                                        kira 1 - 2 meter</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Memantulkan bola besar (diam di tempat)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Memantulkan bola besar sambil berjalan / bergerak
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Melambungkan dan menangkap kantong biji</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Berjalan masu dan garis lurus, berjalan di atas
                                                                        papan titian, berjalan berjinjit</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Berjalan mundur dan keamping pada garis lurus sejauh
                                                                        1 - 2 meter</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Meloncat dari ketinggian 20 - 30 cm</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Memanjat dan bergantung</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Berdiri diatas satu kaki selama 10 detik</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Berlari sambil melompat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Menendang bola dengan terarah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Merayap dan merangkak lurus kedepan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Bermain dengan simpai (bebas, melompat dalam simpai,
                                                                        merangkak dalam terowongan dan simpai), dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Menirukan berbagai gerakan binatang / hewan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Menirukan gerakan tanaman yang terkena angin (sepoi
                                                                        - sepoi dan angin kencang)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Naik sepeda roda dua (belum seimbang)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->physical_motoric->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menggambar bebas dari bentuk lingkaran dan segiempat
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menggambar orang dengan lengkap dan sederhana (belum
                                                                        proporsional)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Stempel / mencetak dengan berbagai media (pelepah
                                                                        pisang, batang pepaya, kertas, busa, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Mewarnai bentuk gambar sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Mewarnai bentuk - bentuk geometri dengan ukuran
                                                                        besar</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Meronce dengan manik - manik/td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Mencipta 2 bentuk bangunan dari balok</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Mencipta 2 bentuk dari kepingan bentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Mencipta bentuk dari lidi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menganyam dengan kertas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Membatik dengan jumputan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Mencocok dengan pola buatan guru</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Permainan warna dengan berbagai alat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Melukis dengan jari (finger painting)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Membuat bunyi - bunyian dengan berbagai alat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menciptakan alat perkusi sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Bertepuk tangan dengan 2 pola</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Menggerakkan kepala, tangan dan kaki sesuai dengan
                                                                        irama musik / ritmik</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Mengekspresikan diri secara bebas sesuai irama musik
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Mengikuti gerakan tari sederhana sesuai irama musik
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Mengekspresikan diri dalam gerak bervariasi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menyanyi 15 lagu naak - anak</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Bermain dengan berbagai alat musik perkusi sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Mengucapkan sajak dengan ekspresi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Mengucapkan syair dari berbagai lagu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>27</td>
                                                                    <td>Dapat melakukan gerakan pantomim sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_27 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>28</td>
                                                                    <td>Melakukan gerak pantomim secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_2)
                                                                            {{ $raport_2->art->point_28 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-center text-danger">Nilai peserta didik belum dimasukkan!</p>
                                    @endif
                                </div>


                                <div class="tab-pane fade" id="semester3" role="tabpanel">
                                    @if ($raport_3 != null)
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-lg-9 col-xl-10">
                                                        <div class="row row-cols-lg-2 row-cols-xl-auto g-4">
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="position-relative">
                                                                    <label for="">Nama Peserta
                                                                        Didik</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $student->nama_lengkap }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="position-relative">
                                                                    <label for="">Tahun Ajaran</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $raport_3->tahun_ajaran }}"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="form-group">
                                                                    <label for="">
                                                                        Tanggal Mulai<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_mulai" id="tanggal_mulai"
                                                                        placeholder="dd-mm-yyyy" disabled
                                                                        value="{{ $raport_3->tanggal_mulai }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="form-group">
                                                                    <label for="">
                                                                        Tanggal Selesai<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_selesai" id="tanggal_selesai"
                                                                        placeholder="dd-mm-yyyy" disabled
                                                                        value="{{ $raport_3->tanggal_selesai }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-xl-2 mt-3 mt-lg-0">
                                                        <div class="float-lg-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-white" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Lainnya <i class='bx bx-slider'></i>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('playgroup.raport.editSemester3', $student->id) }}">Edit
                                                                            Nilai</a>
                                                                    </li>
                                                                    <li><a href="#" class="dropdown-item delete"
                                                                            data-id="{{ $raport_3->id }}"
                                                                            semester-name="semester {{ $raport_3->semester_id }}">Hapus
                                                                            Nilai</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($raport_3 != null)
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
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menyanyikan lagu - lagu bernafaskan agama yang
                                                                        sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        Menyebut tempat - tempat ibadah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>
                                                                        Menyebut hari - hari besar Agama
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Meniru pelaksanaan kegiatan ibadah secara sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menyebutkan waktu beribadah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Menyebutkan ciptaan - ciptaan Tuhan (manusia, bumi,
                                                                        langit,
                                                                        tanaman, hewan)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Tidak mengganggu teman yang sedang melakukan
                                                                        kegiatan /
                                                                        melaksanakan ibadah</td>

                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>
                                                                        Berterima kasih jika memperoleh sesuatu
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>
                                                                        Selalu bersikap ramah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>
                                                                        Meminta tolong dengan baik, mengucapkan salam
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>
                                                                        Melaksanakan tata tertib yang ada di sekolah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>
                                                                        Mengikuti aturan permainan
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Mau mengalah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Mendengarkan orang tua / teman bicara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Berbahasa sopan dalam berbicara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>tidak lekas marah atau membentak - bentak</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Mudah bergaul / berteman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Dapat / suka menolong teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Saling membantu sesama teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Saling membantu sesama teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Menunjukkan kebanggaan terhadap hasil kerjanya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menggunakan barang orang lain dengan hati - hati
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Mau membagi miliknya (makn, minum, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Meminjamkan miliknya dengan senang hati</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Membersihkan diri sendiri dengan bantuan (menggosok
                                                                        gigi,
                                                                        mandi, buang air, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>27</td>
                                                                    <td>Mengurus dirinya sendiri dengan sedikit bantuan
                                                                        (berpakaian
                                                                        sendiri, makan sendiri, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_27 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>28</td>
                                                                    <td>Mengembalikan mainan pada tempatnya setelah
                                                                        digunakan
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_28 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>29</td>
                                                                    <td>Membuang sampah pada tempatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_29 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>30</td>
                                                                    <td>Membantu membersihkan lingkungan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_30 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>31</td>
                                                                    <td>Mau berpisah dengan ibu tanpa menangis</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_31 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>32</td>
                                                                    <td>Sabar menunggu giliran</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_32 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>33</td>
                                                                    <td>Berhenti bermain pada waktunya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_33 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>34</td>
                                                                    <td>Dapat dibujuk</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_34 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>35</td>
                                                                    <td>Tidak cengeng</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_35 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>36</td>
                                                                    <td>Mau menerima tugas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_36 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>37</td>
                                                                    <td>Mengerjakan tugas sampai selesai</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_37 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>38</td>
                                                                    <td>Mengenal dan menghindari benda - benda yang
                                                                        berbahaya
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_38 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>39</td>
                                                                    <td>Mengenal dan menghindari obat - obatan yang
                                                                        berbahaya
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_39 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>40</td>
                                                                    <td>Melaksanakan tugas yang diberikan guru</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_40 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>41</td>
                                                                    <td>Mengetahui barang milik sendiri dan milik orang lain
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->behavior_formation->point_41 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menirukan kembali 3 - 4 urutan kata</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menyebutkan kata - kata yang mempunyai suku kata
                                                                        awal yang sama, <br> misal : kaki - kali. atau suku
                                                                        kata akhir yang sama, misal : nama - sama, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Melakukan 2 - 3 perintah secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Mendengarkan cerita dan menceritakan kembali isi
                                                                        cerita secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menyebutkan nama diri, nama orang tua, jenis
                                                                        kelamin, alamat rumah secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Menceritakan pengalaman / kejadian secara sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Menjawab pertanyaan tentang keterangan / informasi
                                                                        secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Bercerita menggunakan kata ganti aku, saya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Menunjukkan gerakan - gerakan, misal : duduk,
                                                                        jongkok, berlari, makan, melompat, menangis, senang,
                                                                        sedih, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menyebutkan posisi / keterangan tempat, misal : di
                                                                        luar, di dalam, di atas, di bawah, <br> di depan, di
                                                                        belakang, di kiri, di kanan dsb</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Menyebutkan waktu (pagi, siang, malam)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Membuat berbagai macam coretan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Membuat gambar dan coretan (tulisan) tentang cerita
                                                                        mengenai gambar yang dibuatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Bercerita tentang gambar yang disediakan atau yang
                                                                        dibuat sendiri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Mengurutkan dan menceritakan isi gambar seri
                                                                        sederhana (3 - 4 gambar)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menghubungkan gambar / benda dengan kata</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Membaca gambar yang memiliki kata / kalimat
                                                                        sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Menceritakan isi buku walaupun tidak sama tulisan
                                                                        dengan yang diungkapkan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Menghubungkan tulisan sederhana dengan simbol yang
                                                                        melambangkannya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->language_ability->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menunjuk sebanyak - banyaknya benda, hewan, tanaman,
                                                                        yang mempunyai warna, <br> bentuk atau ukuran atau
                                                                        menurut cita - cita tertentu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Mengenal kasar - halus, berat - ringan, panjang -
                                                                        pendek, jauh - dekat, banyak - sedikit, sama - tidak
                                                                        sama</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Mencari lokasi tempat asal suara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Memasangkan benda sesuai dengan pasangannya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Membilang / menyebut urutan bilangan dari 1 sampai
                                                                        10</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Membilang dan menunjuk benda (mengenal konsep
                                                                        bilangan dengan benda - benda) sampai 5</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Menunjukkan urutan benda untuk bilangan sampai 5
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Menghubungkan / memasangkan lambang bilangan dengan
                                                                        benda - benda sampai 5 (anak tidak disuruh menulis)
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menunjuk 2 kumpulan benda yang sama jenisnya, yang
                                                                        tidak sama, lebih banyak dan lebih sedikit</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Menyebutkan kembali benda - benda yang baru
                                                                        dilihatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Menyebut dan menunjuk bentuk - bentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Mengelompokkan bentuk - bentuk geometri (lingkaran,
                                                                        segitiga, segiempat)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Menyebutkan dan menunjukkan benda - benda yang
                                                                        berbentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Mengerjakan "maze" (mencari jejak) yang sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menyusun kepingan puzzle menjadi bentuk utuh (4 - 6
                                                                        keping)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Mengukur panjang dengan langkah dan jengkal</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Meninmbang benda dengan timbangan buatan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Mengisi wadah dengan timbangan air, pasir, biji -
                                                                        bijian, beras, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Menyatakan dan membedakan waktu (pagi, siang, malam)
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Mengetahui nama - nama dalam satu minggu, bulan, dan
                                                                        tahun</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menyebutkan hasil pembahasan (menggabungkan 2
                                                                        kumpulan benda) dan <br> pengurangan (memisahkan
                                                                        kumpulan benda) dengan benda sampai 5</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Memperkirakan urutan berikutnya setelah melihat
                                                                        bentuk 2 pola yang berurutan, <br> misal : merah,
                                                                        putih,
                                                                        merah, putih, merah,...</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->cognitive->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Membuat berbagai bentuk dengan menggunakan
                                                                        plastisin, playdough / tanah liat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menjiplak dan meniru membuat garis tegak, datar,
                                                                        miring, lengkung dan lingkaran</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>meniru melipat kertas sederhana (1 - 6 lipatan)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Menjahit jelujur 10 lubang dengan tali sepatu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menggunting bebas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Merobek bebas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Menyusun menara dari kubus minimal 8 kubus</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Membuat lingkaran dan segi empat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Memegang pensil (belum sempurna)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menangkap dan melempar bola besar dari jarak kira -
                                                                        kira 1 - 2 meter</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Memantulkan bola besar (diam di tempat)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Memantulkan bola besar sambil berjalan / bergerak
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Melambungkan dan menangkap kantong biji</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Berjalan masu dan garis lurus, berjalan di atas
                                                                        papan titian, berjalan berjinjit</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Berjalan mundur dan keamping pada garis lurus sejauh
                                                                        1 - 2 meter</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Meloncat dari ketinggian 20 - 30 cm</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Memanjat dan bergantung</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Berdiri diatas satu kaki selama 10 detik</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Berlari sambil melompat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Menendang bola dengan terarah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Merayap dan merangkak lurus kedepan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Bermain dengan simpai (bebas, melompat dalam simpai,
                                                                        merangkak dalam terowongan dan simpai), dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Menirukan berbagai gerakan binatang / hewan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Menirukan gerakan tanaman yang terkena angin (sepoi
                                                                        - sepoi dan angin kencang)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Naik sepeda roda dua (belum seimbang)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->physical_motoric->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menggambar bebas dari bentuk lingkaran dan segiempat
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menggambar orang dengan lengkap dan sederhana (belum
                                                                        proporsional)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Stempel / mencetak dengan berbagai media (pelepah
                                                                        pisang, batang pepaya, kertas, busa, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Mewarnai bentuk gambar sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Mewarnai bentuk - bentuk geometri dengan ukuran
                                                                        besar</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Meronce dengan manik - manik/td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Mencipta 2 bentuk bangunan dari balok</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Mencipta 2 bentuk dari kepingan bentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Mencipta bentuk dari lidi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menganyam dengan kertas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Membatik dengan jumputan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Mencocok dengan pola buatan guru</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Permainan warna dengan berbagai alat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Melukis dengan jari (finger painting)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Membuat bunyi - bunyian dengan berbagai alat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menciptakan alat perkusi sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Bertepuk tangan dengan 2 pola</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Menggerakkan kepala, tangan dan kaki sesuai dengan
                                                                        irama musik / ritmik</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Mengekspresikan diri secara bebas sesuai irama musik
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Mengikuti gerakan tari sederhana sesuai irama musik
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Mengekspresikan diri dalam gerak bervariasi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menyanyi 15 lagu naak - anak</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Bermain dengan berbagai alat musik perkusi sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Mengucapkan sajak dengan ekspresi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Mengucapkan syair dari berbagai lagu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>27</td>
                                                                    <td>Dapat melakukan gerakan pantomim sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_27 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>28</td>
                                                                    <td>Melakukan gerak pantomim secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_3)
                                                                            {{ $raport_3->art->point_28 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-center text-danger">Nilai peserta didik belum dimasukkan!</p>
                                    @endif
                                </div>


                                <div class="tab-pane fade" id="semester4" role="tabpanel">
                                    @if ($raport_4 != null)
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-lg-9 col-xl-10">
                                                        <div class="row row-cols-lg-2 row-cols-xl-auto g-4">
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="position-relative">
                                                                    <label for="">Nama Peserta
                                                                        Didik</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $student->nama_lengkap }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="position-relative">
                                                                    <label for="">Tahun Ajaran</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $raport_4->tahun_ajaran }}"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="form-group">
                                                                    <label for="">
                                                                        Tanggal Mulai<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_mulai" id="tanggal_mulai"
                                                                        placeholder="dd-mm-yyyy" disabled
                                                                        value="{{ $raport_4->tanggal_mulai }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg">
                                                                <div class="form-group">
                                                                    <label for="">
                                                                        Tanggal Selesai<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="tanggal_selesai" id="tanggal_selesai"
                                                                        placeholder="dd-mm-yyyy" disabled
                                                                        value="{{ $raport_4->tanggal_selesai }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-xl-2 mt-3 mt-lg-0">
                                                        <div class="float-lg-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-white" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    Lainnya <i class='bx bx-slider'></i>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <li><a class="dropdown-item"
                                                                            href="{{ route('playgroup.raport.editSemester4', $student->id) }}">Edit
                                                                            Nilai</a>
                                                                    </li>
                                                                    <li><a href="#" class="dropdown-item delete"
                                                                            data-id="{{ $raport_4->id }}"
                                                                            semester-name="semester {{ $raport_4->semester_id }}">Hapus
                                                                            Nilai</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($raport_4 != null)
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
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menyanyikan lagu - lagu bernafaskan agama yang
                                                                        sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        Menyebut tempat - tempat ibadah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>
                                                                        Menyebut hari - hari besar Agama
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Meniru pelaksanaan kegiatan ibadah secara sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menyebutkan waktu beribadah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Menyebutkan ciptaan - ciptaan Tuhan (manusia, bumi,
                                                                        langit,
                                                                        tanaman, hewan)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Tidak mengganggu teman yang sedang melakukan
                                                                        kegiatan /
                                                                        melaksanakan ibadah</td>

                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>
                                                                        Berterima kasih jika memperoleh sesuatu
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>
                                                                        Selalu bersikap ramah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>
                                                                        Meminta tolong dengan baik, mengucapkan salam
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>
                                                                        Melaksanakan tata tertib yang ada di sekolah
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>
                                                                        Mengikuti aturan permainan
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Mau mengalah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Mendengarkan orang tua / teman bicara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Berbahasa sopan dalam berbicara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>tidak lekas marah atau membentak - bentak</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Mudah bergaul / berteman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Dapat / suka menolong teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Saling membantu sesama teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Saling membantu sesama teman</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Menunjukkan kebanggaan terhadap hasil kerjanya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menggunakan barang orang lain dengan hati - hati
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Mau membagi miliknya (makn, minum, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Meminjamkan miliknya dengan senang hati</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Membersihkan diri sendiri dengan bantuan (menggosok
                                                                        gigi,
                                                                        mandi, buang air, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>27</td>
                                                                    <td>Mengurus dirinya sendiri dengan sedikit bantuan
                                                                        (berpakaian
                                                                        sendiri, makan sendiri, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_27 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>28</td>
                                                                    <td>Mengembalikan mainan pada tempatnya setelah
                                                                        digunakan
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_28 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>29</td>
                                                                    <td>Membuang sampah pada tempatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_29 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>30</td>
                                                                    <td>Membantu membersihkan lingkungan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_30 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>31</td>
                                                                    <td>Mau berpisah dengan ibu tanpa menangis</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_31 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>32</td>
                                                                    <td>Sabar menunggu giliran</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_32 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>33</td>
                                                                    <td>Berhenti bermain pada waktunya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_33 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>34</td>
                                                                    <td>Dapat dibujuk</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_34 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>35</td>
                                                                    <td>Tidak cengeng</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_35 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>36</td>
                                                                    <td>Mau menerima tugas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_36 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>37</td>
                                                                    <td>Mengerjakan tugas sampai selesai</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_37 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>38</td>
                                                                    <td>Mengenal dan menghindari benda - benda yang
                                                                        berbahaya
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_38 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>39</td>
                                                                    <td>Mengenal dan menghindari obat - obatan yang
                                                                        berbahaya
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_39 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>40</td>
                                                                    <td>Melaksanakan tugas yang diberikan guru</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_40 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>41</td>
                                                                    <td>Mengetahui barang milik sendiri dan milik orang lain
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->behavior_formation->point_41 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menirukan kembali 3 - 4 urutan kata</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menyebutkan kata - kata yang mempunyai suku kata
                                                                        awal yang sama, <br> misal : kaki - kali. atau suku
                                                                        kata akhir yang sama, misal : nama - sama, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Melakukan 2 - 3 perintah secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Mendengarkan cerita dan menceritakan kembali isi
                                                                        cerita secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menyebutkan nama diri, nama orang tua, jenis
                                                                        kelamin, alamat rumah secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Menceritakan pengalaman / kejadian secara sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Menjawab pertanyaan tentang keterangan / informasi
                                                                        secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Bercerita menggunakan kata ganti aku, saya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Menunjukkan gerakan - gerakan, misal : duduk,
                                                                        jongkok, berlari, makan, melompat, menangis, senang,
                                                                        sedih, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menyebutkan posisi / keterangan tempat, misal : di
                                                                        luar, di dalam, di atas, di bawah, <br> di depan, di
                                                                        belakang, di kiri, di kanan dsb</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Menyebutkan waktu (pagi, siang, malam)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Membuat berbagai macam coretan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Membuat gambar dan coretan (tulisan) tentang cerita
                                                                        mengenai gambar yang dibuatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Bercerita tentang gambar yang disediakan atau yang
                                                                        dibuat sendiri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Mengurutkan dan menceritakan isi gambar seri
                                                                        sederhana (3 - 4 gambar)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menghubungkan gambar / benda dengan kata</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Membaca gambar yang memiliki kata / kalimat
                                                                        sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Menceritakan isi buku walaupun tidak sama tulisan
                                                                        dengan yang diungkapkan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Menghubungkan tulisan sederhana dengan simbol yang
                                                                        melambangkannya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->language_ability->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menunjuk sebanyak - banyaknya benda, hewan, tanaman,
                                                                        yang mempunyai warna, <br> bentuk atau ukuran atau
                                                                        menurut cita - cita tertentu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Mengenal kasar - halus, berat - ringan, panjang -
                                                                        pendek, jauh - dekat, banyak - sedikit, sama - tidak
                                                                        sama</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Mencari lokasi tempat asal suara</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Memasangkan benda sesuai dengan pasangannya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Membilang / menyebut urutan bilangan dari 1 sampai
                                                                        10</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Membilang dan menunjuk benda (mengenal konsep
                                                                        bilangan dengan benda - benda) sampai 5</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Menunjukkan urutan benda untuk bilangan sampai 5
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Menghubungkan / memasangkan lambang bilangan dengan
                                                                        benda - benda sampai 5 (anak tidak disuruh menulis)
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menunjuk 2 kumpulan benda yang sama jenisnya, yang
                                                                        tidak sama, lebih banyak dan lebih sedikit</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Menyebutkan kembali benda - benda yang baru
                                                                        dilihatnya</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Menyebut dan menunjuk bentuk - bentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Mengelompokkan bentuk - bentuk geometri (lingkaran,
                                                                        segitiga, segiempat)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Menyebutkan dan menunjukkan benda - benda yang
                                                                        berbentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Mengerjakan "maze" (mencari jejak) yang sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menyusun kepingan puzzle menjadi bentuk utuh (4 - 6
                                                                        keping)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Mengukur panjang dengan langkah dan jengkal</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Meninmbang benda dengan timbangan buatan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Mengisi wadah dengan timbangan air, pasir, biji -
                                                                        bijian, beras, dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Menyatakan dan membedakan waktu (pagi, siang, malam)
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Mengetahui nama - nama dalam satu minggu, bulan, dan
                                                                        tahun</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menyebutkan hasil pembahasan (menggabungkan 2
                                                                        kumpulan benda) dan <br> pengurangan (memisahkan
                                                                        kumpulan benda) dengan benda sampai 5</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Memperkirakan urutan berikutnya setelah melihat
                                                                        bentuk 2 pola yang berurutan, <br> misal : merah,
                                                                        putih,
                                                                        merah, putih, merah,...</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->cognitive->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Membuat berbagai bentuk dengan menggunakan
                                                                        plastisin, playdough / tanah liat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menjiplak dan meniru membuat garis tegak, datar,
                                                                        miring, lengkung dan lingkaran</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>meniru melipat kertas sederhana (1 - 6 lipatan)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Menjahit jelujur 10 lubang dengan tali sepatu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Menggunting bebas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Merobek bebas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Menyusun menara dari kubus minimal 8 kubus</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Membuat lingkaran dan segi empat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Memegang pensil (belum sempurna)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menangkap dan melempar bola besar dari jarak kira -
                                                                        kira 1 - 2 meter</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Memantulkan bola besar (diam di tempat)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Memantulkan bola besar sambil berjalan / bergerak
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Melambungkan dan menangkap kantong biji</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Berjalan masu dan garis lurus, berjalan di atas
                                                                        papan titian, berjalan berjinjit</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Berjalan mundur dan keamping pada garis lurus sejauh
                                                                        1 - 2 meter</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Meloncat dari ketinggian 20 - 30 cm</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Memanjat dan bergantung</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Berdiri diatas satu kaki selama 10 detik</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Berlari sambil melompat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Menendang bola dengan terarah</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Merayap dan merangkak lurus kedepan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Bermain dengan simpai (bebas, melompat dalam simpai,
                                                                        merangkak dalam terowongan dan simpai), dll</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Menirukan berbagai gerakan binatang / hewan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Menirukan gerakan tanaman yang terkena angin (sepoi
                                                                        - sepoi dan angin kencang)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Naik sepeda roda dua (belum seimbang)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->physical_motoric->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
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
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_1 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Menggambar bebas dari bentuk lingkaran dan segiempat
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_2 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Menggambar orang dengan lengkap dan sederhana (belum
                                                                        proporsional)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_3 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Stempel / mencetak dengan berbagai media (pelepah
                                                                        pisang, batang pepaya, kertas, busa, dll)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_4 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Mewarnai bentuk gambar sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_5 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Mewarnai bentuk - bentuk geometri dengan ukuran
                                                                        besar</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_6 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Meronce dengan manik - manik/td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_7 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Mencipta 2 bentuk bangunan dari balok</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_8 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Mencipta 2 bentuk dari kepingan bentuk geometri</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_9 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Mencipta bentuk dari lidi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_10 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Menganyam dengan kertas</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_11 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Membatik dengan jumputan</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_12 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Mencocok dengan pola buatan guru</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_13 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Permainan warna dengan berbagai alat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_14 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Melukis dengan jari (finger painting)</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_15 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Membuat bunyi - bunyian dengan berbagai alat</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_16 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Menciptakan alat perkusi sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_17 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Bertepuk tangan dengan 2 pola</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_18 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Menggerakkan kepala, tangan dan kaki sesuai dengan
                                                                        irama musik / ritmik</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_19 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Mengekspresikan diri secara bebas sesuai irama musik
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_20 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>21</td>
                                                                    <td>Mengikuti gerakan tari sederhana sesuai irama musik
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_21 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>22</td>
                                                                    <td>Mengekspresikan diri dalam gerak bervariasi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_22 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>23</td>
                                                                    <td>Menyanyi 15 lagu naak - anak</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_23 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>24</td>
                                                                    <td>Bermain dengan berbagai alat musik perkusi sederhana
                                                                    </td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_24 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>25</td>
                                                                    <td>Mengucapkan sajak dengan ekspresi</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_25 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>26</td>
                                                                    <td>Mengucapkan syair dari berbagai lagu</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_26 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>27</td>
                                                                    <td>Dapat melakukan gerakan pantomim sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_27 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>28</td>
                                                                    <td>Melakukan gerak pantomim secara sederhana</td>
                                                                    <td class="text-center" colspan="4">
                                                                        @if ($raport_4)
                                                                            {{ $raport_4->art->point_28 }}
                                                                        @else
                                                                            <span class="text-danger">*nilai belum
                                                                                dimasukkan</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-center text-danger">Nilai peserta didik belum dimasukkan!</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection

@section('script')
    {{-- sweet alert --}}
    <script>
        $('.delete').click(function() {
            var raportId = $(this).attr('data-id');
            var semesterName = $(this).attr('semester-name');
            swal({
                    title: "Apakah kamu yakin ?",
                    text: "Kamu akan menghapus data " + semesterName + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/nilai-raport/delete/" + raportId + "";
                        swal("Selamat! Data berhasil dihapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus!");
                    }
                });
        });
    </script>
@endsection
