<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.svg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">SIM PAUD</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->

    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @if (Auth::user()->role == 'Administrator')
            <li class="menu-label">PPDB PAUD</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Main Data</div>
                </a>
                <ul>
                    <li> <a href="{{ route('ppdb.index') }}"><i class="bx bx-right-arrow-alt"></i>Peserta Daftar</a>
                    </li>
                    <li> <a href="{{ route('ppdb.rejected') }}"><i class="bx bx-right-arrow-alt"></i>Peserta Ditolak</a>
                    </li>
                    <li> <a href="{{ route('ppdb.program') }}"><i class="bx bx-right-arrow-alt"></i>Program</a></li>
                </ul>
            </li>

            <li class="menu-label">Tenaga Pendidik</li>
            <li>
                <a href="{{ route('teacher.index') }}">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Data Guru</div>
                </a>
            </li>

            <li class="menu-label">Forum PAUD</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Postingan</div>
                </a>
                <ul>
                    <li> <a href="{{ route('posts.index') }}"><i class="bx bx-right-arrow-alt"></i>Postingan</a>
                    </li>
                    <li> <a href="{{ route('categories.index') }}"><i class="bx bx-right-arrow-alt"></i>Kategori</a>
                    </li>
                </ul>
            </li>


            <li class="menu-label">KB Tunas Aksara</li>
            <li>
                <a href="{{ route('playgroup.index') }}">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Peserta Didik</div>
                </a>
            </li>

            <li class="menu-label">TK Tunas Aksara</li>
            <li>
                <a href="{{ route('kindergarten.index') }}">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Peserta Didik</div>
                </a>
            </li>


            <li class="menu-label">Manajemen Surat</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Main Data</div>
                </a>
                <ul>
                    <li> <a href="{{ route('incoming.letter.index') }}"><i class="bx bx-right-arrow-alt"></i>Surat
                            Masuk</a>
                    </li>
                    <li> <a href="{{ route('out.letter.index') }}"><i class="bx bx-right-arrow-alt"></i>Surat
                            Keluar</a>
                    </li>
                    <li> <a href="{{ route('letter.category.index') }}"><i class="bx bx-right-arrow-alt"></i>Kategori
                            Surat</a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::guard('student')->check() && Auth::user()->registration_status->status == 'Diterima')
            @if (Auth::user()->role == 'Student')
                <li class="menu-label">Akademik</li>
                <li>
                    <a href="{{ route('student.nilai-raport.index') }}">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Nilai Raport</div>
                    </a>
                </li>

                <li class="menu-label">Forum PAUD</li>
                <li>
                    <a href="{{ route('student.forum.index') }}">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Lihat Informasi</div>
                    </a>
                </li>
            @endif
        @endif


    </ul>

    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
