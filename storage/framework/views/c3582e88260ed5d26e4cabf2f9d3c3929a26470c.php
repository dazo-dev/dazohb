<div id="carouselExampleIndicators" class="carousel slide p-0" data-ride="carousel">
<?php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    ?>
  <div class="carousel-inner">
   
 
    

    <?php for($i = 0; count($data['topbanner']) > $i; $i++): ?>
      <?php if($i == 0): ?> 
      <div class="carousel-item active">
      <?php else: ?>
      <div class="carousel-item">
      <?php endif; ?>
    
      <a href="//<?php echo e($data['topbanner'][$i]->b_link); ?>" target="_blank"><img class="d-block w-100" src="//localhost/dazoAdmin/public/uploads/banner-img/<?php echo e($data['topbanner'][$i]->b_img_path); ?>" alt="First slide" style="height: 300px !important;"></a>
    </div>
    <?php endfor; ?>
    
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><?php /**PATH C:\Users\Paul Jovit Calibuso\code\dazohb2\resources\views/sections/top-ads-section.blade.php ENDPATH**/ ?>