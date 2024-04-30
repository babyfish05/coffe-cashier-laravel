<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>nama karyawan</th>
            <th>tanggal masuk</th>
            <th>waktu masuk</th>
            <th>status</th>
            <th>waktu selesai kerja</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data['masuk'] as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->nama_karyawan}}</td>
            <td>{{ $p->tanggal_masuk}}</td>
            <td>{{ $p->waktu_masuk}}</td>
            <td>
                <select name="status" class="form-control">
                    <option value="sakit" {{ $p->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="masuk" {{ $p->status == 'masuk' ? 'selected' : '' }}>Masuk</option>
                    <option value="cuti" {{ $p->status == 'cuti' ? 'selected' : '' }}>Cuti</option>
                </select>
            </td>
            
            <td>{{ $p->waktu_selesai_kerja}}</td>
           
           
        <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-nama_karyawan ="{{ $p->nama_karyawan}}"
                data-tanggal_masuk ="{{ $p->tanggal_masuk}}"
                data-waktu_masuk ="{{ $p->waktu_masuk}}"
                data-status ="{{ $p->status}}"
                data-waktu_selesai_kerja ="{{ $p->waktu_selesai_kerja}}"
                >
                <i class="fas fa-edit"></i>
                  </button>
               <form action="{{ route('masuk.destroy', $p->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-nama={{$p->nama_karyawan}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     


