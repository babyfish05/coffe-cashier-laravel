<table class="table table-compact table-stripped" id="mycategory">
    <thead>
        <tr>
            <th>No</th>
            <th>nama category</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data['category'] as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_category}}</td>
           
            
            <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-nama_category ="{{ $p->nama_category}}"
                >
                <i class="fas fa-edit"></i>
                  </button>
               <form action="{{ route('category.destroy', $p->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-nama={{$p->nama_category}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     
