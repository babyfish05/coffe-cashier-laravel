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
                        <label for="nip" class="col-sm-4 col-form-label">Nip</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nip" placeholder="nip" 
                                name="nip"> 
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label for="nik" class="col-sm-4 col-form-label">nik</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nik" placeholder="nik" 
                                name="nik"> 
                        </div> 
                    </div>  
                    <div class="form-group row"> 
                        <label for="nama" class="col-sm-4 col-form-label">nama</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama" placeholder="nama" 
                                name="nama"> 
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label for="Jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label> 
                        <select name="jenis_kelamin" id="jenis_kelamin">
                            <option selected disabled>jenis kelamin</option>
                            <option value="Laki-Laki">laki laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div> 
                    <div class="form-group row"> 
                        <label for="tempat_lahir" class="col-sm-4 col-form-label">tempat_lahir</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="tempat_lahir" placeholder="tempat_lahir" 
                                name="tempat_lahir"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="tanggal_kahir" class="col-sm-4 col-form-label">tanggal_lahir</label> 
                        <div class="col-sm-8"> 
                            <input type="date" class="form-control" id="tanggal_lahir" placeholder="tanggal_lahir" 
                                name="tanggal_lahir"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="telepon" class="col-sm-4 col-form-label">telepon</label> 
                        <div class="col-sm-8"> 
                            <input type="string" class="form-control" id="telepon" placeholder="telepon" 
                                name="telepon"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="agama" class="col-sm-4 col-form-label">agama</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="agama" placeholder="agama" 
                                name="agama"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="status_nikah" class="col-sm-4 col-form-label">status nikah</label> 
                        <select name="status_nikah" id="status_nikah">
                            <option selected disabled>status nikah</option>
                            <option value="belum menikah">single</option>
                            <option value="menikah">menikah</option>
                        </select>
                    </div> 
                    <div class="form-group row"> 
                        <label for="alamat" class="col-sm-4 col-form-label">alamat</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="alamat" placeholder="alamat" 
                                name="alamat"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="foto" class="col-sm-4 col-form-label">foto</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="foto" placeholder="foto" 
                                name="foto"> 
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