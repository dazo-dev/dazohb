<div class="modal fade" id="referModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          &times;
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <h5>
            <img src="images/support.png" width="20%">
          </h5>
        </div>
        <div class="row c-block">
          <h2>Invite a Friend and Earn Rewards</h2>
          <p class="r-block">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula ege.
          </p>
        </div>
        <div class="row s-block d-flex p-0 t-a-c">
          <div class="col-lg-6 col-md-6 col-sm-6 w-50-center">
            <a href="">
              <i class="fas fa-comment-dots"> &nbsp </i><span>SMS</span>
            </a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 w-50-center">
            <a href="">
              <i class="fas fa-envelope"></i> &nbsp <span>EMAIL</span>
            </a>
          </div>
        </div>
        <div class="row f-block d-flex">
          <div class="col-sm-6 col-md-6 col-lg-6 f-block-l w-50">
            <h3>total earned</h3>
            <img src="images/DazoCoin-png.png" width="20%">
            <span><?php echo e(Auth::user()->refer_earnings); ?></span>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 f-block-r w-50">
            <h3>referred friends</h3>
            <p><?php echo e(Auth::user()->refer_count); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/modals/refer.blade.php ENDPATH**/ ?>