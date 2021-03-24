<div class="modal fade" id="editprofileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <button type="button" style="display: none" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-header">
        <h5>Edit Profile</h5>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
          <form role="form" id="frm-edit-profile">
              <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="_name">Full Name*</label>
                <input type="text" class="form-control" name="_name" id="_name" required>
            </div>

            <div class="form-group">
                <label for="_bday">Birth Date*</label>
                <input type="date" class="form-control" name="_bday" id="_bday" required>
            </div>

           
            <button type="button" class="btn btn-primary" id="btn-profileedit-submit">Save</button>
            <button type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal">Close</button>  
          </form>
          
        </div>
        
      </div>
    </div>
  </div>
</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/modals/editprofile.blade.php ENDPATH**/ ?>