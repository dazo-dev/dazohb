

<?php $__env->startSection('content'); ?>

<div class="container">
    <div style="height: auto; color: #fff; background-color: #000">
        <div class="row">
            <div class="col-sm-12 billing-section" style="padding: 1% 5%;">
                <div class="row">
                  <div class="col-75">
                    <div class="container">
                      <form action="/action_page.php">
                        
                          <?php if(isset($data['transStatus'])): ?>
                            <?php if($data['transStatus'] == 'S'): ?>
                              <div style="height: 10vh; background-color: green; padding: 25px 30px; margin-bottom: 20px; font-size: 20px;">
                                Transaction Commpleted and Successfull
                              </div>
                            <?php endif; ?>
                            <?php if($data['transStatus'] == 'P'): ?>
                              <div style="height: 10vh; background-color: orange; padding: 25px 30px; margin-bottom: 20px; font-size: 20px;">
                                Transaction Commpleted and Payment Pending
                              </div>
                            <?php endif; ?>
                            <?php if($data['transStatus'] == 'U'): ?>
                              <div style="height: 10vh; background-color: red; padding: 25px 30px; margin-bottom: 20px; font-size: 20px;">
                                Transaction Unknown
                              </div>
                            <?php endif; ?>
                            <?php if($data['transStatus'] == 'F'): ?>
                              <div style="height: 10vh; background-color: red; padding: 25px 30px; margin-bottom: 20px; font-size: 20px;">
                                Transaction Failed
                              </div>
                            <?php endif; ?>
                          <?php endif; ?>
                        
                        <div class="row">
                          <div class="col-50">
                            <h3>Transaction Information</h3>
                            
                              <label for="fname"><i class="fa fa-user"></i> Transaction Id</label>
                              <input type="text" id="transId" name="transactionId" value="<?php echo e($data['transId']); ?>">
                              <label for="email"><i class="fa fa-envelope"></i> Email</label>
                              <input type="text" id="email" name="email" value="<?php echo e(isset($data['authEmail']) ? $data['authEmail'] : ''); ?>">
                              <label for="adr"><i class="fa fa-address-card-o"></i> Amount</label>
                              <input type="text" id="transamount" name="transamount" placeholder="0.00" value="<?php echo e($data['transAmount']); ?>">
                              <label for="city"><i class="fa fa-institution"></i> Description</label>
                              <input type="text" id="transDetails" name="transdetails" placeholder="Details" value="<?php echo e($data['transacrDetails']); ?>">
                            
                            
                          </div>

                          <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards / Methods</label>
                            <div class="icon-container">
                                                                <a href="https://test.dragonpay.ph/GenPay.aspx?merchantid=SAMPLEGEN&invoiceno=<?php echo e($data['transId']); ?>&name=<?php echo e($data['authUser']); ?>&email=<?php echo e($data['linkEmail']); ?>&amount=<?php echo e($data['transAmount']); ?>&remarks=<?php echo e($data['linkDescription']); ?>">
                                  <i>
                                      <img src="data:image/png;base64,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" style="width: 20%;">
                                  </i>
                              </a>
                            </div>
                            <input type="button" value="Continue to checkout" class="btn btn-checkout-dp">

                          </div>

                        </div>
                        
                        
                      </form>
                    </div>
                  </div>

                  <div class="col-25">
                    <div class="container" style="margin-top: 9.5%;">
                      <h4>Cart
                        <span class="price" style="color:#fff">
                          <i class="fa fa-shopping-cart"></i>
                          
                        </span>
                      </h4>

                      <p><a href="#"><?php echo e($data['transType']); ?></a> <span class="price"><?php echo e($data['transAmount']); ?></span></p>
                      <hr>
                      <p>Total <span class="price" style="color:#fff"><b>₱<?php echo e($data['transAmount']); ?></b></span></p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('sections.bottom-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.footer-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dazohb\resources\views/checkout.blade.php ENDPATH**/ ?>