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
                <div class="breadcrumb-title pe-3">PPDB</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Penerimaan Peserta Didik baru</li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Program</a>
                    </div>
                </div> --}}
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Program PPDB</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Program</th>
                                    <th>Status</th>
                                    <th>Mulai Program</th>
                                    <th>Selesai Program</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programs as $program)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $program->nama_program }}</td>
                                        <td>
                                            @if ($program->status == 'Buka')
                                                <span class="px-3 badge bg-success">{{ $program->status }}</span>
                                            @else
                                                <span class="px-3 badge bg-secondary">{{ $program->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ date('d F Y', strtotime($program->mulai_program)) }}</td>
                                        <td>{{ date('d F Y', strtotime($program->selesai_program)) }}</td>
                                        <td class="gap-2">
                                            <a href="{{ route('ppdb.editProgram', $program->id) }}" class="mx-md-1">
                                                <span class="badge bg-warning"><i class='bx bxs-edit'></i> Edit</span>
                                            </a>
                                            {{-- <a href="#" class="mx-md-1 delete" data-id="{{ $program->id }}"
                                                data-name="{{ $program->nama_program }}">
                                                <span class="badge bg-danger"><i class='bx bxs-trash'></i> Delete</span>
                                            </a> --}}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Program</th>
                                    <th>Status</th>
                                    <th>Mulai Program</th>
                                    <th>Selesai Program</th>
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
            var programId = $(this).attr('data-id');
            var programName = $(this).attr('data-name');
            swal({
                    title: "Apakah kamu yakin ?",
                    text: "Kamu akan menghapus data " + programName + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/ppdb/program/delete/" + programId + "";
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
