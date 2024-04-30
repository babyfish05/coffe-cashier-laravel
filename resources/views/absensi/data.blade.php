<table class="table table-compact table-stripped" id="myAbsensi">
    <thead>
        <tr>
            <th>No</th>
            <th>nama karyawan</th>
            <th>tanggal masuk</th>
            <th>waktu masuk</th>
            <th>status</th>
            <th>waktu keluar</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data['absensi'] as $p)
        <tr>
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $p->namaKaryawan}}</td>
            <td>{{ $p->tanggalMasuk}}</td>
            <td>{{ $p->waktuMasuk}}</td>
            <td>{{ $p->status}}</td>
            <td>{{ $p->waktuKeluar}}</td>
           
            
            <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editform"data-mode = "edit" 
                data-id = "{{ $p->id}}"
                data-namaKaryawan ="{{ $p->namaKaryawan}}"
                data-tanggalMasuk ="{{ $p->tanggalMasuk}}"
                data-waktuMasuk ="{{ $p->waktuMasuk}}"
                data-status ="{{ $p->status}}"
                data-waktuKeluar ="{{ $p->waktuKeluar}}"
                >
                <i class="fas fa-edit"></i>
                  </button>
               <form action="{{ route('Absensi.destroy', $p->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                 <button type="Submit"data-nama={{$p->namaKaryawan}} class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
            </td>
        </form>
        </tr>
        @endforeach
    </tbody>
</table>

     
