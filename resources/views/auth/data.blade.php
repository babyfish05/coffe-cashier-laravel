<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Level</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($user as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->name}}</td>
            <td>{{ $p->email}}</td>
            <td>{{ $p->password}}</td>
            <td>{{ $p->level}}</td>
           
            
            <td>
                {{-- <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-name ="{{ $p->name}}"
                data-email ="{{ $p->email}}"
                data-password ="{{ $p->password}}"
                data-level ="{{ $p->level}}"
                >
                <i class="fas fa-edit"></i> --}}
                  </button>
               <form action="{{ route('register.destroy', $p->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-name={{$p->name}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     
