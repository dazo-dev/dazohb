<div class="bottom-ads-section">

<?php

        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    ?>

	<div class="col-sm-12 display-flex display-block-mb">

		<?php $__currentLoopData = $data['bottombanner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		

			

			<a href="//<?php echo e($result->b_link); ?>" class="margin-x-auto" target=_blank><img src="<?php echo e($url); ?>dazohb/public/uploads/banner-img/<?php echo e($result->b_img_path); ?>" style="width:1092px;height:300px;"></a>

			

		

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		

	</div>

</div>





<?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/bottom-ads-section.blade.php ENDPATH**/ ?>