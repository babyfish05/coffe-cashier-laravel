<div class="modal fade" id="modalFormabsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">ISI JENIS</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" action={{ route('absensi.store') }}> 
                    @csrf
                   
                    <div class="form-group row"> 
                        <label for="namaKaryawan" class="col-sm-4 col-form-label">nama karyawan</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="namaKaryawan" placeholder="namaKaryawan" 
                                name="namaKaryarwan"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="tanggalMasuk" class="col-sm-4 col-form-label">tanggal masuk</label> 
                        <div class="col-sm-8"> 
                            <input type="date" class="form-control" id="tanggalMasuk" placeholder="tanggalMasuk" 
                                name="tanggalMasuk"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="waktuMasuk" class="col-sm-4 col-form-label">waktu masuk</label> 
                        <div class="col-sm-8"> 
                            <input type="time" class="form-control" id="waktuMasuk" placeholder="waktuMasuk" 
                                name="waktuMasuk"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="status" class="col-sm-4 col-form-label">status</label> 
                        <div class="col-sm-8">
                            <select name="status" class="form-control" id="">
                                <option selected disabled>status</option>
                                <option value="Laki-Laki">masuk</option>
                                <option value="Perempuan">izin</option>
                                <option value="Perempuan">cuti</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label for="waktuKeluar" class="col-sm-4 col-form-label">waktu keluar</label> 
                        <div class="col-sm-8"> 
                            <input type="date" class="form-control" id="waktuKeluar" placeholder="waktuKeluar" 
                                name="waktuKeluar"> 
                        </div> 
                    </div>
                    

            </div> 
            <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button> 
                <button type="submit" class="btn btn-primary">Tambahkan</button> 
                </form> 
            </div> 
        </div> 
    </div> 
</div>

  <div class="modal fade" id="form-import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">ISI DATA jenis</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="POST" action="{{route('import-jenis') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="file" name="import">
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button> 
                        <button type="submit" class="btn btn-primary">Tambahkan</button> 
                    </div> 
                  </form>
             
                  
            </div> 
            
        </div> 
    </div> 
</div>