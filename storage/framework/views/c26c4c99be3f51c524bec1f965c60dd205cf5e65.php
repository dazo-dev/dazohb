<div class="bottom-ads-section">
<?php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    ?>
	<div class="col-sm-12 display-flex display-block-mb">
		<?php $__currentLoopData = $data['bottombanner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-lg-4 col-sm-12" style="text-align:center;">
			
			<a href="//<?php echo e($result->b_link); ?>" target=_blank><img src="//localhost/dazoAdmin/public/uploads/banner-img/<?php echo e($result->b_img_path); ?>" style="width:300px;height:300px;"></a>
			
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
	</div>
</div>


<?php /**PATH C:\Users\Paul Jovit Calibuso\code\dazohb2\resources\views/sections/bottom-ads-section.blade.php ENDPATH**/ ?>