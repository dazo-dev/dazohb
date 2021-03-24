<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="margin-top: 15%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-header modal-step">
        <p>STEP 3 OF 3</p>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="signinModalTitle">Create Account</h5>
      </div>
      <div class="modal-body" style="margin-bottom: 5%;">
        <form method="POST" action="<?php echo e(route('complete')); ?>" id="completeRegistration">
            <?php echo csrf_field(); ?>
          <input type="hidden" name="activeemail" class="active-email">
          <input type="hidden" name="activenumber" class="active-number">
          <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control profile-input" name="firstname" aria-describedby="firstnameHelp" placeholder="Your First Name">
          </div>
          <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control profile-input" name="lastname" aria-describedby="lastnameHelp" placeholder="Your Last Name">
          </div>
          <div class="form-group">
            <label for="lastname">Birthday</label>
            <div class="date-dropdowns"></div>
          </div>


         


          <div class="form-group">
            <label for="passwordinput">Password</label>
            <input type="password" class="form-control profile-input" name="passwordinput" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="confirmpassword">Confirmation Password</label>
            <input type="password" class="form-control profile-input" name="confirmpassword" placeholder="Confirm Password">
          </div>
          <div style="text-align: center;">
            <label class="profile-msg" style="color: red; font-weight: bold"></label>
          </div>
          <button type="button" class="btn btn-primary form-control complete-registration">FINISH</button>
          
        </form>
      </div>
      <
    </div>
  </div>
</div><?php /**PATH C:\Users\Paul Jovit Calibuso\code\dazohb2\resources\views/modals/profile.blade.php ENDPATH**/ ?>