<div class="horses-section">
        <table class="search-horse-area">
            <tr>
                <td>
                    <div class="input-group">
                      <span class="input-group-addon" style="padding: 7px 2%;border-color: #262626;"><i class="fas fa-search" style="color: #fff;"></i></span>
                      <input id="horseInput" type="text" class="form-control horse_name" name="jorseinput" placeholder="Search Horse">
                    </div>
                </td>
                <td>
                    <button class="form-control horse-btn">SEARCH</button>
                </td>
                <td width="50%"></td>
                <!-- <td>
                    <select class="form-control select-season select-horse-season">
                        <option>All Records</option>
                        <option value="<?php echo e(date("Y")); ?>">Current Year</option>
                        <option value="<?php echo e(date("Y",strtotime("-1 year"))); ?>">Previous Year</option>
                    </select>
                </td> -->
                
            </tr>
        </table>
    </div>
    <div class="table-horse-container">
        
       
       
        
       
            <div class="table-dp-sorter display-flex">
            <label class="t-spacing">SORT BY:</label>
            <select class="form-control filter-horses">
                <option value="name-asc">Name, Ascending Order</option>
                <option value="name-desc">Name, Descending Order</option>
                <option value="weight-asc">Weight, Lowest to Highest</option>
                <option value="weight-desc">Weight, Highest to Lowest<</option>
                <option value="time-asc">Time, Lowest to Highest</option>
                <option value="time-desc">Time, Highest to Lowest</option>
            </select>
        </div>
            <table id="horseTable" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Horse Name</th>
                        <th>Horse Sex</th>
                        <th>Horse Age</th>
                        <th>Horse Color</th>
                        <th>Weight</th>
                        <th>Jockey Name</th>
                        <th>JRTE</th>
                        <th>Owner Name</th>
                        <th>Trainer Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['horses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="text-transform: capitalize;">
                                <a href="<?php echo e(url('horsedetails', $id = $result->id)); ?>">
                                    <?php echo e($result->h_name); ?>

                                </a>
                            </td>
                            <td><?php echo e($result->h_sex); ?></td>
                            <td><?php echo e($result->h_age); ?></td>
                            <td><?php echo e($result->h_color); ?></td>
                            <td><?php echo e($result->h_weight); ?></td>
                            <td>
                                <a href="<?php echo e(url('jockeydetails', $id = $result->h_j_id)); ?>"><?php echo e($result->j_name); ?>

                                </a>
                            </td>
                            <td><?php echo e($result->j_jrte); ?></td>
                            <td>
                            <a href="<?php echo e(url('ownerdetails', $id = $result->h_o_id)); ?>"><?php echo e($result->o_name); ?>

                                </a>
                            </td>
                           
                            <td>
                            <a href="<?php echo e(url('trainerdetails', $id = $result->h_t_id)); ?>"><?php echo e($result->t_name); ?>

                                </a>
                            </td>
                           
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </tbody>
            </table>
        
       
    </div>
</div><?php /**PATH D:\xampp\htdocs\dazobh\resources\views/sections/horse-list-section.blade.php ENDPATH**/ ?>