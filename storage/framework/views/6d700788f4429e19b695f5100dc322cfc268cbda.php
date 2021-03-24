

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="content-white contact-section">
    	<?php echo $__env->make('sections.top-ads-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	<br>
    	<?php echo $__env->make('sections.buy-coin-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="content-white contact-section">
        <div class="row row-referal" style="padding: 0">
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                <img src="images/support.png">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <h2 style="font-size: 40px; font-style: italic; font-weight: bolder">Invite a Friend and Earn Rewards</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <p style="font-size: 15px;width: 90%;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula ege.
                    maeceneas Nullam</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                <button style="width: 100%; height: 5vh; text-transform: uppercase; background-color: #0D6499; border: none; color: #fff;" data-toggle="modal" data-target="#referModal">refer now</button>
            </div>
        </div>
    </div>
    <div class="content-white" style="background-color: #0f1010; padding: 5% 5%">
       <?php echo $__env->make('sections.subscribe-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('sections.accordion-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.bottom-ads-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.bet-watch-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.bottom-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.footer-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('modals.refer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dazobh\resources\views/buycoins.blade.php ENDPATH**/ ?>