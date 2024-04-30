<table id="data">
    <thead>
        <tr>
            <th>No</th>
            <th>nama menu</th>
            <th>jumlah stok</th>
           

        </tr>
    </thead>
    <tbody>
        @foreach($Stok as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->menu->nama_menu}}</td>
            <td>{{ $p->jumlah_stok}}</td>
        
           
        
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
