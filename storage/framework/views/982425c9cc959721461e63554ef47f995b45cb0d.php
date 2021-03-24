<div class="user-profile">
    <?php
        $mail = Auth::user()->email;

        preg_match("/(.)(.*?)@(.*)/", $mail, $Match);

        $str = $Match[1] . str_pad("", strlen($Match[2]), "*"). "@" . $Match[3];       
       
    ?>
    <div class="container display-flex display-block-mb" style="font-family: Roboto">
        <div class="col-lg-5 col-sm-12">
            <div class="row user-details" style="">
                <div class="col-sm-12">
                    <h3>My Profile</h3>
                </div>
                 <?php echo csrf_field(); ?>
                <div class="col-sm 12">
                    <table style="width:100%;">
                    

                    <tr>
                    <td style="">Name: </td>
                    <td class="uname" style="width:50%;padding-left:3%;padding-left:3%;"><?php echo e(Auth::user()->name); ?></td>
                    
                    </tr>

                    <tr>
                    <td style="">Birth Date: </td>
                    <td class="ubdate" style="width:50%;padding-left:3%;"><?php echo e((Auth::user()->birthdate == "") ? "--" : Auth::user()->birthdate); ?></td>
                    
                    </tr>

                    <tr>
                    <td style="">E-mail: </td>
                    <td style="width:50%;padding-left:3%;"><?php echo e($str); ?></td>
                    
                    </tr>

                    <tr>
                    <td style="">Mobile: </td>
                    <td class="umobile" style="width:50%;padding-left:3%;"><?php echo e((Auth::user()->phone_number == "" ? "--" : Auth::user()->phone_number )); ?></td>
                    
                    </tr>

                    <tr>
                    <td style="">Subscription Type: </td>
                    <td style="width:50%;padding-left:3%;"><?php echo e((Auth::user()->subscription_type == "" ? "--" : Auth::user()->subscription_type)); ?></td>
                    
                    </tr>

                    <tr>
                    <td style="">Subscription Start: </td>
                    <td style="width:50%;padding-left:3%;"><?php echo e((Auth::user()->sub_start == "" ? "--" : Auth::user()->sub_start)); ?></td>
                    
                    </tr>

                    <tr>
                    <td style="">Subscription End: </td>
                    <td style="width:50%;padding-left:3%;"><?php echo e((Auth::user()->sub_end == "" ? "--" : Auth::user()->sub_end)); ?></td>
                    
                    </tr>

                    <tr>
                    <td style="">My Dazo Coins: </td>
                    <td style="width:50%;padding-left:3%;"><img src="images/DazoCoin-png.png" alt="" style="width:40px;"> <?php echo e(Auth::user()->coins); ?></td>
                    
                    </tr>

                    <tr>
                    <td colspan="2" style="text-align:center;">
                    <!-- <button class="btn btn-success" style="width:100%;margin:1% 5%;">My Transactions</button> -->
                    <button class="btn" id="btn-edit-profile" style="width:100%;margin:1% 0%; background-color: #E6581F;color:#fff" data-toggle="modal" data-target="#editprofileModal">Edit Profile</button>
                    <button class="btn" id="btn-change-mobile" style="width:100%;margin:1% 0%; background-color: #E6581F;color:#fff" data-toggle="modal" data-target="#changemobileModal">Change Mobile</button>
                    <button class="btn" id="btn-change-pass" style="width:100%;margin:1% 0%; background-color: #E6581F;color:#fff" data-toggle="modal" data-target="#changepassModal">Change Password</button>
                    <button class="btn" id="btn-change-email" style="width:100%;margin:1% 0%; background-color: #E6581F;color:#fff" data-toggle="modal" data-target="#changemailModal">Change Email</button></td>
                    </tr>
                </table>
                </div>
                
            
            </div>
        </div>
        <div class="col-lg-7 col-sm-12 transCol-mb transCol" >
            
            <div class="row transaction-details">
                <div class="col-sm-12">
                    <h3>My Transactions</h3>
                </div>
                <div class="col-sm-12">
                    <table id="tblMyTrans" class="display nowrap" style="width:100%; font-size:13px;">
                        <thead>
                            <tr>
                                <th><strong>TRANSACTIONS</strong></th>
                                <th><strong>TYPE</strong></th>
                                <th style="text-align:center;"><strong>AMOUNT</strong></th>
                                <th style="text-align:center;"><strong>COINS</strong></th>
                                <th style="text-align:center;"><strong>PACKAGE</strong></th>
                                <th style="text-align:center;"><strong>TRANSASCTION DATE</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data['trans']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="height: 40px; padding: 0px 10px;"><?php echo e($r->trans_meta); ?></td>
                                <td><?php echo e($r->trans_p_mode); ?></td>
                                <td style="text-align:center;"><?php echo e(($r->trans_amount == "" ? "--" : number_format($r->trans_amount,2))); ?></td>
                                <td style="text-align:center;"><?php echo e($r->coins); ?></td>
                                <td style="text-align:center;"><?php echo e(($r->trans_package == "" ? "--" : $r->trans_package)); ?></td>
                                <td style="text-align:center;"><?php echo e($r->created_at); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/profile-section.blade.php ENDPATH**/ ?>