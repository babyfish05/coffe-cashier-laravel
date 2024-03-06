<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nama</th>
            <th>email</th>
            <th>nomor telepon</th>
            <th>alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Pelanggan as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama}}</td>
            <td>{{ $p->email}}</td>
            <td>{{ $p->nomor_telepon}}</td>
            <td>{{ $p->alamat}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
