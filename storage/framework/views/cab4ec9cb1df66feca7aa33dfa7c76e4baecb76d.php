<div class="horse-slider-sect">
<?php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    ?>
  <div class="col-sm-12 header-text">
        <h3>Horses You May Also Like</h3>
    </div>
    <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false }'>
    <?php $__currentLoopData = $data['horseRandom']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="carousel-cell">
          <img class="d-block w-100" src="<?php echo e($url); ?>/dazoAdmin/public/uploads/horse-img/<?php echo e($result->h_img_path); ?>" alt="1 slide">
                <h5><a href="<?php echo e(url('horsedetails',$id = $result->id)); ?>"><?php echo e($result->h_name); ?></a></h5>
                <div class="details-divider"></div>
                <table>
                  <tr>
                    <td>WINS:</td>
                    <td><?php echo e($result->wins1); ?></td>
                  </tr>
                  <tr>
                    <td>Jockey:</td>
                    <td><a href="<?php echo e(url('jockeydetails',$id = $result->h_j_id)); ?>"><?php echo e($result->j_name); ?></a></td>
                  </tr>
                  
                  <tr>
                    <td>Owner:</td>
                    <td><a href="<?php echo e(url('ownerdetails',$id = $result->h_o_id)); ?>"><?php echo e($result->o_name); ?></a></td>
                  </tr>
                  <tr>
                    <td>Trainer:</td>
                    <td><a href="<?php echo e(url('trainerdetails',$id = $result->h_t_id)); ?>"><?php echo e($result->t_name); ?></a></td>
                  </tr>
                </table>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
  </div>
    
  <div class="col-sm 12 bottom-link">
    <a href="<?php echo e(url('horses')); ?>">view all horses</a>
  </div>
</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/horses-slider-section.blade.php ENDPATH**/ ?>