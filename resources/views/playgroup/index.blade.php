 @extends("layouts.app")

 @section('style')
     <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
 @endsection

 @section('wrapper')
     <!--start page wrapper -->
     <div class="page-wrapper">
         <div class="page-content">
             <!--breadcrumb-->
             <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                 <div class="breadcrumb-title pe-3">KB Tunas Aksara</div>
                 <div class="ps-3">
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb mb-0 p-0">
                             <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                             </li>
                             <li class="breadcrumb-item active" aria-current="page">Semua Peserta Didik</li>
                         </ol>
                     </nav>
                 </div>
                 <div class="ms-auto">
                     <div class="btn-group">
                         <button type="button" class="btn btn-primary">Settings</button>
                         <button type="button"
                             class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                             data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                         </button>
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                 href="javascript:;">Action</a>
                             <a class="dropdown-item" href="javascript:;">Another action</a>
                             <a class="dropdown-item" href="javascript:;">Something else here</a>
                             <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                 link</a>
                         </div>
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
                                     <th>No. Urut</th>
                                     <th>NIS</th>
                                     <th>Nama Peserta Didik</th>
                                     <th>Jenis Kelamin</th>
                                     <th>Kelas</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>200/paud/16</td>
                                     <td>Annida Ayyasya Kusuma</td>
                                     <td>Perempuan</td>
                                     <td></td>
                                 </tr>
                             </tbody>
                             <tfoot>
                                 <tr>
                                     <th>No. Urut</th>
                                     <th>NIS</th>
                                     <th>Nama Peserta Didik</th>
                                     <th>Jenis Kelamin</th>
                                     <th>Kelas</th>
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
     <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
     <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
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
 @endsection
