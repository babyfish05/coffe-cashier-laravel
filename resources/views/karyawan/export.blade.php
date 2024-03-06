<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama pengajuan</th>
            <th>Nama Barang</th>
            <th>Tanggal Pengajuan</th>
            <th>Qty</th>
            <th>Terpenuhi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengajuan as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->namapengajuan}}</td>
            <td>{{ $p->namabarang}}</td>
            <td>{{ $p->tanggalpengajuan}}</td>
            <td>{{ $p->qty}}</td>
            <td>{{ $p->terpenuhi}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
