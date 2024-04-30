@extends('tamplate.layout')

@push('style')

@endpush

@section('content')

<section class="content p-2">

    <!-- Default box -->
    <div class="card  shadow-lg p-3 mb-4 bg-body-tertiary rounded">
      <div class="card-header">
      <h1 style="font-size: 40px;">Data meja</h1>
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
        <i class="fas fa-plus"></i> Tambah Meja
      </button>
      <a href="{{route('Meja')}}" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Export PDF
      </a>
      <button class="btn btn-primary"data-toggle="modal" data-target="#form-import"><i class="fa-solid fa-file-export"></i>import excel</button>

      <a href="{{ url('export/meja') }}" class="btn-success btn"><span> <i class="fas fa-table"></i>Export
        excel</span></a>
      </div>
       

      @include('meja.data')

    @include('meja.form')
    @include('meja.edit')
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
      let nomor_meja = $(button).data('nomor_meja')
      let kapasitas = $(button).data('kapasitas')
      let status = $(button).data('status')
     
    
      let foto = $(button).data('foto')
        console.log(id)
        console.log(nomor_meja)
        console.log(kapasitas)
        console.log(status)
     
      $(this).find('#id').val(id)
      $(this).find('#nomor_meja').val(nomor_meja)
      $(this).find('#kapasitas').val(kapasitas)
      $(this).find('#status').val(status)
      

   
      $('.form-edit').attr('action',`/meja/${id}`)
    })

   })
   

   $(".btn-delete").on("click", function(e) {
    e.preventDefault() 
      let meja = $(e.target).data('nomor_meja')
     
      console.log(meja)
      Swal.fire({
       icon: 'error',
       title: 'Hapus Data',
       html: `Apakah data <b>${meja}</b> akan di hapus?`,
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