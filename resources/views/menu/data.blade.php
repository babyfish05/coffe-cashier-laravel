<table class="table table-compact table-stripped table-responsive-xl" id="myJenis">
    <thead>
        <tr>
            <th>No</th>
            <th>nama menu</th>
            <th>harga</th>
            <th>image</th>
            <th>jenis id</th>
            <th>deskripsi</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($menu as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_menu}}</td>
            <td>{{ $p->harga}}</td>
            <td>
                <img src="{{ asset('storage/'.$p->image) }}" alt="image" class="" style="width: 60px; height: 60px;">    
            </td>
            <td>{{ $p->jenis_id}}</td>
            <td>{{ $p->deskripsi}}</td>
            
            <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-nama_menu ="{{ $p->nama_menu}}"
                data-harga ="{{ $p->harga}}"
                data-image ="{{ $p->image}}"
                data-jenis_id="{{ $p->jenis_id}}"
                data-deskripsi ="{{ $p->deskripsi}}"
                >
                <i class="fas fa-edit"></i>
                  </button>
               <form action="{{ route('menu.destroy', $p->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-nama={{$p->nama_menu}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     
