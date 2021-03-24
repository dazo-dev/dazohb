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
                <div class="col-6" style="padding-right: 0;"><label class="sort-label" for="">CHOOSE YEAR:</label></div>
                <div class="col-6" style="padding-left: 0;">
                   
                    <select id="select-jockey-year" class="form-control filter-season select-jockey-year" target-id="<?php echo e($data['jInfo'][0]->id); ?>">
                        <option value="allyear">ALL YEAR</option>
                        <?php $__currentLoopData = $data['jockeyYears']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($result->ryears); ?>"><?php echo e($result->ryears); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <h5 class="season-header">ALL YEAR</h5>
            </div>
            
            <div class="col-lg-9 col-sm-12 display-block-mb" style="display:inline-flex;">
                <!-- <table class="m-l-0-mb w-100-mb" style="width: 38%;margin-left: 35%;">
                	<tr>
                		<td class="t-a-r t-a-l points-width-mb">JOCKEY CHALLENGE POINTS:</td>
                        <td>42</td>
                		
                	</tr>
                </table> -->
                <table id="tbljwins" class="w-100-mb">
                <?php $__currentLoopData = $data['jInfo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="t-a-r t-a-l win-width-mb">WINS:</td>
                		<td><?php echo e($result->wins1); ?></td>
                		<td class="t-a-r t-a-l win-width-mb">2nd:</td>
                		<td><?php echo e($result->wins2); ?></td>
                		<td class="t-a-r t-a-l win-width-mb">3rd:</td>
                		<td><?php echo e($result->wins3); ?></td>
                   
                    </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table id="tbljockeyrace" class="table-season-details table-bordered">
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
                                <td><?php if($result->r_t_type == null): ?> <?php echo e('--'); ?> <?php else: ?> <?php echo e($result->r_t_type); ?> <?php endif; ?></td>
                                <td><?php echo e($result->r_group); ?></td>
                                <td>
                                    <a href="<?php echo e(url('horsedetails', $id = $result->h_id)); ?>">
                                        <?php echo e($result->h_name); ?>

                                    </a>
                                </td>
                                <td><?php echo e($result->h_weight); ?></td>
                                <td><?php echo e($result->h_pos); ?></td>
                                <td> <?php if($result->h_half == null): ?> <?php echo e('--'); ?> <?php else: ?> <?php echo e($result->h_half); ?> <?php endif; ?></td>
                                <td><?php if($result->h_quarter == null): ?> <?php echo e('--'); ?> <?php else: ?> <?php echo e($result->h_quarter); ?> <?php endif; ?> </td>
                                <td><?php echo e($result->h_f_time); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/jockey-summary-section.blade.php ENDPATH**/ ?>