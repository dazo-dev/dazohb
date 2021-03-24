<div class="horse-details-section">
    <div class="col-sm-12">
        <div class="row">
            <?php
                $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
            ?>
            <div class="col-sm-5 p-b-1 p-t-1">
                    <img class="img-horsedetails" src="<?php echo e($url); ?>/dazoAdmin/public/uploads/horse-img/<?php echo e($data['horseDetails'][0]->h_img_path); ?>" alt="" style="width:100% !important;height:100% !important;">
                </div>
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-12">
                        <h2 class="horsename"><?php echo e($data['horseDetails'][0]->h_name); ?></h2>
                    </div>
                </div>
                <div class="row display-block-mb">
                    <div class="col-6 full-width-mb">
                        <table class="table-horseprofile" style="font-size:13px;">
                            <tr>
                                <td><p>Horse Se:x</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_sex); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Horse Age:</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_age); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Horse Color:</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_color); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Birthday:</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_bday); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Shoes:</p></td>
                                <td>
                                    <p>
                                        <?php echo e($data['horseDetails'][0]->h_shoes); ?>/
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Jockey:</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->j_name); ?></p></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6 full-width-mb">
                        <table class="table-horseprofile" style="font-size:13px;">
                            <tr>
                                <td><p>Weight:</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_weight); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Owner:</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->o_name); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Trainer:</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->t_name); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>CCODE:</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_ccode); ?></p></td>
                            </tr>
                            <tr>
                                <td><p>Subgroup:</p></td>
                                <td><p><?php echo e($data['horseDetails'][0]->h_subgroup); ?></p></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row row-profile-bottom" style="font-size:13px;">
                    <div class="col-12">
                        <i>Include local and overseas records and earnings*</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="padding: 5% 10%">
        <label>
            <h2>BEST TIME</h2>
        </label>

        <table style="width: 100%;font-size:13px;" border="1" >
            <thead style="text-align:center;">
                <tr>
                    <td>Track Length</td>
                    <td>Best Time</td>
                    <td>Race Track</td>
                    <td>Track Type</td>
                </tr>
            </thead>
            <tbody style="text-align:center;font-size:13px;">
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
<?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/horse-details-section.blade.php ENDPATH**/ ?>