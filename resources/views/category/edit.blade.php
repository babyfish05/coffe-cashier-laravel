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
                        <label for="nama_category" class="col-sm-4 col-form-label">nama jenis</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama_category" placeholder="nama_category" 
                                name="nama_category"> 
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