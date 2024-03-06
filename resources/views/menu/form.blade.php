<div class="modal fade" id="modalFormjenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
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
                <form method="post" action={{ route('menu.store') }} enctype="multipart/form-data"> 
                    @csrf  
                    <div class="form-group row"> 
                        <label for="nama_menu" class="col-sm-4 col-form-label">nama jenis</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama_menu" placeholder="nama_menu" 
                                name="nama_menu"> 
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label for="harga" class="col-sm-4 col-form-label">harga</label> 
                        <div class="col-sm-8"> 
                            <input type="number" class="form-control" id="harga" placeholder="harga" 
                                name="harga"> 
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
                    
                    <div class="form-group row">
                        <label for="Jenis" class="col-sm-4 col-form-label"> Jenis</label>
                        <div class="col-sm-8">
                            <select name="jenis_id" id="" class="form-control">
                                @foreach ($jenis as $label)
                                    <option value="{{ $label->id }}">{{ $label->nama_jenis }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control" id="inputEmail13" placeholder="Jenis Barang"
                                name="produk_id"> --}}
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
            <form method="POST" action="{{route('import-menu') }}" enctype="multipart/form-data">
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