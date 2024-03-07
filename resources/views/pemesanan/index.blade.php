@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
    <section class="content">
        <main id="main" class="main mt-5">

            <div class="container" style="display: flex; ">
                <!-- Default box -->
                <div class="card1 shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 800px;">
                    <div class="pagetitle">
                        <h1>Order</h1>

                    </div>

                    <label for="nama_pemesan" class="col-sm-4 col-form-label">Nama pelanggan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_pemesan" name='nama_pemesan'>
                    </div>
                    <div class="item-sidebar">
                        <div class="menu-container">
                            @foreach ($jenis as $j)
                                <li>
                                    <h3>{{ $j->nama_jenis }}</h3>
                                    <div class="menu">
                                        @foreach ($j->menu as $menu)
                                            {{-- <li data-harga="{{ $menu->harga }}" data-id="{{ $menu->id }}">
                                                {{ $menu->nama_menu }}
                                            </li> --}}
                                            <div class="col rounded mx-1 my-2 menu-item" data-id="{{ $menu->id }}" data-nama="{{ $menu->nama }}" data-harga="{{ $menu->harga }}" style="background-color: #e4fdf9">
                                                <div class="d-flex flex-column align-items-center justify-content-between" style="height: 100%;">
                                                  <img src="{{ asset('storage/' . $menu->image) }}" class="ms-auto mt-2" alt="" style="width: 80px;">
                                                  <h5 class="text-center mt-3 menu">{{ $menu->nama_menu }}</h5>
                                                  <p class="text-center">Rp. {{ $menu->harga }}</p>
                                                 </div>
                                                {{-- <div class="menu" data-id="{{ $menu->id }}" data-harga="{{ $menu->harga }}">
                                                </div> --}}
                                              </div>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="item-content col-md-5 border border-info-subtle rounded shadow-sm p-3 mb-5 bg-body-tertiary rounded" style="background-color: white">
                    <h1>Pesanan</h1>
                    <ul class="ordered-list">
                    </ul>
                    Total Bayar : <h2 id="total">0</h2>
                    <button id="btn-bayar">bayar</button>
                </div>
            </div>
            
            
            <!-- /.card-footer-->
           
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
            const id = $(el).closest('li')[0].dataset.id;
            const index = orderedList.findIndex(list => list.menu_id == id)
            orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

            const txt_subtotal = $(el).closest('li').find('.subtotal')[0];
            const txt_qty = $(el).closest('li').find('.qty-item')[0]
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
            const item = $(this).closest('li')[0];
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
            const menu_clicked = $(this).text();
            const data = $(e.target);
            const harga = parseFloat($(data).data('harga'));
            const id = parseInt($(data).data('id'));

            if (orderedList.every(list => list.menu_id !== id)) {
                let dataN = {
                    'menu_id': id,
                    'menu': menu_clicked,
                    'harga': harga,
                    'qty': 1
                }
                orderedList.push(dataN);

                let listOrder = `<li data-id="${id}"><h3>${menu_clicked}</h3>`;
                listOrder += `Sub Total : Rp. ${harga}`;
                listOrder += `<button class='remove-item'>Hapus</button>
                              <button class="btn-dec">-</button>`;
                listOrder += `<input class="qty-item"
                                     type="number"
                                     value="1"
                                     style="width:40px"
                                     readonly
                                     />
                            <button class="btn-inc">+</button><h2>
                            <span class="subtotal">${harga * 1}</span>
                            </li>`;

                $('.ordered-list').append(listOrder)
            }
            $('#total').html(sum())
        });
    });
</script>
    
@endpush
<style>

/* .card1{
    background-color: white;
    border-radius: 5px;
    margin-right: 12px;
    padding: 12px;
} */
    
     .menu-container {
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
           

    }
 
    
</style>