<div class="modal fade" id="modalFormKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">ISI DATA KARYAWAN</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" action={{ route('Karyawan.store') }} enctype="multipart/form-data"> 
                    @csrf  
                    <div class="form-group row"> 
                        <label for="karyawan" class="col-sm-4 col-form-label">Nip</label> 
                        <div class="col-sm-8"> 
                            <input type="number" class="form-control" id="nip" placeholder="nip" 
                                name="nip"> 
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label for="karyawan" class="col-sm-4 col-form-label">nik</label> 
                        <div class="col-sm-8"> 
                            <input type="number" class="form-control" id="nik" placeholder="nik" 
                                name="nik"> 
                        </div> 
                    </div>  
                    <div class="form-group row"> 
                        <label for="karyawan" class="col-sm-4 col-form-label">nama</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama" placeholder="nama" 
                                name="nama"> 
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8 row px-5">
                            <div class="col-sm-8"> 
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin">
                                <label class="status_menikah" for="jenis_kelamin" class="col-sm-4 col-from-label"></label>
                                Laki laki
                                </label>
                            </div> 
                            <div class="col-sm-4"> 
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" checked>
                                <label class="status_menikah" for="jenis_kelamin">
                                Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row"> 
                        <label for="Jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label> 
                        <select name="jenis_kelamin" class="form-control" id="">
                            <option selected disabled>jenis kelamin</option>
                            <option value="Laki-Laki">laki laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>  --}}
                    <div class="form-group row"> 
                        <label for="nama_pengaju" class="col-sm-4 col-form-label">tempat_lahir</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="tempat_lahir" placeholder="tempat_lahir" 
                                name="tempat_lahir"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="nama_pengaju" class="col-sm-4 col-form-label">tanggal_lahir</label> 
                        <div class="col-sm-8"> 
                            <input type="date" class="form-control" id="tanggal_lahir" placeholder="tanggal_lahir" 
                                name="tanggal_lahir"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="telepon" class="col-sm-4 col-form-label">telepon</label> 
                        <div class="col-sm-8"> 
                            <input type="number" class="form-control" id="telepon" placeholder="telepon" 
                                name="telepon"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="nama_pengaju" class="col-sm-4 col-form-label">agama</label> 
                        <div class="col-sm-8">
                            <select name="nama_pengaju" class="form-control" id="">
                                <option selected disabled>agama</option>
                                <option value="Laki-Laki">islam</option>
                                <option value="Perempuan">Kristen</option>
                                <option value="Perempuan">katolik</option>
                                <option value="Perempuan">khongucu</option>
                                <option value="Perempuan">hindu</option>
                                <option value="Perempuan">budha</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row"> 
                        <label for="nama_pengaju" class="col-sm-4 col-form-label">agama</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="agama" placeholder="agama" 
                                name="agama"> 
                        </div> 
                    </div> --}}
                    <div class="form-group row">
                        <label for="status_nikah" class="col-sm-4 col-form-label">Status Nikah</label>
                        <div class="col-sm-8 row px-5">
                            <div class="col-sm-8"> 
                                <input class="form-check-input" type="radio" name="status_nikah" id="status_nikah">
                                <label class="status_menikah" for="status_nikah" class="col-sm-4 col-from-label"></label>
                                belum menikah
                                </label>
                            </div> 
                            <div class="col-sm-4"> 
                                <input class="form-check-input" type="radio" name="status_nikah" id="status_nikah" checked>
                                <label class="status_menikah" for="status_nikah">
                                menikah
                                </label>
                            </div>
                        </div>
                    </div>
                      {{-- <div class="form-group row">
                      </div> --}}
                    {{-- <div class="form-group row"> 
                        <label for="status_nikah" class="col-sm-4 col-form-label">status nikah</label> 
                        <select name="status_nikah" id="">
                            <option selected disabled>status nikah</option>
                            <option value="belum menikah">single</option>
                            <option value="menikah">menikah</option>
                        </select>
                    </div>  --}}
                    <div class="form-group row"> 
                        <label for="alamat"class="col-sm-4 col-form-label">alamat</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="alamat" placeholder="alamat" 
                                name="alamat"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="foto" class="col-sm-4 col-form-label">foto</label> 
                        <div class="col-sm-8"> 
                            <input type="file" class="form-control" id="foto" placeholder="foto" 
                                name="foto"> 
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
                <h5 class="modal-title" id="exampleModalLabel">ISI DATA KARYAWAN</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form action="{{ url('/import-karyawan') }}" method="POST" class="form-file" enctype="multipart/form-data">
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