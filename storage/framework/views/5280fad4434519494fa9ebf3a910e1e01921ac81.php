<div class="horse-details-section">
<?php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    ?>
    <div class="col-sm-12">
        <?php $__currentLoopData = $data['jInfo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-sm-5 p-b-1 p-t-1">
                    <img class="img-horsedetails" src='//localhost/dazoAdmin/public/uploads/jockey-img/<?php echo e($result->j_img_path); ?>' alt="" style="width:100% !important;height:100% !important;">
                </div>
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="horsename"><?php echo e($result->j_name); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table-horseprofile w-100-mb" style="font-size:13px;">
                                <tr>
                                    <td><p>Jockey Sex:</p></td>
                                    <td><p><?php echo e(($result->j_sex == 'M' ? 'Male' : 'Female')); ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Jockey Age:</p></td>
                                    <td><p><?php echo e($result->j_age); ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Nationality:</p></td>
                                    <td><p><?php echo e($result->j_nation); ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Background:</p></td>
                                    <td><p><?php echo e($result->j_bground); ?></p></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table-horseprofile w-100-mb" style="font-size:13px;">
                                <tr>
                                    <td><p>JRTE:</p></td>
                                    <td><p><?php echo e($result->j_jrte); ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Year Started:</p></td>
                                    <td><p><?php echo e($result->j_started); ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Years Played:</p></td>
                                    <td><p><?php echo e($result->ycount); ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Total Races:</p></td>
                                    <td><p><?php echo e($result->rcount); ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Number of Wins:</p></td>
                                    <td><p><?php echo e($result->wins1); ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Number of 2nds:</p></td>
                                    <td><p><?php echo e($result->wins2); ?></p></td>
                                </tr>
                                <tr>
                                    <td><p>Number of 3rds</p></td>
                                    <td><p><?php echo e($result->wins3); ?></p></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="row row-profile-bottom" style="font-size:13px;">
                        <div class="col-12">
                             <i>*Include local and overseas records and earnings</i>
                        </div>
                    </div>
                </div>
            </div>
           
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/jockey-details-section.blade.php ENDPATH**/ ?>