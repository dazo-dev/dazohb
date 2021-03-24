<div class="jockey-section">
        <table class="search-jockey-area">
            <tr>
                <td>
                    <div class="input-group">
                      <span class="input-group-addon" style="padding: 7px 2%;border-color: #262626;"><i class="fas fa-search" style="color: #fff;"></i></span>
                      <input id="jockeyInput" type="text" class="form-control jockey_search" name="jockeyinput" placeholder="Search Jockey">
                    </div>
                </td>
                <td>
                    <button class="form-control jockey-btn">SEARCH</button>
                </td>
                <td width="50%"></td>
                <td>
                    <select class="form-control select-jockey-season select-season">
                        <option>All Records</option>
                        <option value="<?php echo e(date("Y")); ?>">Current Year</option>
                        <option value="<?php echo e(date("Y",strtotime("-1 year"))); ?>">Previous Year</option>
                    </select>
                </td>
                
            </tr>
        </table>
    </div>
    <div class="table-jockey-container">      
        <div class="table-dp-sorter display-flex">
            <label>SORT BY:</label>
            <select class="form-control filter-jockey">
                <option value="total-rides-desc">Ranking, Highest to Lowest</option>
                <option value="total-rides-asc">Ranking, Lowest to Highest</option>
                <option value="total-win-desc">Win, Highest to Lowest</option>
                <option value="total-win-asc">Win, Lowest to Highest</option>
                <option value="total-stake-desc">Stake, Highest to Lowest</option>
                <option value="total-stake-asc">Stake, Lowest to Highest</option>
            </select>
        </div>
        
        <table id="jockeyTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Nationality</th>
                    <th>JRTE</th>
                    <th>Total Races</th>
                    <th>Number of Wins</th>
                    <th>Number of 2nds</th>
                    <th>Number of 3rds</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data['jList']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a class="j-id" href="<?php echo e(url('jockeydetails', $id = $result->id)); ?>"><?php echo e($result->j_name); ?></a></td>
                        <td><?php echo e($result->j_sex); ?></td>
                        <td><?php echo e($result->j_age); ?></td>
                        <td><?php echo e($result->j_nation); ?></td>
                        <td><?php echo e($result->j_jrte); ?></td>
                        <td><?php echo e($result->totalrace); ?></td>
                        <td><?php echo e($result->wins1); ?></td>
                        <td><?php echo e($result->wins2); ?></td>
                        <td><?php echo e($result->wins3); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        
        </table>
    </div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/jockey-list-section.blade.php ENDPATH**/ ?>