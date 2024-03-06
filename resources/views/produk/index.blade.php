@extends('tamplate.layout')

@push('style')

@endpush

@section('content')

<section class="content p-2">

    <!-- Default box -->
    <div class="card shadow-lg p-3 mb-4 bg-body-tertiary rounded">
      <div class="card-header">
      <h1 style="font-size: 40px;">Data produk Titipan</h1>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormproduk">
        <i class="fas fa-plus"></i> Tambah produk
      </button>
      <a href="{{route('pdf')}}" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Export PDF
      </a>
      <button class="btn btn-primary"data-toggle="modal" data-target="#form-import"><i class=" fa-share-square"></i>import excel</button>

      <a href="{{ url('export/produk') }}" class="btn-success btn"><span> <i class="fas fa-table"></i>Export
        excel</span></a>
      
      </div>
       

      @include('produk.data')
    </div>
      
    @include('produk.form')
    @include('produk.edit')
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
        $('#myJenis').DataTable()
    })

    $(document).ready(function(){
    
    $('#editform').on('show.bs.modal', function(e){
      let button = $(e.relatedTarget)
      let id = $(button).data('id')
      let nama_produk = $(button).data('nama_produk')
      let nama_supplier = $(button).data('nama_supplier')
      let harga_beli = $(button).data('harga_beli')
      let harga_jual = $(button).data('harga_jual')
      let stok = $(button).data('stok')
    
      let foto = $(button).data('foto')
        console.log(id)
        console.log(nama_produk)
        console.log(nama_supplier)
        console.log(harga_beli)
        console.log(harga_jual)
        console.log(stok)
  


      $(this).find('#id').val(id)
      $(this).find('#nama_produk').val(nama_produk)
      $(this).find('#nama_supplier').val(nama_supplier)
      $(this).find('#harga_jual').val(harga_jual)
      $(this).find('#harga_beli').val(harga_beli)
      $(this).find('#stok').val(stok)
   
      $('.form-edit').attr('action',`/produk/${id}`)
    })
        //fungsi penambah harga jual
        document.getElementById("harga_beli").addEventListener("input", function(){
      var hargaBeli = parseFloat(this.value);
      var hargaJual = hargaBeli*1.7; 
          hargaJual = Math.round(hargaJual);
      document.getElementById("harga_jual").value = hargaJual;
    });
   })
   

   $(".btn-delete").on("click", function(e) {
    e.preventDefault() 
      let nama_produk = $(e.target).data('nama')
     
      console.log(nama_produk)
      Swal.fire({
       icon: 'error',
       title: 'Hapus Data',
       html: `Apakah data <b>${nama_produk}</b> akan di hapus?`,
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