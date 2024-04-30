<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nama jenis</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($jenis as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_jenis}}</td>
         
            
          </tr>
        @endforeach
    </tbody>
</table>
