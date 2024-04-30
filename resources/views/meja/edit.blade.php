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
                    
                    <div class="modal-body"> 
                        <form method="post" action={{ route('meja.store') }}> 
                            @csrf  
                            <div class="form-group row"> 
                                <label for="nomor_meja" class="col-sm-4 col-form-label">nomor_meja</label> 
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" id="nomor_meja" placeholder="nomor_meja" 
                                        name="nomor_meja"> 
                                </div> 
                            </div> 
                            <div class="form-group row"> 
                                <label for="kapasitas" class="col-sm-4 col-form-label">kapasitas</label> 
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" id="kapasitas" placeholder="kapasitas" 
                                        name="kapasitas"> 
                                </div> 
                            </div>
                            <div class="form-group row"> 
                                <label for="status" class="col-sm-4 col-form-label">status</label> 
                                <div class="col-sm-8">
                                    <select name="status" class="form-control" id="">
                                        <option selected disabled>status</option>
                                        <option value="isi">isi</option>
                                        <option value="kosong">kosong</option>
                                      
                                    </select>
                                </div>
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