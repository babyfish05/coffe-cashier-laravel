@extends('tamplate.layout')
@push('style')
@endpush
@section('content')
    <div class="filter">
        <div style="display: flex; align-items: center;">
            <form action="{{ url('/') }}" method="GET" style="display: flex; align-items: center;">
                <label for="tanggal_awal" style="margin-right: 5px; ">Dari Tanggal:</label>
                <input type="date" class="form-control" id="tanggal_awal" value="{{ $tanggal_awal ?? '' }}"
                    name="tanggal_awal" style="width: 150px; margin-right: 10px;">

                <label for="tanggal_akhir" style="margin-right: 5px;">Sampai Tanggal:</label>
                <input type="date" class="form-control" id="tanggal_akhir" value="{{ $tanggal_akhir ?? '' }}"
                    name="tanggal_akhir" style="width: 150px; margin-right: 10px;">

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">

                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <h5 class="card-title text-uppercase text-muted mb-0">Total Menu</h5>
                                <div class="count h2 font-weight-bold mb-0">{{ $data['count_menu'] }}</div>
                                {{-- <span class="h2 font-weight-bold mb-0">350,897</span> --}}
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fa-solid fa-pizza-slice"></i>
                                    {{-- <i class="ni ni-active-40"></i> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p> --}}
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Pendapatan</h5>
                                <span class="h2 font-weight-bold mb-0"> {{ $data['totalPendapatan'] }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                            </div>
                        </div>
                        {{-- <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Transaksi</h5>
                                <span class="h2 font-weight-bold mb-0"> {{ $data['jumlahTransaksi'] }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                    <i class="fa-solid fa-cash-register"></i>
                                </div>
                            </div>
                        </div>
                        {{-- <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">

            </div>


            <div class="col-xl-8 mb-5 mb-xl-0 mt-5">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="text-white mb-0">Grafik Pendapatan</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales"
                                        data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                        data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales"
                                        data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                                        data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mt-5 mb-5">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="h3 mb-0">Top 5 Penjualan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            @foreach ($data['menuSales'] as $menu)
                                <div class="activity-item d-flex mt-2">
                                    <div class="activity-photo">
                                        <img src="{{ $menu->menu?->image ? asset('storage/' . $menu->menu->image) : '' }}"
                                            alt="{{ $menu->menu?->nama_menu ?? '-' }}" class="img-thumbnail"
                                            width="50">
                                    </div>
                                    <div class="activity-content ms-2">
                                        <!-- Nama menu di atas -->
                                        <div class="fw-bold ml-2">{{ $menu->menu?->nama_menu ?? '-' }}</div>
                                        <!-- Terjual di bawah -->
                                        <div class="text-muted ml-2">Terjual: {{ $menu->total_sales }}</div>
                                    </div>
                                </div>
                            @endforeach
                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-4 mt-5 mb-5">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="h3 mb-0">Top 5 Penjualan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            @foreach ($data['menu'] as $p)
                                <div class="activity-item d-flex mt-2">
                                    <div class="activity-photo">
                                        <img src="{{ asset('storage/' . $p->image) }}" class="img-thumbnail"
                                            width="50">
                                    </div>
                                    <div class="activity-content ms-2">
                                        <!-- Nama menu di atas -->
                                        <div class="fw-bold ml-2">{{ $p->nama_menu }}</div>
                                        <!-- Terjual di bawah -->
                                        <div class="text-muted ml-2">Terjual: {{ $p->total_sales }}</div>
                                    </div>
                                </div>
                            @endforeach
                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- @foreach ($pelanggan as $p)
        <div class="media-body">
            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow mt-4">
                <i class="fa-solid fa-user" style="font-size: 20px;"></i>
            </div>
            <a class="title">Nama: {{ $p->nama }}</a>
            <p><strong>Email: {{ $p->email }}</strong></p>
            <p><small>Alamat: {{ $p->alamat }}</small></p>
        </div>
    @endforeach --}}
            <div class="col-lg-5">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <h4 class="mb-0">Transaksi Terbaru</h4>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="column mt-">
                                        <div class="activity-item">
                                            <div class="activity-photo">
                                                @foreach ($data['detailTransaksi'] as $p)
                                                    <div class="activity-item d-flex mt-2">
                                                        <div class="activity-photo">
                                                            <img src="{{ asset('storage/' . $p->menu->image) }}"
                                                                class="img-thumbnail" width="50">
                                                        </div>
                                                        <div class="activity-content ms-2">
                                                            <!-- Nama menu di atas -->
                                                            <div class="fw-bold ml-2">{{ $p->menu->nama_menu }}</div>
                                                            <!-- Terjual di bawah -->
                                                            <div class="text-muted ml-2">Harga: {{ $p->menu->harga }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <h4 class="mb-0">stok terendah</h4>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="column mt-">
                                        <div class="activity-item">
                                            <div class="activity-photo">
                                                @foreach ($data['stok'] as $p)
                                                    <div class="activity-item d-flex mt-2">
                                                        <div class="activity-photo">
                                                            <img src="{{ $p->menu->image ? asset('storage/' . $p->menu->image) : '' }}"
                                                                class="img-thumbnail" width="50">
                                                        </div>
                                                        <div class="activity-content ms-2">
                                                            <!-- Nama menu di atas -->
                                                            <div class="fw-bold ml-2">{{ $p->menu->nama_menu }}</div>
                                                            <!-- Terjual di bawah -->
                                                            <div class="text-muted ml-2">Stok: {{ $p->jumlah_stok }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
       
        @endsection
        @push('script')
            <script></script>
        @endpush
