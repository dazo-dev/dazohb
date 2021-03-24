<div class="horse-details-table-section">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-6 full-width-mb">
                <h2 class="horsename-form-title"> RACE RECORD</h2>
            </div>
            <div class="col-6 display-flex full-width-mb">
                <div class="col-6" style="padding-right: 0;"><label class="sort-label" for="">CHOOSE YEAR:</label></div>
                <div class="col-6" style="padding-left: 0;">
                    <select class="form-control filter-season" id='horse-filter-season' target-id="<?php echo e($data['horseDetails'][0]->id); ?>">
                        <option value="CURRENT YEAR">Current Year</option>
                        <option value="LAST YEAR">Last Year</option>
                        
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row current-season">
            <div class="col-12">
                <h5 class="season-header">CURRENT YEAR</h5>
            </div>
        </div>
        <div class="row current-season">
            <div class="col-12 table-wrapper">
                <table id="tblhorserecord" class="table-season-details table-bordered" style="font-size:13px;">
                    <thead>
                        <th>Race Date</th>
                        <th>Race Track</th>
                        <th>Track Length</th>
                        <th>Track Type</th>
                        <th>Group</th>
                        <th>Jockey</th>
                        <th>Weight</th>
                        <th>Final Position</th>
                        <th>1/2</th>
                        <th>1/4</th>
                        <th>Finish Time</th>
                        <th>Video Replay</th>
                    </thead>
                    <tbody style="font-size:13px;">
                        <?php $__currentLoopData = $data['horseRaceCurrent']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td><?php echo e($result->r_date); ?></td>
                                <td><?php echo e($result->r_track); ?></td>
                                <td><?php echo e($result->r_length); ?></td>
                                <td><?php if($result->r_t_type == null): ?> <?php echo e('--'); ?> <?php else: ?> <?php echo e($result->r_t_type); ?> <?php endif; ?></td>
                                <td><?php echo e($result->r_group); ?></td>
                                <td>
                                    <a href="<?php echo e(url('jockeydetails', $id = $result->j_id)); ?>">
                                        <?php echo e($result->j_name); ?>

                                    </a>
                                </td>
                                <td><?php echo e($result->h_weight); ?></td>
                                <td><?php echo e($result->h_pos); ?></td>
                                <td> <?php if($result->h_half == null): ?> <?php echo e('--'); ?> <?php else: ?> <?php echo e($result->h_half); ?> <?php endif; ?></td>
                                <td><?php if($result->h_quarter == null): ?> <?php echo e('--'); ?> <?php else: ?> <?php echo e($result->h_quarter); ?> <?php endif; ?> </td>
                                <td><?php echo e($result->h_f_time); ?></td>
                                <td><a href="//<?php echo e($result->r_replay); ?>" target="_blank">
                                    <button><span class="fa fa-play"></span></button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>
            </div>
        </div>


        


       

        <div class="row row-legend display-flex display-block-mb full-width-mb">
            <div class="col-5 full-width-mb">
                <div class="col-12">
                    <div class="row"><p class="text-spacing">REMARKS:</p></div>
                    <div class="row">
                        <ul>
                            <li>View Special Incident index <a href="">here</a></li>
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                                    Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-7 full-width-mb">
                <div class="col-12">
                    <div class="row"><p class="text-spacing">LEGENDS:</p></div>
                        <div class="row">
                            <div class="col-4 full-width-mb">
                                <table>
                                    <tr>
                                        <td><label>B</label></td>
                                        <td>Blinkers</td>
                                    </tr>
                                    <tr>
                                        <td><label>BO</label></td>
                                        <td>Blinker with one cowl only</td>
                                    </tr>
                                    <tr>
                                        <td><label>E</label></td>
                                        <td>Ear Plugs</td>
                                    </tr>
                                    <tr>
                                        <td><label>P</label></td>
                                        <td>Pacifier</td>
                                    </tr>
                                    <tr>
                                        <td><label>PC</label></td>
                                        <td>Pacifier with cowls</td>
                                    </tr>
                                    <tr>
                                        <td><label>PS</label></td>
                                        <td>Pacifier with 1 cowl</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-4 full-width-mb">
                                <table>
                                    <tr>
                                        <td><label>H</label></td>
                                        <td>Hood</td>
                                    </tr>
                                    <tr>
                                        <td><label>SR</label></td>
                                        <td>Shadow Roll</td>
                                    </tr>
                                    <tr>
                                        <td><label>CP</label></td>
                                        <td>Sheepskin Cheek Pieces</td>
                                    </tr>
                                    <tr>
                                        <td><label>CO</label></td>
                                        <td>Sheepskin Cheek Pieces 1 Side</td>
                                    </tr>
                                    <tr>
                                        <td><label>CC</label></td>
                                        <td>Cornell Collar</td>
                                    </tr>
                                    <tr>
                                        <td><label>TT</label></td>
                                        <td>Tongue Tie</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-4 full-width-mb">
                                <table>
                                    <tr>
                                        <td><label>"1"</label></td>
                                        <td>First Time</td>
                                    </tr>
                                    <tr>
                                        <td><label>V</label></td>
                                        <td>Visor</td>
                                    </tr>
                                    <tr>
                                        <td><label>SB</label></td>
                                        <td>Sheepskin Browband</td>
                                    </tr>
                                    <tr>
                                        <td><label>"2"</label></td>
                                        <td>Replaced</td>
                                    </tr>
                                    <tr>
                                        <td><label>"-"</label></td>
                                        <td>Removed</td>
                                    </tr>
                                    <tr>
                                        <td><label>XB</label></td>
                                        <td>Crossed Nose Band</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/horse-details-table-section.blade.php ENDPATH**/ ?>