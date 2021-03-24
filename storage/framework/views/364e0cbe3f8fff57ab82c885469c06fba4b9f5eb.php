<div class="col-sm-12 full-race-prog-container">
    <div class="main-container">
        <div class="col-12 row-header d-inline-flex p-0">
            <div class="col-lg-6 col-sm-12 p-0">
                <h2 class="p-t-5 full-prog-header">Full Race Program</h2>
            </div>
            <div class="col-lg-6 d-inline-flex p-0">
                <div class="col-12 p-0">                      
                    <div class="btn-container">

                        <table style="width:100%;">
                            <tr>
                                <?php if($data['resCount'] > 0): ?>
                                    <td>
                                        <button class="btn-r-res btn-date-switch" style="width: 100% !important">
                                            <h5><?php echo e(date('F d, Y',(strtotime ( date('Y-m-d') ) ))); ?></h5>
                                            <p>RACE RESULT</p>
                                        </button>
                                    </td>
                                <?php endif; ?>
                                <?php if($data['ractiveCount'] > 0): ?>
                                    <td>
                                        <button class="active btn-r-cur btn-date-switch" target-section="previous-accordion" style="width: 100% !important">
                                            <h5><?php echo e(date('F d, Y',(strtotime ( date('Y-m-d') ) ))); ?></h5>
                                            <p>RACE PROGRAM</p>
                                        </button>
                                    </td>
                                <?php endif; ?>
                                <td>
                                    <button class="btn-calendar" data-toggle="modal" data-target="#modal-calendar">
                                        <span class="span-calendar far fa-calendar-alt"></span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 row-header d-inline-flex" style="background-color: #171717; width: 100%; height: 15vh; margin-top: 1%; padding: 20px 35px;">
            <div class="col-lg-4 col-sm-12 p-0">
                <img src="images/DazoCoin-png.png" style="float: left;">
                <h5 style="padding-top: 10px; font-size: 15px">Your subscription will end in<br>
                    <p style="color: #E6581F; font-size: 25px"><?php echo e($data['subscriptionEnd']); ?> days</p>
                </h5>
            </div>    
        </div>

        <?php if($data['ractiveCount'] > 0): ?>
            <div class="col-12 race-main-table accord-sect row-race-accordion hidden-r-program" style="margin-top: 1% !important;">
                <div class="announcement" style="background-color: #fff;color: #000;height: 30vh;min-height: 30vh;padding: 45px 15px 15px 35px; overflow-y: auto;">
                    <div style="position: absolute; background-color: gray; top: 0px; left: 50px; height: 6vh; padding: 10px; font-size: 17px; font-weight: bold; color: #fff;">ANNOUNCEMENTS</div>
                    <?php $__empty_1 = true; $__currentLoopData = $data['curDResults']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($result->r_status == 1): ?>
                            <label style="color: #0D6499"><strong>Race <?php echo e($result->r_num); ?></strong></label>
                            <?php
                                if(strpos($result->announcement, "\n") !== FALSE) {
                                    $bits = explode("\n", $result->announcement);
                                    $newstring = "<ul>";
                                    foreach($bits as $bit)
                                    {
                                        $newstring .= "<li>" . $bit . "</li>";
                                    }
                                    $newstring .= "</ul>";

                                    echo $newstring;
                                }
                                else {
                                  echo $result->announcement;
                                }
                            ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div class="sect-cur">
                    <?php $__empty_2 = true; $__currentLoopData = $data['curDResults']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <?php if($result->r_status == 1): ?>
                            <button class="accordion frp-sect hid-btn-cur display-flex display-block-mb" target-race="<?php echo e($result->r_num); ?>" target-date="<?php echo e($result->r_date); ?>">
                                <div>
                                <span class="fas fa-angle-right"></span>
                                <span class="race-num">&nbsp RACE <?php echo e($result->r_num); ?></span>
                                </div>
                                <div>
                                <span class="race-time">&nbsp • <?php echo e(date("g:i a", strtotime($result->r_time))); ?></span>
                                <span class="race-distance">&nbsp • <?php echo e($result->r_length); ?> M</span>
                                <?php $__currentLoopData = unserialize($result->rd_x_bet); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="x-bet">&nbsp • <?php echo e($data); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <span class="race-age">&nbsp • <?php echo e($result->r_group); ?></span>
                                </div>
                            </button>
                            
                            <div class="panel hid-panel-cur">
                                <div class="row bet-row col-five">
                                    <div class="col-lg-12 col-sm-12 d-inline-flex p-t-1 t-a-c" style="padding-left: 0px;">
                                        <div class='main-bet-header'>

                                        </div>
                                    </div>
                                </div>
                                <div class="row bet-row col-five">
                                    <div class="col-lg-12 col-sm-12 p-t-1 tip-r" style="padding-left: 35px;padding-bottom: 10px;">
                                        <div class="col-lg-4 col-sm-12 col-b" style="padding-left: 0px;"></div>
                                        <div class="col-lg-4 col-sm-12 col-r" style="padding-left: 0px;"></div>
                                        <div class="col-lg-4 col-sm-12 col-y" style="padding-left: 0px;"></div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <button class="accordion frp-sect-result hid-btn display-flex display-block-mb" target-race="<?php echo e($result->r_num); ?>" target-date="<?php echo e($result->r_date); ?>" style="display: none">
                                <div>
                                <span class="fas fa-angle-right"></span>
                                <span class="race-num">&nbsp RACE <?php echo e($result->r_num); ?></span>
                                </div>
                                <div>
                                <span class="race-track-type">&nbsp • <?php echo e($result->r_track); ?></span>
                                <span class="race-distance">&nbsp • <?php echo e($result->r_length); ?> M</span>
                                <span class="race-track-type">&nbsp • <?php echo e($result->r_t_type); ?></span>
                                <span class="race-age">&nbsp • <?php echo e($result->r_group); ?></span>
                                </div>
                            </button>

                            <div class="panel hid-panel">
                                <div class="row bet-row col-five">
                                    <div class="col-lg-12 col-sm-12 d-inline-flex p-t-1 t-a-c" style="padding-left: 0px;">
                                        <div class='main-bet-header'>

                                        </div>
                                    </div>
                                </div>
                                <div class="row bet-row col-five">
                                    <div class="col-lg-12 col-sm-12 d-inline-flex p-t-1 b-res" style="padding-left: 35px;padding-bottom: 10px;">

                                    </div>
                                </div>
                                <div class="container">
                                <div class="row bet-row col-five" style="padding: 0px 25px;">
                                    <table id="resultTable" style="width: 100%;" class="table table-striped">
                                        <thead style="font-size: 13px;font-weight:700;">
                                            <tr>
                                                <th style="width:100px;">1/2</th>
                                                <th style="width:100px;">1/4</th>
                                                <th style="width:100px;">#</th>
                                                <th style="width:200px;">HORSE</th>
                                                <th style="width:200px;">JOCKEY</th>
                                                <th style="width:100px;">WEIGHT</th>
                                                <th style="width:100px;">LLAMADO</th>
                                                <th style="width:100px;">TIME</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <table style="width: 100%;margin-top: 15px;margin-bottom: 15px;"><tr><td style="text-align: center;"><span><i class="fas fa-play-circle" style="color: orange"></i></span>View Replay</td></tr></table>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <?php endif; ?>
                </div>
            </div>

            
        <?php else: ?>
            <div class="col-12 race-main-table accord-sect row-race-accordion" style="margin-top: 1% !important;">
                <?php $__empty_2 = true; $__currentLoopData = $data['yesDResults']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <button class="accordion frp-sect-result display-flex display-block-mb" target-race="<?php echo e($result->r_num); ?>" target-date="<?php echo e($result->r_date); ?>">
                        <div>
                        <span class="fas fa-angle-right"></span>
                        <span class="race-num">&nbsp RACE <?php echo e($result->r_num); ?></span>
                        </div>
                        <div>
                        <span class="race-track-type">&nbsp • <?php echo e($result->r_track); ?></span>
                        <span class="race-distance">&nbsp • <?php echo e($result->r_length); ?> M</span>
                        <span class="race-track-type">&nbsp • <?php echo e($result->r_t_type); ?></span>
                        <span class="race-age">&nbsp • <?php echo e($result->r_group); ?></span>
                        </div>
                    </button>
                    <div class="panel">
                        <div class="row bet-row col-five">
                            <div class="col-lg-12 col-sm-12 d-inline-flex p-t-1 t-a-c" style="padding-left: 0px;">

                            </div>
                        </div>
                        <div class="row bet-row col-five">
                            <div class="col-lg-12 col-sm-12 d-inline-flex p-t-1 b-res" style="padding-left: 35px;padding-bottom: 10px;">
                                <div class='main-bet-header'>

                                </div>
                            </div>
                        </div>
                        <div class="row bet-row col-five" style="padding: 0px 25px;overflow:auto;">
                            <table id="resultTable" style="width: 100%;" class="table table-striped">
                                <thead style="font-size: 13px;font-weight:700;">
                                    <tr>
                                        <th style="width:100px;">1/2</th>
                                        <th style="width:100px;">1/4</th>
                                        <th style="width:100px;">#</th>
                                        <th style="width:200px;">HORSE</th>
                                        <th style="width:200px;">JOCKEY</th>
                                        <th style="width:100px;">WEIGHT</th>
                                        <th style="width:100px;">LLAMADO</th>
                                        <th style="width:100px;">TIME</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <table style="width: 100%;margin-top: 15px;margin-bottom: 15px;"><tr><td style="text-align: center;"><span><i class="fas fa-play-circle" style="color: orange"></i></span>View Replay</td></tr></table>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>


    </div>
</div><?php /**PATH D:\xampp\htdocs\dazobh\resources\views/sections/full-race-prog-n-section.blade.php ENDPATH**/ ?>