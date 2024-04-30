<table id="data">
    <thead>
        <tr>
            <th>No</th>
            <th>nama jenis</th>
           

        </tr>
    </thead>
    <tbody>
        @foreach($Jenis as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_jenis}}</td>
        
@endforeach
</tbody>
</table>

<style>
#data {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#data td,
#data th {
    border: 1px solid #ddd;
    padding: 8px;
}

#data tr:nth-child(even) {
    background-color: #f2f2f2;
}

#data tr:hover {
    background-color: #ddd;
}

#data th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #3153d1;
    color: white;
}
</style>
