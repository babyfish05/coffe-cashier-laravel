<table class="table table-compact table-stripped table-responsive" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nip</th>
            <th>nik</th>
            <th>nama</th>
            <th>jenis kelamin </th>
            <th>tempat lahir</th>
            <th>tanggal lahir</th>
            <th>telepon</th>
            <th>agama</th>
            <th>status nikah</th>
            <th>alamat</th>
            <th>foto</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['karyawan'] as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nip}}</td>
            <td>{{ $p->nik}}</td>
            <td>{{ $p->nama}}</td>
            <td>{{ $p->jenis_kelamin}}</td>
            <td>{{ $p->tempat_lahir}}</td>
            <td>{{ $p->tanggal_lahir}}</td>
            <td>{{ $p->telepon}}</td>
            <td>{{ $p->agama}}</td>
            <td>{{ $p->status_nikah}}</td>
            <td>{{ $p->alamat}}</td>
            <td>{{ $p->foto}}</td>
            
            <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-nip ="{{ $p->nip}}"
                data-nik ="{{ $p->nik}}"
                data-nama ="{{ $p->nama}}"
                data-jenis_kelamin ="{{ $p->jenis_kelamin}}"
                data-tempat_lahir ="{{ $p->tempat_lahir}}"
                data-tanggal_lahir ="{{ $p->tanggal_lahir}}"
                data-telepon ="{{ $p->telepon}}"                                                                                                                                                                                                        
                data-agama ="{{ $p->agama}}"
                data-status_nikah ="{{ $p->status_nikah}}"
                data-alamat ="{{ $p->alamat}}"
                data-foto ="{{ $p->foto}}">
                <i class="fas fa-edit"></i>
                  </button>
               <form action="{{ route('karyawan.destroy', $p->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-nama={{$p->nama}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     
