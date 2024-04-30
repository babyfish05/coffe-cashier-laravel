@extends('tamplate.layout')

@push('style')
@endpush
@section('content')
<section class="content p-2">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h1 style="font-size: 40px;">User Menejer</h1>
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

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
                    <i class="fas fa-plus"></i> Tambah akun
                  </button>

                    {{-- @include('auth.edit') --}}

            </div>
            @include('auth.data')
            <!-- /.card-body -->
            @include('auth.form')
            </table>

            </div>
            <!-- /.card-body -->
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
        </main><!-- End #main -->
    </section>
@endsection

@push('script')
    <script>
      $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
      $('.alert-success').slideUp(500)
    })

   $('.alert-danger').fadeTo(2000, 500).slideUp(500, function(){
       $('.alert-danger').slideUp(500)

       $('.form-edit').attr('action',`/register/${id}`)
   })


    $(function(){
        $('#myTable').DataTable()
    })

   $(".btn-delete").on("click", function(e) {
    e.preventDefault() 
      let register = $(e.target).data('nama')
     
      console.log(register)
      Swal.fire({
       icon: 'error',
       title: 'Hapus Data',
       html: `Apakah data <b></b> akan di hapus?`,
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