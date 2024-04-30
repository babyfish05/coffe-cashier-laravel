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
        @foreach($data['Meja'] as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nomor_meja}}</td>
            <td>{{ $p->kapasitas}}</td>
            <td>{{ $p->status}}</td>
           
            
            <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-nomor_meja ="{{ $p->nomor_meja}}"
                data-kapasitas ="{{ $p->kapasitas}}"
                data-status ="{{ $p->status}}"
                
                >
                <i class="fas fa-edit"></i>
                  </button>
               {{-- <form action="{{ route('nomor_meja.destroy', $p->id) }}" method="post" style="display: inline"> --}}
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-nomor_meja={{$p->nomor_meja}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     
