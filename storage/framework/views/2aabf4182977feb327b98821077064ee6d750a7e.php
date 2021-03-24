<div class="trainer-section p-t-1">
        <table class="search-trainer-area" style="width:50%;">
            <tr>
                <td>
                    <div class="input-group">
                      <span class="input-group-addon" style="padding: 7px 2%;border-color: #262626;"><i class="fas fa-search" style="color: #fff;"></i></span>
                      <input id="trainerInput" type="text" class="form-control trainer_search" name="trainerinput" placeholder="Search Trainer">
                    </div>
                </td>
                <td>
                    <button class="form-control trainer-btn">SEARCH</button>
                </td>
                
                
                
            </tr>
        </table>
    </div>
    <div class="table-trainer-container">      
       
        
        <table id="trainerTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Nationality</th>
                    <th>Total Races</th>
                    <th>Number of Wins</th>
                    <th>Number of 2nds</th>
                    <th>Number of 3rds</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data['trainer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a class="t-id" href="<?php echo e(url('trainerdetails', $id = $result->id)); ?>"><?php echo e($result->t_name); ?></a></td>
                        <td><?php echo e($result->t_sex); ?></td>
                        <td><?php echo e($result->t_age); ?></td>
                        <td><?php echo e($result->t_nation); ?></td>
                        <td><?php echo e($result->totalraces); ?></td>
                        <td><?php echo e($result->wins1); ?></td>
                        <td><?php echo e($result->wins2); ?></td>
                        <td><?php echo e($result->wins3); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        
        </table>
    </div>
</div> <?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/trainer-list.blade.php ENDPATH**/ ?>