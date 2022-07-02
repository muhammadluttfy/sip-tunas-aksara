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
                              <li class="breadcrumb-item active" aria-current="page">Semua Informasi</li>
                          </ol>
                      </nav>
                  </div>
              </div>
              <!--end breadcrumb-->

              {{-- <h6 class="mb-0 text-uppercase">Card Group</h6> --}}
              <hr />
              <div class="row">
                  @foreach ($posts as $post)
                      <div class="col-md-4">
                          <div class="shadow-none card ">
                              @if ($post->image)
                                  <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top">
                              @else
                                  <img src="https://source.unsplash.com/1080x550?/{{ $post->judul }}" class="card-img-top"
                                      alt="{{ $post->judul }}">
                              @endif
                              <div class="card-body">
                                  <h5 class="card-title">
                                      <a href="{{ route('student.forum.show', $post->slug) }}">{{ $post->judul }}</a>
                                  </h5>
                                  <p class="card-text">{{ $post->kutipan }}</p>
                              </div>
                              <div class="bg-white card-footer">
                                  <small class="text-muted"><i class="bx bx-user me-1"></i><a
                                          href="{{ route('profile', $post->user->username) }}"
                                          target="_blank">{{ $post->user->nama_lengkap }}</a></small>
                                  |
                                  <small class="text-muted"><i class="fadeIn animated bx bx-time"></i>
                                      {{ $post->created_at->diffforHumans() }}</small>
                              </div>
                          </div>
                      </div>
                  @endforeach
                  <div class="mt-4 mb-5 d-flex float-end">
                      {{ $posts->links() }}
                  </div>
              </div>

          </div>
      </div>
  @endsection
