@extends('layouts.app')
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="breadcrumb-title pe-3">Forum PAUD</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Semua Postingan</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            {{-- <h6 class="mb-0 text-uppercase">Image caps Card</h6> --}}
            <hr />
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="mb-3 card">
                            <img src="https://source.unsplash.com/1080x550?/pendidikan-anak-usia-dini"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-3 mb-5 row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col">
                    <nav aria-label="Page navigation">
                        <ul class="mb-0 pagination">
                            {{ $posts->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- End Pagination -->

            <!--end row-->
        </div>
    </div>
@endsection
