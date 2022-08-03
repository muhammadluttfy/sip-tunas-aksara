<nav class="bg-white rounded shadow-sm navbar navbar-expand-lg navbar-light sticky-top rounded-0">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span
                class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                <li class="nav-item"> <a class="nav-link" aria-current="page" href="{{ route('login') }}"><i
                            class='bx bx-home-alt me-1'></i>Login SIM</a>
                </li>
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        PPDB {{ date('Y') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Panduan PPDB</a>
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
                <li class="nav-item"> <a class="nav-link" href="#"><i
                            class='bx bx-category-alt me-1'></i>Kalender</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="https://paudtunasaksara.com/kontak/" target="_blank"><i
                            class='bx bx-donate-blood me-1'></i>Kontak</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
