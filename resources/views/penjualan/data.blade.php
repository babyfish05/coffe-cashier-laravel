<table class="table table-compact table-stripped" id="myJenis">
    <thead>
        <tr>
            <th>No</th>
            <th>nama produk</th>
            <th>nama supplier</th>
            <th>harga jual</th>
            <th>harga beli</th>
            <th>stok</th>
            <th>action</th>
            
            

        </tr>
    </thead>
    <tbody>
        @foreach($data['penjualan'] as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_produk}}</td>
            <td>{{ $p->nama_supplier}}</td>
            <td>{{ $p->harga_jual}}</td>
            <td>{{ $p->harga_beli}}</td>
            <td>{{ $p->stok}}</td>

           
            
            <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-nama_produk ="{{ $p->nama_produk}}"
                data-nama_supplier ="{{ $p->nama_supplier}}"
                data-harga_jual ="{{ $p->harga_jual}}"
                data-harga_beli ="{{ $p->harga_beli}}"
                data-stok ="{{ $p->stok}}"
                >
                <i class="fas fa-edit"></i>
                  </button>
               <form action="{{ route('produk.destroy', $p->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-nama={{$p->nama_produk}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     
