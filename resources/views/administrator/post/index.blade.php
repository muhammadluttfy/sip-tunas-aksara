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
                <div class=" ms-auto col-5">
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
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">Forum PAUD</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Postingan</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Postingan</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Semua Postingan</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th width="35%">Judul</th>
                                    <th width="25%">Kategori</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->judul }}</td>
                                        <td>{{ $post->category->nama }}</td>
                                        <td class="gap-2">
                                            <a href="{{ route('posts.show', $post->slug) }}" class="mx-md-1">
                                                <span class="text-white badge bg-secondary"><i class='bx bxs-show'></i>
                                                    Preview</span>
                                            </a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="mx-md-1">
                                                <span class="badge bg-warning"><i class='bx bxs-edit'></i> Edit</span>
                                            </a>
                                            <a href="#" class="mx-md-1 delete" data-id="{{ $post->id }}"
                                                data-name="{{ $post->judul }}">
                                                <span class="badge bg-danger"><i class='bx bxs-trash'></i> Delete</span>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Slug</th>
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
            var postId = $(this).attr('data-id');
            var postName = $(this).attr('data-name');
            swal({
                    title: "Apakah kamu yakin ?",
                    text: "Kamu akan menghapus postingan " + postName + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/posts/delete/" + postId + "";
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
                // buttons: ['copy', 'excel', 'pdf', 'print']
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
