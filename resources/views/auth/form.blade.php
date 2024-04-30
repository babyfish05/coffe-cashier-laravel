<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">ISI register</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" action="register">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row"> 
                    <label for="name" class="col-sm-4 col-form-label">nama</label> 
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" id="name" placeholder="name" 
                            name="name"> 
                    </div> 
                </div>
                <div class="form-group row"> 
                    <label for="email" class="col-sm-4 col-form-label">email</label> 
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" id="email" placeholder="email" 
                            name="email"> 
                    </div> 
                </div>
                <div class="form-group row"> 
                    <label for="password" class="col-sm-4 col-form-label">password</label> 
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" id="password" placeholder="password" 
                            name="password"> 
                    </div> 
                </div>
                <div class="form-group row"> 
                    <label for="level" class="col-sm-4 col-form-label">level</label> 
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" id="level" placeholder="level" 
                            name="level"> 
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
</div>
           
        
    
