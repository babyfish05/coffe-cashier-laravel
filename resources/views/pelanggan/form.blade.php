<div class="modal fade" id="modalFormjenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">ISI Pelanggan</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" action={{ route('pelanggan.store') }}> 
                    @csrf  
                    <div class="form-group row"> 
                        <label for="nama" class="col-sm-4 col-form-label">nama</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama" placeholder="nama" 
                                name="nama"> 
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label for="email" class="col-sm-4 col-form-label">email</label> 
                        <div class="col-sm-8"> 
                            <input type="email" class="form-control" id="email" placeholder="email" 
                                name="email"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="nomor_telepon" class="col-sm-4 col-form-label">nomor telepon</label> 
                        <div class="col-sm-8"> 
                            <input type="number" class="form-control" id="nomor_telepon" placeholder="nomor_telepon" 
                                name="nomor_telepon"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="alamat" class="col-sm-4 col-form-label">alamat</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="alamat" placeholder="alamat" 
                                name="alamat"> 
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
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="POST" action="{{route('import-pelanggan') }}" enctype="multipart/form-data">
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