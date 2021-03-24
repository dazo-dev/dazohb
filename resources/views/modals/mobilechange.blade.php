<div class="modal fade" id="changemobileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <button type="button" style="display: none" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-header">
        <h5>Add / Change Mobile</h5>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
          @csrf
          <form role="form" id="frm-change-mobile">
            <div class="form-group">
                <label for="_mobile">Mobile Number*</label>
                <input type="tel" class="form-control" name="_mobile" id="_mobile" placeholder="09151234123 / +639151234123" required>
            </div>

            <div class="form-group">
                <label for="mobpassword">Password*</label>
                <input type="password" class="form-control" name="mobpassword" id="mobpassword" required>
            </div>

            
            <button type="button" class="btn btn-primary" id="btn-mobile-submit">Save</button>
            <button type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal">Close</button>  
          </form>
          
        </div>
        
      </div>
    </div>
  </div>
</div>