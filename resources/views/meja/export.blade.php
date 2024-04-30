<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nomor_meja</th>
            <th>kapasitas</th>
            <th>status</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Meja as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nomor_meja}}</td>
            <td>{{ $p->kapasitas}}</td>
            <td>{{ $p->status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
