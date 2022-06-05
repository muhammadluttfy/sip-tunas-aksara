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
        {{-- @if (auth()->user()->role == 'Kepala Sekolah') --}}
        <li>
            <a href="{{ url('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        {{-- @endif --}}

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
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Main Data</div>
            </a>
            <ul>
                <li> <a href="{{ route('playgroup.index') }}"><i class="bx bx-right-arrow-alt"></i>Peserta Didik</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Raport</a>
                </li>
            </ul>
        </li>


        <li class="menu-label">Manajemen Surat</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Main Data</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Surat Masuk</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Surat Keluar</a>
                </li>
                <li> <a href="{{ route('letters.index') }}"><i class="bx bx-right-arrow-alt"></i>Kategori Surat</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
