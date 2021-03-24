<div class="owner-section">
        <table class="search-owner-area" style="width:50%;">
            <tr>
                <td>
                    <div class="input-group">
                      <span class="input-group-addon" style="padding: 7px 2%;border-color: #262626;"><i class="fas fa-search" style="color: #fff;"></i></span>
                      <input id="ownerInput" type="text" class="form-control owner_search" name="ownerinput" placeholder="Search Owner">
                    </div>
                </td>
                <td>
                    <button class="form-control owner-btn">SEARCH</button>
                </td>
                
                
                
            </tr>
        </table>
    </div>
    <div class="table-owner-container">      
       
        
        <table id="ownerTable" class="table table-striped table-bordered">
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
                <?php $__currentLoopData = $data['owners']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a class="o-id" href="<?php echo e(url('ownerdetails', $id = $result->id)); ?>"><?php echo e($result->o_name); ?></a></td>
                        <td><?php echo e($result->o_sex); ?></td>
                        <td><?php echo e($result->o_age); ?></td>
                        <td><?php echo e($result->o_nation); ?></td>
                        <td><?php echo e($result->totalraces); ?></td>
                        <td><?php echo e($result->wins1); ?></td>
                        <td><?php echo e($result->wins2); ?></td>
                        <td><?php echo e($result->wins3); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        
        </table>
    </div>
</div> <?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/owner-list.blade.php ENDPATH**/ ?>