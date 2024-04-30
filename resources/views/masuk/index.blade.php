@extends('tamplate.layout')

@push('style')

@endpush

@section('content')

<section class="content p-2">

    <!-- Default box -->
    <div class="card shadow-lg p-3 mb-4 bg-body-tertiary rounded">
      <div class="card-header">
      <h1 style="font-size: 40px;">Data masuk</h1>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormmasuk">
        <i class="fas fa-plus"></i> Tambah Pengajuan
      </button>
      <a href="{{route('masuk')}}" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Export PDF
      </a>
      <button class="btn btn-primary"data-toggle="modal" data-target="#form-import"><i class="fa-solid fa-file-export"></i>import excel</button>

      <a href="{{ url('export/masuk') }}" class="btn-success btn"><span> <i class="fas fa-table"></i>Export
        excel</span></a>
       
      </div>

      @include('masuk.data')
    </div>
    @include('masuk.form')
    @include('masuk.edit')
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
      let namaKaryawan = $(button).data('nama_karyawan')
      let tanggalMasuk = $(button).data('tanggal_masuk')
      let waktuMasuk = $(button).data('waktu_masuk')
      let status = $(button).data('status')
      let waktuKeluar = $(button).data('waktu_keluar')

    
      let foto = $(button).data('foto')
        console.log(id)
        console.log(nama_karyawan)
        console.log(tanggal_masuk)
        console.log(waktu_masuk)
        console.log(status)
        console.log(waktu_selesai_kerja)


      $(this).find('#id').val(id)
      $(this).find('#nama_karyawan').val(nama_karyawan)
      $(this).find('#tanggal_masuk').val(tanggal_masuk)
      $(this).find('#status').val(status)
      $(this).find('#waktu_selesai_kerja').val(waktu_selesai_kerja)

   
      $('.form-edit').attr('action',`/masuk/${id}`)
    })
    $(document).ready(function(){
   })
   

   $(".btn-delete").on("click", function(e) {
    e.preventDefault() 
      let masuk = $(e.target).data('nama')
     
      console.log(masuk)
      Swal.fire({
       icon: 'error',
       title: 'Hapus Data',
       html: `Apakah data <b>${masuk}</b> akan di hapus?`,
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