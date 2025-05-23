    <nav class="navbar navbar-expand-lg bg-white fixed-top py-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">Warung<span>Soto</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="{{ route('products.search') }}" method="GET" class="input-group mx-auto mt-5 mt-lg-0">
                    <input type="text" name="q" class="form-control" placeholder="Mau cari apa?"
                        aria-label="Mau cari apa?" aria-describedby="button-addon2">
                    <button class="btn btn-outline-warning" type="submit" id="button-addon2">
                        <i class="bx bx-search"></i>
                    </button>
                </form>

                {{-- <input type="text" class="form-control" placeholder="Mau cari apa?" aria-label="Mau cari apa?"
                        aria-describedby="button-addon2">
                    <button class="btn btn-outline-warning" type="button" id="button-addon2"><i
                            class="bx bx-search"></i></button> --}}
                <ul class="navbar-nav ms-auto mt-3 mt-sm-0">
                    {{-- <li class="nav-item me-3">
                        <a class="nav-link active" href="#">
                            <i class="bx bx-heart"></i>
                            <span class="badge text-bg-warning rounded-circle position-absolute">2</span>
                        </a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="#">
                            <i class="bx bx-cart-alt"></i>
                            <span class="badge text-bg-warning rounded-circle position-absolute">3</span>
                        </a>
                    </li> --}}
                    <!-- mobile menu -->
                    {{-- <div class="dropdown mt-3 d-lg-none">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index.html">Home</a></li>
                            <li><a class="dropdown-item" href="products.html">Best Seller</a></li>
                            <li><a class="dropdown-item" href="products.html">New Arrival</a></li>
                            <li><a class="dropdown-item" href="products.html">Blog</a></li>
                        </ul>
                    </div> --}}
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li> --}}
                                <li class="nav-item mt-5 mt-lg-0 text-center">
                                    <a class="nav-link btn-second me-lg-3" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                                </li> --}}
                                <li class="nav-item mt-3 mt-lg-0 text-center">
                                    <a class="nav-link btn-first" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <div class="dropdown">
                                <a id="navbarDropdown"
                                    class="nav-link dropdown-toggle fw-semibold text-dark d-flex align-items-center gap-2"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                                        alt="avatar" class="rounded-circle" width="32" height="32">
                                    <span>{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow rounded-3"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item d-flex align-items-center gap-2 text-danger fw-semibold"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right fs-5"></i> Keluar
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </ul>
                    {{-- <li class="nav-item mt-5 mt-lg-0 text-center">
                <a class="nav-link btn-second me-lg-3" href="#">Login</a>
              </li>
              <li class="nav-item mt-3 mt-lg-0 text-center">
                <a class="nav-link btn-first" href="#">Register</a>
              </li> --}}
                </ul>
            </div>
        </div>
    </nav>
