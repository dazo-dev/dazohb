<div class="horse-details-section">
    <div class="col-sm-12">
        <?php $__currentLoopData = $data['jInfo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-sm-4">
                    <img class="img-horsedetails" src="" alt="">
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="horsename"><?php echo e($result->j_name); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table-horseprofile w-100-mb">
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
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table-horseprofile w-100-mb">
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
                                    <td><p>
                                        <?php
                                            $d1 = new DateTime(date("Y-m-d"));
                                            $d2 = new DateTime($result->j_started);
                                            $diff = $d2->diff($d1);
                                            echo $diff->y;
                                        ?>                 
                                        
                                </tr>
                                <tr>
                                    <td><p>Total Races:</p></td>
                                    <td><p></p></td>
                                </tr>
                                <tr>
                                    <td><p>Number of Wins:</p></td>
                                    <td><p></p></td>
                                </tr>
                                <tr>
                                    <td><p>Number of 2nds:</p></td>
                                    <td><p></p></td>
                                </tr>
                                <tr>
                                    <td><p>Number of 3rds</p></td>
                                    <td><p></p></td>
                                </tr>


                                
                            </table>
                        </div>

                    </div>
                    <div class="row row-profile-bottom">
                        <div class="col-12">
                            
                        </div>
                    </div>
                </div>
            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\dazohb\resources\views/sections/jockey-details-section.blade.php ENDPATH**/ ?>