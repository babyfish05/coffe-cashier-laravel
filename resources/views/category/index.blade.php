@extends('tamplate.layout')

@push('style')

@endpush

@section('content')

<section class="content p-2">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
      <h1>category</h1>
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
                             <span aria-hidden="true">&times;</span>x
                         </button>
              </div>    
      @endif
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormCategory">
        <i class="fas fa-plus"></i> Tambah category
      </button>
      <a href="{{route('category.store')}}" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Export PDF
      </a>
      <button class="btn btn-primary"data-toggle="modal" data-target="#form-import"><i class="fa-solid file-export"></i>import excel</button>

      <a href="{{ url('import-category') }}" class="btn-success btn"><span> <i class="fas fa-table"></i>Export
        excel</span></a>
      
      </div>

      @include('category.data')
    </div>
    @include('category.form')
    @include('category.edit')
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
      let nama_category = $(button).data('nama_category')
    
      let foto = $(button).data('foto')
        console.log(id)
        console.log(nama_category)


      $(this).find('#id').val(id)
      $(this).find('#nama_category').val(nama_category)

   
      $('.form-edit').attr('action',`/category/${id}`)
    })

   })
   

   $(".btn-delete").on("click", function(e) {
    e.preventDefault() 
      let category = $(e.target).data('nama')
     
      console.log(category)
      Swal.fire({
       icon: 'error',
       title: 'Hapus Data',
       html: `Apakah data <b>${category}</b> akan di hapus?`,
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