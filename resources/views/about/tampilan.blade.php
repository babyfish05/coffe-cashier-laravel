@extends('tamplate.layout')
@push('style')
    
@endpush
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image" style="padding-top: 50px;">
              <a href="#">
                <img src="{{ asset('admin') }}/argon-dashboard-master/assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
          </div>
        </div>
        <div class="card-body pt-0 pt-md-4">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                <div>
                  <span class="heading">22</span>
                  <span class="description">Friends</span>
                </div>
                <div>
                  <span class="heading">10</span>
                  <span class="description">Photos</span>
                </div>
                <div>
                  <span class="heading">89</span>
                  <span class="description">Comments</span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center"x>
            <h3>
              Naurah Rafifatunnisa<span class="font-weight-light"></span>
            </h3>
            <div class="h5 font-weight-300">
              <i class="ni location_pin mr-2 pb-3"></i>Cianjur, Pamoyanan
            </div>
            <div class="h5 mt-2">
              <i class="ni business_briefcase-24 mr-2 "></i> Rekayasa Perangkat Lunak
            </div>
            <div>
              <i class="ni education_hat mr-2"></i>SMK NEGERI 1 CIANJUR 
            </div>
            <hr class="my-2" />
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore, quos assumenda</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h2 class="mb-0 ml-3">About Pages</h2>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form>
            <h6 class="heading-small text-muted mb-4 ml-3">All sytems are running smoothly! have 3 unread alerts!</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="card" style="width: 45rem;">
                  <div class="card-body">
                    <h3 class="card-title">Tentang Aplikasi</h3>
                    <h5 class="card-text">Penuhi Kebutuhan Anda dengan Layanan Aplikasi Kami, merupakan komitmen kami untuk menyediakan solusi terbaik yang dapat memenuhi kebutuhan dan keinginan Anda melalui berbagai layanan yang kami sediakan dalam aplikasi kami, sehingga Anda dapat merasa terbantu dan terlayani dengan maksimal.</h5>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top: 12px;">
                <div class="card" style="width: 45rem;">
                  <div class="card-body">
                    <h3 class="card-title">Fitur utama</h3>
                    <h5 class="card-text">1. Penjualan dan pemesanan</h5>
                    <h5 class="card-text">2.Manajemen Produk</h5>
                    <h5 class="card-text">3.Manajemen Meja</h5>
                    <h5 class="card-text">4. Laporan analitik</h5>
                  </div>
                </div>
              </div>
              
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
    <!-- /.card -->
    <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
          © 2024 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Naurah Rafifatunnisa</a>
        </div>
      </div>
      <div class="col-xl-6">
        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
          <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Naurah Rafifatunnisa</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  </section>
@endsection
@push('script')
    <script>
        </script>
@endpush