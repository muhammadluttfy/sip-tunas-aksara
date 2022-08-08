@extends('layouts.app')

@section('style')
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet" />
@endsection

@section('wrapper')
    <!--start page wrapper -->
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
                                    <div class="text-white">{{ session()->get('success') }}</div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">KB Tunas Aksara</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Semua Peserta Didik</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('playgroup.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Semua Peserta Didik</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10%">No. Urut</th>
                                    <th width="15%">NIS</th>
                                    <th width="30%">Nama Lengkap</th>
                                    <th width="10%">Jenis Kelamin</th>
                                    <th width="15%">Kelompok</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->no_identitas }}</td>
                                        <td>{{ $student->nama_lengkap }}</td>
                                        <td>{{ $student->jenis_kelamin }}</td>
                                        <td>{{ $student->student_detail->kelompok }}</td>
                                        <td class="gap-2">
                                            <a href="/kb-tunas-aksara/{{ $student->username }}" class="mx-md-1">
                                                <span class="text-white badge bg-secondary"><i class='bx bxs-show'></i>
                                                    Detail</span>
                                            </a>
                                            <a href="{{ route('playgroup.edit', $student->username) }}" class="mx-md-1">
                                                <span class="badge bg-warning"><i class='bx bxs-edit'></i> Edit</span>
                                            </a>
                                            <a href="#" class="mx-md-1 delete" data-id="{{ $student->id }}"
                                                data-name="{{ $student->username }}">
                                                <span class="badge bg-danger"><i class='bx bxs-trash'></i> Delete</span>
                                            </a>

                                            <a href="{{ route('raport.show', $student->username) }}" class="mx-md-1">
                                                <span class="badge bg-success"><i class='lni lni-graduation'></i>
                                                    Nilai Raport </span>
                                            </a>

                                            <a href="{{ route('graduate.create', $student->username) }}" class="mx-md-1">
                                                <span class="badge bg-gradient-scooter"><i class='lni lni-graduation'></i>
                                                    Lulus </span>
                                            </a>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No. Urut</th>
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelompok</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    {{-- sweet alert --}}
    <script>
        $('.delete').click(function() {
            var studentId = $(this).attr('data-id');
            var studentName = $(this).attr('data-name');
            swal({
                    title: "Apakah kamu yakin ?",
                    text: "Kamu akan menghapus data " + studentName + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/kb-tunas-aksara/delete/" + studentId + "";
                        swal("Selamat! Data berhasil dihapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus!");
                    }
                });
        });
    </script>

    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

    @parent
    <!--notification js -->
    <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
@endsection
