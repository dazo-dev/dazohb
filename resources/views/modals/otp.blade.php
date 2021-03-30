<div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-header modal-step">

        <p>STEP 2 OF 3</p>

      </div>

      <div class="modal-header">

        <h5 class="modal-title" id="signinModalTitle">Enter Code</h5>

      </div>

      <div class="modal-message">

        <p>We have sent you a code to your phone number. Please  enter the code below.</p>

      </div>

      <div class="modal-body" style="margin-bottom: 5%;">

        <form method="POST" action="{{ route('verify') }}" id="verifyOTP">

            @csrf

          <input type="hidden" name="activeemail" class="otp-active-email">

          <input type="hidden" name="phone_number" class="otp-active-number">

          <input type="hidden" name="verification_code" class="verification_code">

          <div class="row">

            <div class="col-sm-2">

              <input type="text" name="" class="otp-input f-key" maxlength="1">

            </div>

            <div class="col-sm-2">

              <input type="text" name="" class="otp-input s-key" maxlength="1">

            </div>

            <div class="col-sm-2">

              <input type="text" name="" class="otp-input t-key" maxlength="1">

            </div>

            <div class="col-sm-2">

              <input type="text" name="" class="otp-input o-key" maxlength="1">

            </div>

            <div class="col-sm-2">

              <input type="text" name="" class="otp-input v-key" maxlength="1">

            </div>

            <div class="col-sm-2">

              <input type="text" name="" class="otp-input x-key" maxlength="1">

            </div>

          </div>

          <div style="text-align: center; padding: 2% 20%;">

            <label class="error-otp" style="color: red; font-weight: bold"></label>

            <div class="spinner-border text-warning otp-spinner" role="status" style="display: none">

              <span class="sr-only">Loading...</span>

            </div>

          </div>

         

          <div class="row btn-container">

            <button type="button" class="btn-verify">SUBMIT</button>

          </div>

        </form>



        <div class="row resend-container">

          <p>

            Your code will expire in 120 seconds. <a class="resend-otp" href="">Resend Code</a> 

          </p>

        </div>

      </div>

      

    </div>

  </div>

</div>