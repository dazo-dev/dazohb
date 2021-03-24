<div class="modal fade" id="changemailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <button type="button" style="display: none" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-header">
        <h5>Change Email</h5>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
          <form role="form" id="frm-change-mail">
          <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="curmail">Current Email*</label>
                <input type="text" class="form-control" name="curmail" id="curmail" required>
            </div>

            <div class="form-group">
                <label for="curpassword">Password*</label>
                <input type="password" class="form-control" name="curpassword" id="curpassword" required>
            </div>

            <div class="form-group">
                <label for="newmail">New Email*</label>
                <input type="text" class="form-control" name="newmail" id="newmail" required>
            </div>

            <div class="form-group">
                <label for="newmail2">Confirm New Email*</label>
                <input type="text" class="form-control" name="newmail2" id="newmail2" required>
            </div>
            <button type="button" class="btn btn-primary" id="btn-changemail-submit">Change Mail</button>
            <button type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal">Close</button>  
          </form>
          
        </div>
        
      </div>
    </div>
  </div>
</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/modals/changemail.blade.php ENDPATH**/ ?>