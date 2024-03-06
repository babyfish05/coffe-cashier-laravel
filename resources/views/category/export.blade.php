<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nama category</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_category}}</td>
          </tr>
        @endforeach
    </tbody>
</table>
