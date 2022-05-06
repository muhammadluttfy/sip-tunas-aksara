<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
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
            <a href="{{ url('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Main Master</li>
        <li>
            <a href="#">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Data Peserta Didik</div>
            </a>
        </li>
        <li>
            <a href="/raport">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Nilai Raport</div>
            </a>
        </li>


        <li class="menu-label">KB Tunas Aksara</li>
        <li>
            <a href="{{ route('playgroup.index') }}">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Data Peserta Didik</div>
            </a>
        </li>
        <li>
            <a href="/raport">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Nilai Raport</div>
            </a>
        </li>

        <li class="menu-label">TK Tunas Aksara</li>
        <li>
            <a href="{{ url('form-elements') }}">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Data Peserta Didik</div>
            </a>
        </li>
        <li>
            <a href="/raport">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Nilai Raport</div>
            </a>
        </li>

        <li class="menu-label">Tenaga Pendidik</li>
        <li>
            <a href="{{ url('form-wizard') }}">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Data Guru</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
