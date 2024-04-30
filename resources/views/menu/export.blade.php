<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nama menu</th>
            <th>harga</th>
            <th>image</th>
            <th>jenis id</th>
            <th>deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menu as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_menu}}</td>
            <td>{{ $p->harga}}</td>
            <td>{{ $p->jenis->nama_jenis}}</td>
            <td>
                <img src="{{ asset('storage/'.$p->image) }}" alt="image" class="" style="width: 60px; height: 60px;">    
            </td>
            <td>{{ $p->deskripsi}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
