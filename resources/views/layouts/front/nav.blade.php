<nav class="bg-white rounded shadow-sm navbar navbar-expand-lg navbar-light sticky-top rounded-0">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span
                class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        PPDB {{ date('Y') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://paudtunasaksara.com/kelompok-bermain-kb/"
                                target="_blank">Detail Program</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('registration.panduan') }}">Panduan PPDB</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('registration.index') }}">Daftar
                                PPDB
                                {{ date('Y') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> <a class="nav-link" href="https://paudtunasaksara.com/" target="_blank"><i
                            class='bx bx-user me-1'></i>Tentang Kami</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="https://paudtunasaksara.com/kontak/" target="_blank"><i
                            class='bx bx-category-alt me-1'></i>Kontak</a>
                </li>
                <li class="nav-item"> <a class="text-white nav-link btn btn-primary" href="{{ route('dashboard') }}">
                        <i class='fadeIn animated bx bx-log-in me-1'></i>SIM
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
