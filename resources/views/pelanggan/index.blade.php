@extends('tamplate.layout')

@push('style')

@endpush

@section('content')

<section class="content p-2">

    <!-- Default box -->
    <div class="card  shadow-lg p-3 mb-4 bg-body-tertiary rounded">
      <div class="card-header">
      <h1 style="font-size: 40px;">Data Pelanggan</h1>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormjenis">
        <i class="fas fa-plus"></i> Tambah Pelanggan
      </button>
      <a href="{{route('pelanggan')}}" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Export PDF
      </a>
      <button class="btn btn-primary"data-toggle="modal" data-target="#form-import"><i class="fa-solid fa-file-export"></i>import excel</button>

      <a href="{{ url('export/pelanggan') }}" class="btn-success btn"><span> <i class="fas fa-table"></i>Export
        excel</span></a>
      </div>
       

      @include('pelanggan.data')

    @include('pelanggan.form')
    @include('pelanggan.edit')
  </section>

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
      let nama = $(button).data('nama')
      let email = $(button).data('email')
      let nomor_telepon = $(button).data('nomor_telepon')
      let alamat = $(button).data('alamat')
    
      let foto = $(button).data('foto')
        console.log(id)
        console.log(nama)
        console.log(email)
        console.log(nomor_telepon)
        console.log(alamat)

      $(this).find('#id').val(id)
      $(this).find('#nama').val(nama)
      $(this).find('#email').val(email)
      $(this).find('#nomor_telepon').val(nomor_telepon)
      $(this).find('#alamat').val(alamat)

   
      $('.form-edit').attr('action',`/pelanggan/${id}`)
    })

   })
   

   $(".btn-delete").on("click", function(e) {
    e.preventDefault() 
      let pelanggan = $(e.target).data('nama')
     
      console.log(pelanggan)
      Swal.fire({
       icon: 'error',
       title: 'Hapus Data',
       html: `Apakah data <b>${pelanggan}</b> akan di hapus?`,
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