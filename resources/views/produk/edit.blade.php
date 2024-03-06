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
                        <label for="nama_produk" class="col-sm-4 col-form-label">nama produk</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama_produk" placeholder="nama_produk" 
                                name="nama_produk"> 
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label for="nama_supplier" class="col-sm-4 col-form-label">nama supplier</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama_supplier" placeholder="nama_supplier" 
                                name="nama_supplier"> 
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label for="harga_beli" class="col-sm-4 col-form-label">harga beli</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="harga_beli" placeholder="harga_beli" 
                                name="harga_beli"> 
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label for="harga_jual" class="col-sm-4 col-form-label">harga jual</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="harga_jual" placeholder="harga_jual" 
                                name="harga_jual" readonly > 
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label for="stok" class="col-sm-4 col-form-label">stok</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="stok" placeholder="stok" 
                                name="stok"> 
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