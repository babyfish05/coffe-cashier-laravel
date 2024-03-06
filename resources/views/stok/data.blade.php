<table class="table table-compact table-stripped" id="myJenis">
    <thead>
        <tr>
            <th>No</th>
            <th>jumlah stok</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data['stok'] as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->jumlah_stok}}</td>
           
            
            <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-jumlah_stok ="{{ $p->jumlah_stok}}"
                >
                <i class="fas fa-edit"></i>
                  </button>
               <form action="{{ route('stok.destroy', $p->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-nama={{$p->jumlah_stok}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     
