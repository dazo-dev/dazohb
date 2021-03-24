<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signinModalTitle">Log In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-bottom: 5%;">
        <ul class="nav nav-tabs nav-pills nav-fill" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="phone-tab" data-toggle="tab" href="#phone" role="tab" aria-controls="phone" aria-selected="false">USING PHONE NUMBER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">USING EMAIL ADDRESS</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          
              <span class="invalid-feedback" role="alert">
                  <strong>
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </strong>
              </span>
          
          <div class="tab-pane fade show active" id="phone" role="tabpanel" aria-labelledby="phone-tab">
            <form method="POST" action="<?php echo e(route('login')); ?>" class="default-form">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <i class="fa fa-phone icon"></i>
                <input type="tel" class="form-control phoneInput" id="phonenum" name="username" aria-describedby="emailHelp" placeholder="+63 999 999 9999 / 0999 999 9999">
              </div>
              <div class="form-group">
                <i class="fas fa-key icon"></i>
                <input type="password" class="form-control" id="phonePassword" name="password" placeholder="Password">
              </div>
              <div class="form-check">
                <a href="">Forgot Password?</a>
              </div>
              <button type="submit" class="btn btn-primary" style="background-color: #0D6499">LOG IN</button>
              <div class="divider"></div>
              <a class="btn btn-block btn-social btn-facebook" href="<?php echo e(url('/auth/redirect/facebook')); ?>">
                <span class="fa fa-facebook"></span> Sign in with Facebook
              </a>
              <a class="btn btn-block btn-social btn-google" href="<?php echo e(url('auth/google')); ?>">
                <span class="fa fa-google"></span> Sign in with GMail
              </a>
            </form>
          </div>
          <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
            <form method="POST" action="<?php echo e(route('login')); ?>" class="default-form">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <i class="fa fa-envelope icon"></i>
                <input type="email" class="form-control" id="email" name="username" aria-describedby="emailHelp" placeholder="Email Address">
              </div>
              <div class="form-group">
                <i class="fas fa-key icon"></i>
                <input type="password" class="form-control" id="emailPassword" name="password" placeholder="Password">
              </div>
              <div class="form-check">
                <a href="">Forgot Password?</a>
              </div>
              <button type="submit" class="btn btn-primary" style="background-color: #0D6499">LOG IN</button>
              <div class="divider"></div>
              <a class="btn btn-block btn-social btn-facebook" href="<?php echo e(url('/auth/redirect/facebook')); ?>">
                <span class="fa fa-facebook"></span> Sign in with Facebook
              </a>
              <a class="btn btn-block btn-social btn-google" href="<?php echo e(url('auth/google')); ?>">
                <span class="fa fa-google"></span> Sign in with GMail
              </a>
            </form>
          </div>
        </div>

      </div>
      
    </div>
  </div>
</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/modals/signin.blade.php ENDPATH**/ ?>