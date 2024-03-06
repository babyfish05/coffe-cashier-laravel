<div class="modal fade" id="modalFormCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">ISI Category</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" action={{ route('Category.store') }}> 
                    @csrf
                   
                    <div class="form-group row"> 
                        <label for="nama_Category" class="col-sm-4 col-form-label">nama Category</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="nama_Category" placeholder="nama_Category" 
                                name="nama Category"> 
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
                <h5 class="modal-title" id="exampleModalLabel">ISI DATA Category</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="POST" action="{{route('import-Category') }}" enctype="multipart/form-data">
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