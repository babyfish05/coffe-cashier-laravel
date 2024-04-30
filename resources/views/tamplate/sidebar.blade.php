<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <img src="{{ asset('admin') }}/argon-dashboard-master/assets/img/brand/blue.png" class="navbar-brand-img"
                alt="...">

        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>

            </li>

        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ asset('admin') }}/index.html">
                            <img src="{{ asset('admin') }}/argon-dashboard-master/assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-2  mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-arch"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            @if (Auth::user()->level == 1)
                <ul class="navbar-nav">
                    {{-- <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('about') }}">
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
        </li>         --}}
                    {{-- <li class="nav-item {{ request()->is('karyawan') ? 'active' : '' }}">
          <a class="nav-link {{ request()->is('karyawan') ? 'active' : '' }}" href="{{ url('karyawan') }}">
              <i class="ni ni-circle-08 text-pink"></i> Karyawan
          </a>
      </li>       --}}
                    <li class="nav-item {{ request()->is('jenis') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('jenis') ? 'active' : '' }}" href="{{ url('jenis') }}">
                            <i class="fa-solid fa-basket-shopping text-orange"></i> Jenis
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('menu') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="{{ url('menu') }}">
                            <i class="fa-solid fa-pizza-slice text-red"></i>Menu
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pelanggan') ? 'active' : '' }}"
                            href="{{ url('pelanggan') }}">
                            <i class="fa-solid fa-user-group text-yellow"></i> Pelanggan
                        </a>
                    </li>


                    <li class="nav-item {{ request()->is('stok') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('stok') }}">
                            <i class="fa-regular fa-clipboard text-pink"></i>Stok
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('grafik') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('grafik') }}">
                            <i class="fa-solid fa-chart-line text-green"></i>Grafik
                        </a>
                    </li>

                    {{-- <li class="nav-item {{ request()->is('produk') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('produk') }}">
        <i class="fa-solid fa-store text-green"></i>Product
      </a>
    </li> --}}

                    {{-- <li class="nav-item {{ request()->is('penjualan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('penjualan') }}">
      <i class="fa-solid fa-chart-line text-blue"></i> Data
    </a>
</li> --}}
                    {{-- <li class="nav-item {{ request()->is('Meja') ? 'active' : '' }}">
  <a class="nav-link" href="{{ url('meja') }}">
    <i class="fa-solid fa-chair text-orange"></i> Meja
  </a>
</li> --}}
                    <li class="nav-item {{ request()->is('registrasi') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('register') }}">
                            <i class="fa-solid fa-user-plus text-purple"></i> User Menejer
                        </a>
                    </li>
                    {{-- <li class="nav-item {{ request()->is('pemesanan') ? 'active' : '' }}">
  <a class="nav-link" href="{{ url('pemesanan') }}">
    <i class="fa-solid fa-cash-register text-blue"></i>Pemesanan
  </a>
</li> --}}
            @endif
            {{-- <li class="nav-item">
            <a class="nav-link" href="{{ url('') }}">
              <i class="ni ni-circle-08 text-pink"></i> data
            </a>
          </li> --}}
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                </li>
                @if (Auth::user()->level == 2)
                    <li class="nav-item {{ request()->is('pemesanan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('pemesanan') }}">
                            <i class="fa-solid fa-cash-register text-blue"></i>Pemesanan
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <i class="ni ni-user-run text-blue"></i> logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>