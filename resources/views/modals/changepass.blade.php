<div class="modal fade" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <button type="button" style="display: none" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-header">
        <h5>Change Password</h5>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
          @csrf
          <form role="form" id="frm-change-pass">
            <div class="form-group">
                <label for="oldpass">Old Password*</label>
                <input type="password" class="form-control" name="oldpass" id="oldpass" required>
            </div>

            <div class="form-group">
                <label for="newpass">New Password*</label>
                <input type="password" class="form-control" name="newpass" id="newpass" required>
            </div>

            <div class="form-group">
                <label for="newpass2">Confirm New Password*</label>
                <input type="password" class="form-control" name="newpass2" id="newpass2" required>
            </div>
            <button type="button" class="btn btn-primary" id="btn-pass-submit">Change Password</button>
            <button type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal">Close</button>  
          </form>
          
        </div>
        
      </div>
    </div>
  </div>
</div>