

<?php $__env->startSection('content'); ?>
<?php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    ?>
<div class="container">
    <div class="jockey-header" style="background-image: url('<?php echo e($url); ?>/dazohb/public/images/slider1.jpg');background-color: black;width: 100%;padding: 5% 10%; color:#fff;background-position: center;
    background-repeat: no-repeat;">
        <h2>Dividendazo Jockeys</h2>
    </div>
    <div class="bg-black content-white user-top-section" style="background:url('') !important;background-color: #0f1010 !important">
        <?php echo $__env->make('sections.top-ads-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('sections.jockey-list-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
       
        <?php echo $__env->make('sections.bottom-ads-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('sections.bet-watch-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('sections.bottom-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('sections.footer-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/jockey.blade.php ENDPATH**/ ?>