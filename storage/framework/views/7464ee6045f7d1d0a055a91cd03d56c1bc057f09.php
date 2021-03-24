<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> 
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-header modal-step">
        <p>STEP 1 OF 3</p>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="signinModalTitle">Create Account</h5>
      </div>
      <div class="modal-body" style="margin-bottom: 5%;">
        <ul class="nav nav-tabs nav-pills nav-fill" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="phone-register" data-toggle="tab" href="#phone-reg" role="tab" aria-controls="phone" aria-selected="false">USING PHONE NUMBER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="email-register" data-toggle="tab" href="#email-reg" role="tab" aria-controls="email" aria-selected="false">USING EMAIL ADDRESS</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="phone-reg" role="tabpanel" aria-labelledby="phone-register">

            <form method="POST" action="<?php echo e(route('register')); ?>" id="mobile" class="default-form">
              <?php echo csrf_field(); ?>
              

              <label class="error-msg" style="color: red; font-weight: bold"></label>
              <div class="spinner-border text-warning error-spinner" role="status" style="display: none"> 
                <span class="sr-only">Loading...</span>
              </div>          
              
              <div class="form-group">
                
                <i class="fa fa-phone icon"></i>
                <input type="tel" class="form-control main-input" name="phone_number" id="phoneInput" aria-describedby="emailHelp" placeholder="+63 999 999 9999 / 0999 999 9999">
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">
                  I confirm that I am over 18 years old and agree to the 
                  <a class="terms-condition" href="javascript:void(0)">terms & conditions.</a> 
                </label>
              </div>
              <button type="button" class="btn btn-primary btn-signup" style="background-color: #0D6499">NEXT</button>
              <div class="divider"></div>
              <a class="btn btn-block btn-social btn-facebook" href="<?php echo e(url('/auth/redirect/facebook')); ?>">
                <span class="fa fa-facebook"></span> Register with Facebook
              </a>
              <a class="btn btn-block btn-social btn-google" href="<?php echo e(url('auth/google')); ?>">
                <span class="fa fa-google"></span> Register with GMail
              </a>
            </form>
          </div>
          <div class="tab-pane fade" id="email-reg" role="tabpanel" aria-labelledby="email-register">
            <form method="POST" action="<?php echo e(route('register')); ?>" id="emailaddress" class="default-form">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label class="error-msg" style="color: red; font-weight: bold"></label>
                <div class="spinner-border text-warning error-spinner" role="status" style="display: none">
                  <span class="sr-only">Loading...</span>
                </div>
                <i class="fa fa-envelope icon"></i>
                <input type="email" class="form-control main-input" name="emailadd" id="emailInput" aria-describedby="emailHelp" placeholder="Email Address">
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">
                  I confirm that I am over 18 years old and agree to the 
                  <a class="terms-condition" href="javascript:void(0)">terms & conditions.</a> 
                </label>
              </div>
              <button type="button" class="btn btn-primary btn-signup" style="background-color: #0D6499">NEXT</button>
              <div class="divider"></div>
              <a class="btn btn-block btn-social btn-facebook" href="<?php echo e(url('/auth/redirect/facebook')); ?>">
                <span class="fa fa-facebook"></span> Register with Facebook
              </a>
              <a class="btn btn-block btn-social btn-google" href="<?php echo e(url('auth/google')); ?>">
                <span class="fa fa-google"></span> Register with GMail
              </a>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div><?php /**PATH D:\xampp\htdocs\dazohb\resources\views/modals/register.blade.php ENDPATH**/ ?>