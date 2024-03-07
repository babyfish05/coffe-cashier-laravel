@extends('tamplate.layout')

@push('style')

@endpush

@section('content')

<section class="content">

    <!-- Default box -->
    <div class="card shadow-lg p-3 mb-4 bg-body-tertiary rounded" style="overflow-x: hidden;">
      <div class="card-header">
      <h1 style="font-size: 40px;">Data karyawan</h1>
         
        </div>
     
      <div class="card-body">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success')}}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
              </div>
      
      @endif

      @if($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }} </li>
                     @endforeach
                    </ul>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
              </div>    
      @endif
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormKaryawan">
        <i class="fas fa-plus"></i> Tambah Pengajuan
      </button>
      <a href="{{route('Karyawan.store')}}" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Export PDF
      </a>
      <button class="btn btn-primary"data-toggle="modal" data-target="#form-import"><i class="fa-solid fa-file-export"></i>import excel</button>

      <a href="{{ url('export/karyawan') }}" class="btn-success btn"><span> <i class="fas fa-table"></i>Export
        excel</span></a>
      </div>
       

      @include('karyawan.data')
    </div>
    @include('Karyawan.form')
    @include('Karyawan.edit')
  </section>

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
@endsection

@push('script')
<script>

    $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
       $('.alert-success').slideUp(500)
    })

   $('.alert-danger').fadeTo(2000, 500).slideUp(500, function(){
       $('.alert-danger').slideUp(500)
   })


    $(function(){
        $('#myTable').DataTable()
    })

    $(document).ready(function(){
    
    $('#editform').on('show.bs.modal', function(e){
      let button = $(e.relatedTarget)
      let id = $(button).data('id')
      let nip = $(button).data('nip')
      let nik = $(button).data('nik')
      let nama = $(button).data('nama')
      let jenis_kelamin = $(button).data('jenis_kelamin')
      let tempat_lahir = $(button).data('tempat_lahir')
      let tanggal_lahir = $(button).data('tanggal_lahir')
      let telepon = $(button).data('telepon')
      let agama = $(button).data('agama')
      let status_nikah = $(button).data('status_nikah')
      let alamat = $(button).data('alamat')
      let foto = $(button).data('foto')
        console.log(id)
        console.log(nip)
        console.log(nik)
        console.log(nama)
        console.log(jenis_kelamin)
        console.log(tempat_lahir)
        console.log(tanggal_lahir)
        console.log(telepon)
        console.log(agama)
        console.log(status_nikah)
        console.log(alamat)
        console.log(foto)

      $(this).find('#id').val(id)
      $(this).find('#nip').val(nip)
      $(this).find('#nik').val(nik)
      $(this).find('#nama').val(nama)
      $(this).find('#jenis_kelamin').val(jenis_kelamin)
      $(this).find('#tempat_lahir').val(tempat_lahir)
      $(this).find('#tanggal_lahir').val(tanggal_lahir)
      $(this).find('#telepon').val(telepon)
      $(this).find('#agama').val(agama)
      $(this).find('#status_nikah').val(status_nikah)
      $(this).find('#alamat').val(alamat)
      $(this).find('#foto').val(foto)
   
   
      $('.form-edit').attr('action',`/karyawan/${id}`)
    })

   })
   

   $(".btn-delete").on("click", function(e) {
    e.preventDefault() 
      let karyawan = $(e.target).data('nama')
     
      console.log(karyawan)
      Swal.fire({
       icon: 'error',
       title: 'Hapus Data',
       html: `Apakah data <b>${karyawan}</b> akan di hapus?`,
       confirmButtonText: 'ya',
       denyButtonText: 'tidak',
       showDenyButton: true,
       focusConfirm: false
    }).then(function(result) {
      if (result.isConfirmed) $(e.target).closest('form').submit()
      else Swal.close()
    })

    })
   </script>
@endpush