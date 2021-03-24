<div class="jockey-details-table-section" style="
    color: #fff;
    background-color: #121212;
    padding: 1% 10%;
">
	

	<div class="col-sm-12" style="margin-top: 5%">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="horsename-form-title"></h2>
            </div>
            
        </div>

        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 takeover-col-3-mb">
                <h5 class="season-header">HORSES OWNED</h5>
            </div>
            
            
        </div>
        <div class="row">
            <div class="col-12">
                <table id="tblownerhorse" class="table-season-details table-bordered">
                    <thead>
                        <th>Horse</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Color</th>
                        <th>Weight</th>
                        <th>Jockey</th>
                        <th>JRTE</th>
                        <th>Owner</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data['trainerHorse']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                <a href="<?php echo e(url('horsedetails', $id = $result->id)); ?>">
                                        <?php echo e($result->h_name); ?>

                                    </a>
                                </td>
                                <td><?php echo e($result->h_sex); ?></td>
                                <td><?php echo e($result->h_age); ?></td>
                                <td><?php echo e($result->h_color); ?></td>
                                <td><?php echo e($result->h_weight); ?></td>
                                <td>
                                    <a href="<?php echo e(url('jockeydetails', $id = $result->h_j_id)); ?>">
                                        <?php echo e($result->j_name); ?>

                                    </a>
                                </td>
                                
                                <td><?php echo e($result->j_jrte); ?></td>
                                <td>
                                    <a href="<?php echo e(url('ownerdetails', $id = $result->h_o_id)); ?>">
                                        <?php echo e($result->o_name); ?>

                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/trainer-horse.blade.php ENDPATH**/ ?>