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


        <li class="menu-label">KB Tunas Aksara</li>
        <li>
            <a href="{{ route('playgroup.index') }}">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Peserta Didik Aktif</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Peserta Didik Tidak Aktif</div>
            </a>
        </li>
        <li>
            <a href="/raport">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Nilai Raport</div>
            </a>
        </li>

        <li class="menu-label">TK Tunas Aksara</li>
        <li>
            <a href="{{ url('form-elements') }}">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Peserta Didik Aktif</div>
            </a>
        </li>
        <li>
            <a href="{{ url('form-elements') }}">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Peserta Didik Tidak Aktif</div>
            </a>
        </li>
        <li>
            <a href="/raport">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Nilai Raport</div>
            </a>
        </li>

        <li class="menu-label">Tenaga Pendidik</li>
        <li>
            <a href="{{ route('teacher.index') }}">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Data Guru</div>
            </a>
        </li>
        <li class="menu-label">Feedback</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Feedback</div>
            </a>
            <ul>
                <li> <a href="/feedback"><i class="bx bx-right-arrow-alt"></i>KB Tunas
                        Aksara</a>
                </li>
                <li> <a href="{{ url('ecommerce-products-details') }}"><i class="bx bx-right-arrow-alt"></i>TK Tunas
                        Aksara</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
