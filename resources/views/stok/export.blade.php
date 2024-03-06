<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>jumlah stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Stok as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->jumlah_stok}}</td>
          </tr>
        @endforeach
    </tbody>
</table>
