<div class="modal fade" id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Edit data Pengajuan</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" class="form-edit"> 
                    @csrf 
                    @method('put')
                    
                    <div class="form-group row"> 
                        <label for="nama_karyawan" class="col-sm-4 col-form-label">nama karyawan</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama_karyawan" placeholder="nama_karyawan" 
                                name="nama_karyawan"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="tanggal_masuk" class="col-sm-4 col-form-label">tanggal masuk</label> 
                        <div class="col-sm-8"> 
                            <input type="date" class="form-control" id="tanggal_masuk" placeholder="tanggal_masuk" 
                                name="tanggal_masuk"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="waktu_masuk" class="col-sm-4 col-form-label">waktu masuk</label> 
                        <div class="col-sm-8"> 
                            <input type="time" class="form-control" id="waktu_masuk" placeholder="waktu_masuk" 
                                name="waktu_masuk"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="status" class="col-sm-4 col-form-label">status</label> 
                        <div class="col-sm-8">
                            <select name="status" class="form-control" id="">
                                <option selected disabled>status</option>
                                <option value="masuk">masuk</option>
                                <option value="izin">izin</option>
                                <option value="cuti">cuti</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label for="waktu_selesai_kerja" class="col-sm-4 col-form-label">waktu_selesai_kerja</label> 
                        <div class="col-sm-8"> 
                            <input type="time" class="form-control" id="waktu_selesai_kerja" placeholder="waktu_selesai_kerja" 
                                name="waktu_selesai_kerja"> 
                        </div> 
                    </div>
                    
                
            </div> 
            <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button> 
                <button type="submit" class="btn btn-primary">Edit</button> 
                </form> 
            </div> 
        </div> 
    </div> 
</div>