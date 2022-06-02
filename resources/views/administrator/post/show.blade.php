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
                            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->judul }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            {{-- <h6 class="mb-0 text-uppercase">Image caps Card</h6> --}}
            <hr />
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 col-lg-7">
                    <div class="mb-3 card">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top">
                        @else
                            <img src="https://source.unsplash.com/1080x550?/pendidikan-anak-usia-dini"
                                class="card-img-top" alt="{{ $post->judul }}">
                        @endif
                        <div class="card-body bg-light">
                            <div class="post-detail">
                                <span class="mb-2 badge bg-warning">
                                    <a href="#" class="text-white">{{ $post->category->nama }}</a>
                                </span>

                                <h5 class="card-title">{{ $post->judul }}</h5>
                                <p class="card-text">
                                    <small class="text-muted"><i class="bx bx-user me-1"></i><a
                                            href="#">{{ $post->user->nama_lengkap }}</a></small> |
                                    <small class="text-muted"><i class="fadeIn animated bx bx-time"></i>
                                        {{ $post->created_at->diffforHumans() }}</small>
                                </p>

                                <p class="card-text">{!! $post->konten !!}</p>
                                </p>
                            </div>

                            <hr class="my-4">

                            <div class="comments">
                                <div class="">
                                    <div class="row height d-flex justify-content-center align-items-center">
                                        <div class="">
                                            @if (session()->has('success'))
                                                <div
                                                    class="py-2 border-0 alert alert-success bg-success alert-dismissible fade show">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-white font-35"><i class='bx bxs-check-circle'></i>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 text-white">Selamat!</h6>
                                                            <div class="text-white">{{ session()->get('success') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif
                                            <h5>Tinggalkan komentar <span>({{ $count_comments }})</span></h5>
                                        </div>
                                        <form action="{{ route('posts.comment', $post->id) }}" method="post">
                                            @csrf
                                            <div class="flex-row p-3 d-flex align-items-center form-color">

                                                @if (Str::length(Auth::guard('student')->user()) > 0)
                                                    <img src="https://ui-avatars.com/api/?name={{ Auth::guard('student')->user()->nama_lengkap }}"
                                                        width="50" class="me-2 rounded-circle">
                                                @elseif(Str::length(Auth::guard('user')->user()) > 0)
                                                    <img src="https://ui-avatars.com/api/?name={{ Auth::guard('user')->user()->nama_lengkap }}"
                                                        width="50" class="me-2 rounded-circle">
                                                @endif


                                                <input type="text"
                                                    class="form-control me-1 @error('komentar') is-invalid @enderror"
                                                    name="komentar" id="komentar" placeholder="Tinggalkan komentar..."
                                                    required>

                                                <button type="submit" id="submit" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </form>
                                        @foreach ($comments as $comment)
                                            @if ($comment->post_id == $post->id)
                                                <div class="mt-2">
                                                    <div class="flex-row p-3 m-1 border rounded d-flex">
                                                        @if ($comment->user_id)
                                                            @if ($comment->user->avatar)
                                                                <img src="{{ asset('storage/' . $comment->user->avatar) }}"
                                                                    width="40" height="40" class="me-3 rounded-circle">
                                                            @else
                                                                <img src="https://ui-avatars.com/api/?name={{ $comment->user->nama_lengkap }}"
                                                                    width="40" height="40" class="me-3 rounded-circle">
                                                            @endif
                                                        @elseif($comment->student_id)
                                                            @if ($comment->student->avatar)
                                                                <img src="{{ asset('storage/' . $comment->student->avatar) }}"
                                                                    width="40" height="40" class="me-3 rounded-circle">
                                                            @else
                                                                <img src="https://ui-avatars.com/api/?name={{ $comment->student->nama_lengkap }}"
                                                                    width="40" height="40" class="me-3 rounded-circle">
                                                            @endif
                                                        @endif


                                                        <div class="row align-items-center d-flex justify-content-between">
                                                            <div class="mb-2 align-items-center">
                                                                <h6 class="mb-0 me-2">
                                                                    <p class="mb-0 user-name">
                                                                        @if ($comment->user_id)
                                                                            {{ $comment->user->nama_lengkap }}
                                                                            <span class="badge bg-success">Guru</span>
                                                                        @elseif($comment->student_id)
                                                                            {{ $comment->student->nama_lengkap }}
                                                                        @endif
                                                                    </p>
                                                                </h6>
                                                                <small>{{ $comment->created_at->diffforHumans() }}</small>
                                                            </div>
                                                            <div class="align-items-center">
                                                                <p class="mb-0 text-justify comment-text">
                                                                    {{ $comment->komentar }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
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
