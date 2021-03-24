<div class="horse-details-section">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <img class="img-horsedetails" src="" alt="">
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-12">
                        <h2 class="horsename"><?php echo e($data['horseDetails'][0]->h_name); ?></h2>
                    </div>
                </div>
                <div class="row display-block-mb">
                    <div class="col-6 full-width-mb">
                        <table class="table-horseprofile">
                            <tr>
                                <td><p>Horse Sex</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_sex); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Horse Age</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_age); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Horse Color</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_color); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Birthday</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_bday); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Shoes</p></td>
                                <td>
                                    <p>
                                        <?php echo e($data['horseDetails'][0]->h_shoes); ?>/
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Jockey</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->j_name); ?></p></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6 full-width-mb">
                        <table class="table-horseprofile">
                            <tr>
                                <td><p>Weight</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_weight); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Owner</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->o_name); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Trainer</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->t_name); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>CCODE</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_ccode); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Subgroup</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_subgroup); ?></p></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row row-profile-bottom">
                    <div class="col-12">
                        <i>Include local and overseas records and earnings*</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="padding: 5% 10%">
        <label>
            <h2>Race Records</h2>
        </label>

        <table style="width: 100%" border="1">
            <thead>
                <tr>
                    <td>Track Length</td>
                    <td>Best Time</td>
                    <td>Race Track</td>
                    <td>Track Type</td>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data['horseRace']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($element->r_length); ?></td>
                        <td><?php echo e($element->best); ?></td>
                        <td><?php echo e($element->r_track); ?></td>
                        <td><?php echo e($element->r_group); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\dazohb\resources\views/sections/horse-details-section.blade.php ENDPATH**/ ?>