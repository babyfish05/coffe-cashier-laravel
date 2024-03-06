<table class="table table-compact table-stripped" id="myJenis">
    <thead>
        <tr>
            <th>No</th>
            <th>nama</th>
            <th>email</th>
            <th>nomor telepon</th>
            <th>alamat</th>
            <th>action</th>
            

        </tr>
    </thead>
    <tbody>
        @foreach($data['Pelanggan'] as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama}}</td>
            <td>{{ $p->email}}</td>
            <td>{{ $p->nomor_telepon}}</td>
            <td>{{ $p->alamat}}</td>
           
            
            <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-nama ="{{ $p->nama}}"
                data-email ="{{ $p->email}}"
                data-nomor_telepon ="{{ $p->nomor_telepon}}"
                data-alamat ="{{ $p->alamat}}"
                >
                <i class="fas fa-edit"></i>
                  </button>
               <form action="{{ route('pelanggan.destroy', $p->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-nama={{$p->nama}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     
