<div class="bottom-ads-section">
<?php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    ?>
	<div class="row">
		<?php $__currentLoopData = $data['bottombanner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-sm-4 col-12" style="text-align:center;">
			
			<a href="<?php echo e($result->b_link); ?>" target=_blank><img src="<?php echo e($url); ?>dazoAdmin/public/uploads/banner-img/<?php echo e($result->b_img_path); ?>" style="width:300px;height:300px;"></a>
			
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
	</div>
</div><?php /**PATH D:\xampp\htdocs\dazobh\resources\views/sections/bottom-ads-section.blade.php ENDPATH**/ ?>