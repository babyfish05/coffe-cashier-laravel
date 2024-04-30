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
                    <div class="mb-3 row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">nama menu</label>
                        <div class="col-sm-8">
                            <select name="menu_id" id="menu_id" class="form-control">
                            <option value="" selected disabled>pilih menu</option>
                            @foreach ($menu as $p )
                                <option value="{{ $p->id }}">{{ $p->nama_menu }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group row"> 
                        <label for="jumlah_stok" class="col-sm-4 col-form-label">jumlah stok</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="jumlah_stok" placeholder="jumlah_stok" 
                                name="jumlah_stok"> 
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