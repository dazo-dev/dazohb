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
            <div class="col-sm-6 display-flex div-sort-label-mb">
                <div class="col-6" style="padding-right: 0;"><label class="sort-label" for="">CHOOSE MONTH:</label></div>
                <div class="col-6" style="padding-left: 0;">
                    <select class="form-control filter-season">
                        <option value="current-season">Current Season</option>
                        <option value="cur-month">This Month</option>
                        <option value="prev-month">Last Month</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 takeover-col-3-mb">
                <h5 class="season-header">CURRENT SEASON</h5>
            </div>
            
            <div class="col-lg-9 col-sm-12 display-block-mb" style="display:inline-flex;">
                <table class="m-l-0-mb w-100-mb" style="width: 38%;margin-left: 35%;">
                	<tr>
                		<td class="t-a-r t-a-l points-width-mb">JOCKEY CHALLENGE POINTS:</td>
                        <td>42</td>
                		
                	</tr>
                </table>
                <table class="w-100-mb" style="width:21%;">
                    <tr>
                    <td class="t-a-r t-a-l win-width-mb">WIN:</td>
                		<td></td>
                		<td class="t-a-r t-a-l win-width-mb">2nd:</td>
                		<td></td>
                		<td class="t-a-r t-a-l win-width-mb">3rd:</td>
                		<td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table-season-details table-bordered">
                    <thead>
                        <th>Race Date</th>
                        <th>Race Track</th>
                        <th>Track Length</th>
                        <th>Track Type</th>
                        <th>Group</th>
                        <th>Horse</th>
                        <th>Weight</th>
                        <th>Final Position</th>
                        <th>½</th>
                        <th>¼</th>
                        <th>Finish Time</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data['jockeyRace']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($result->r_date); ?></td>
                                <td><?php echo e($result->r_track); ?></td>
                                <td><?php echo e($result->r_length); ?></td>
                                <td>--</td>
                                <td><?php echo e($result->r_group); ?></td>
                                <td>
                                    <a href="<?php echo e(url('horsedetails', $id = $result->h_id)); ?>">
                                        <?php echo e($result->h_name); ?>

                                    </a>
                                </td>
                                <td><?php echo e($result->h_weight); ?></td>
                                <td><?php echo e($result->h_pos); ?></td>
                                <td><?php echo e($result->h_half); ?></td>
                                <td><?php echo e($result->h_quarter); ?></td>
                                <td><?php echo e($result->h_f_time); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\dazohb\resources\views/sections/jockey-summary-section.blade.php ENDPATH**/ ?>