<div class="jockey-slider-sect" id="jockey-slider-sect">
<?php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    ?>
  <div class="col-sm-12 header-text">
      <h3>Jockeys You May Also Like</h3>
  </div>
  <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false }'>
  <?php $__currentLoopData = $data['jockeyRandom']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="carousel-cell">
        <img class="d-block w-100" src="<?php echo e($url); ?>/dazoAdmin/public/uploads/jockey-img/<?php echo e($result->j_img_path); ?>" alt="1 slide">
              <h5><a href="<?php echo e(url('jockeydetails',$id = $result->id)); ?>"><?php echo e($result->j_name); ?></a></h5> 
              <div class="details-divider"></div>
              <table>
                
                <tr>
                  <td>JRTE:</td>
                  <td><?php echo e($result->j_jrte); ?></td>
                </tr>
                <tr>
                  <td>WINS:</td>
                  <td><?php echo e($result->wins1); ?></td>
                </tr>
              </table>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
  </div>
  
  <div class="col-sm 12 bottom-link">
    <a href="<?php echo e(url('jockey')); ?>">view all jockeys</a>
  </div>
</div>
<?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/jockey-slider-section.blade.php ENDPATH**/ ?>