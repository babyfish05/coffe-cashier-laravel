@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
    <section class="content">
        <main id="main" class="main m-2 row">
                <!-- Default box -->
                <div class="col p-3 bg-white rounded" style="overflow: hidden; height: max-content;">
                    <h1>Order</h1>

                    <div class="row mb-3">
                        <label for="nama_pemesan" class="col-sm-3 col-form-label">Nama pelanggan</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="nama_pemesan" name='nama_pemesan'>
                        </div>
                    </div>
                    <div class="menu-container px-1" style="overflow: hidden">
                        @foreach ($jenis as $j)
                            <h3>{{ $j->nama_jenis }}</h3>
                            <div class="row px-3 justify-content-between">
                                @foreach ($j->menu as $menu)
                                    {{-- <li data-harga="{{ $menu->harga }}" data-id="{{ $menu->id }}">
                                        {{ $menu->nama_menu }}
                                    </li> --}}
                                    <div class="col-md-3 rounded mx-1 my-2 menu-item" data-id="{{ $menu->id }}" data-nama="{{ $menu->nama_menu }}" data-harga="{{ $menu->harga }}" style="background-color: #e4fdf9">
                                        <div class="d-flex flex-column align-items-center justify-content-between" style="height: 100%;">
                                            <img src="{{ asset('storage/'.$menu->image) }}" class="ms-auto mt-2 img-fluid" alt="" style="width: 80px;">
                                            <h4 class="text-center mt-3 menu">{{ $menu->nama_menu }}</h4>
                                            <p class="text-center">Rp. <span>{{ $menu->harga }}</span></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="item-content col-md-4 border border-info-subtle rounded shadow-sm p-3 mb-5 bg-body-tertiary rounded" style="background-color: white; height: max-content">
                    <h1>Pesanan</h1>
                    <div class="ordered-list">
                        
                    </div>
                    Total Bayar : <h2 id="total">0</h2>
                    <button class="btn btn-primary col mb-3" id="btn-bayar">bayar</button>
                </div>
            </div>
            
            <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </main><!-- End #main -->
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
    // alert("Hello World");
    $(function() {
        const orderedList = []
        let total = 0

        const sum = () => {
            return orderedList.reduce((accumulator, object) => {
                return accumulator + (object.harga * object.qty);
            }, 0)
        };

        const changeQty = (el, inc) => {
            const id = $(el).closest('.li')[0].dataset.id;
            const index = orderedList.findIndex(list => list.menu_id == id)
            orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

            const txt_subtotal = $(el).closest('.li').find('.subtotal')[0];
            const txt_qty = $(el).closest('.li').find('.qty-item')[0]
            txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
            txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

            $('#total').html(sum())
        }

        //events
        $('.ordered-list').on('click', '.btn-dec', function() {
            changeQty(this, -1)
        })

        $('.ordered-list').on('click', '.btn-inc', function() {
            changeQty(this, 1)
        })

        $('.ordered-list').on('click', '.remove-item', function() {
            const item = $(this).closest('.li')[0];
            let index = orderedList.findIndex(list => list.menu_id == parseInt(item.dataset.id))
            orderedList.splice(index, 1)
            $(item).remove();
            $('#total').html(sum())
        })

        $('#btn-bayar').on('click', function() {
            $.ajax({
                url: "{{ route('transaksi.store') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    orderedList: orderedList,
                    total: sum()
                },
                success: function(data) {
                    console.log(data)
                    Swal.fire({
                        title: data.message,
                        showDenyButton: true,
                        confirmButtonText: "Cetak Nota",
                        denyButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.open("{{ url('nota') }}/"+ data.notrans)
                            location.reload()
                        } else if (result.isDenied) {
                            location.reload()
                        }
                    });
                },
                error: function(error) {
                    console.log(status, error)
                    Swal.fire('Pemesanan Gagal')
                }
            })
        })

        $(".menu-item").click(function(e) {
            // const menu_clicked = $(this).text();
            const nama = $(this).data('nama');
            const data = $(this)[0].dataset;
            // const harga = parseFloat($(this).data('harga'));
            const harga = parseFloat(data.harga);
            const id = parseInt(data.id);

            if (orderedList.every(list => list.menu_id !== id)) {
                let dataN = {
                    'menu_id': id,
                    'menu': nama,
                    'harga': harga,
                    'qty': 1
                }
                orderedList.push(dataN);

                let listOrder = `<div class="card p-2 my-2 li" data-id="${id}" style="border-left: 8px solid #7070f8;">
                                    <div class="d-flex justify-content-between">
                                        <h3>${nama}</h3>
                                        <input class="qty-item" type="number" value="1" style="width:40px;height: 25px;border: none; outline: none;" readonly/>
                                        <div class="d-flex">
                                            <button class="btn btn-danger ms-auto p-0 remove-item" style="width: 25px"><i class="fa fa-trash"></i></button>
                                            <button class="btn btn-primary ms-auto p-0 btn-dec" style="width: 25px"><i class="fa fa-minus"></i></button>
                                            <button class="btn btn-primary ms-auto p-0 btn-inc" style="width: 25px"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>`;

                $('.ordered-list').append(listOrder)
            }
            $('#total').html(sum())
        });
    });
</script>
    
@endpush
<style>

.menu-item h4.menu::after{
    content: '';
    position: absolute;
    /* background: #000; */
    cursor: pointer;
    top: 0; right: 0; bottom: 0; left: 0;
}

/* .card1{
    background-color: white;
    border-radius: 5px;
    margin-right: 12px;
    padding: 12px;
} */
    
     /* .menu-container {
        list-style-type: none;
        color: rgb(71, 71, 71);
        
    } 

    .menu-container li {
        margin-bottom: 20px;
       
    }

    .menu-container li h3 {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 18px;
        background-color: #C19A6B;
        padding: 5px 15px;
        color: white;
        text-align: center;
        margin: 10px;
    }

    .menu-item {
        list-style-type: none;
        display: flex;
        gap: 1em;
        margin: 5px 10px;
        font-family: monospace;
    }

    .menu-item li {
            background-color: #ffffff;
            padding: 10px 20px;
            border-color: ;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           

    } */
 
    
</style>