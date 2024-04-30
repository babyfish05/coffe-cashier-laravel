<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nama menu</th>
            <th>jumlah stok</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($stok as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->menu->nama_menu}}</td>
            <td>{{ $p->jumlah_stok}}</td>
        
        </tr>
        @endforeach
    </tbody>
</table>
