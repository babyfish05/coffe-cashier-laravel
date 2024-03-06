<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nama produk</th>
            <th>nama supplier</th>
            <th>harga jual</th>
            <th>harga beli</th>
            <th>stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produk as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_produk}}</td>
            <td>{{ $p->nama_supplier}}</td>
            <td>{{ $p->harga_jual}}</td>
            <td>{{ $p->harga_beli}}</td>
            <td>{{ $p->stok}}</td>
          </tr>
        @endforeach
    </tbody>
</table>
