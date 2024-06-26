<div class="modal fade" id="editform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Edit menu</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" class="form-edit" enctype="multipart/form-data"> 
                    @csrf 
                    @method('put')
                    
                    <div class="form-group row"> 
                        <label for="nama_menu" class="col-sm-4 col-form-label">nama menu</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama_menu" placeholder="nama_menu" 
                                name="nama_menu"> 
                        </div> 
                    </div>
                    
                    <div class="form-group row"> 
                        <label for="harga" class="col-sm-4 col-form-label">harga</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="harga" placeholder="harga" 
                                name="harga"> 
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="Jenis" class="col-sm-4 col-form-label"> Jenis</label>
                        <div class="col-sm-8">
                            <select name="jenis_id" id="" class="form-control">
                                @foreach ($jenis as $label)
                                    <option value="{{ $label->id }}">{{ $label->nama_jenis }}</option>
                                @endforeach
                            </select>
                          
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label for="image" class="col-sm-4 col-form-label">image</label> 
                        <div class="col-sm-8"> 
                            <input type="file" class="form-control" id="image" placeholder="image" 
                                name="image"> 
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label for="deskripsi" class="col-sm-4 col-form-label">deskripsi</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="deskripsi" placeholder="deskripsi" 
                                name="deskripsi"> 
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