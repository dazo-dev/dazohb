<div class="user-profile">
    @php
        $mail = Auth::user()->email;

        preg_match("/(.)(.*?)@(.*)/", $mail, $Match);

        $str = $Match[1] . str_pad("", strlen($Match[2]), "*"). "@" . $Match[3];       
       
    @endphp
    <div class="container display-flex display-block-mb" style="font-family: Roboto">
        <div class="col-lg-5 col-sm-12">
            <div class="row user-details" style="">
                <div class="col-sm-12">
                    <h3>My Profile</h3>
                </div>
                 @csrf
                <div class="col-sm 12">
                    <table style="width:100%;">
                    

                    <tr>
                    <td style="">Name: </td>
                    <td class="uname" style="width:50%;padding-left:3%;padding-left:3%;">{{ Auth::user()->name }}</td>
                    
                    </tr>

                    <tr>
                    <td style="">Birth Date: </td>
                    <td class="ubdate" style="width:50%;padding-left:3%;">{{ (Auth::user()->birthdate == "") ? "--" : Auth::user()->birthdate }}</td>
                    
                    </tr>

                    <tr>
                    <td style="">E-mail: </td>
                    <td style="width:50%;padding-left:3%;">{{ $str }}</td>
                    
                    </tr>

                    <tr>
                    <td style="">Mobile: </td>
                    <td class="umobile" style="width:50%;padding-left:3%;">{{ (Auth::user()->phone_number == "" ? "--" : Auth::user()->phone_number ) }}</td>
                    
                    </tr>

                    <tr>
                    <td style="">Subscription Type: </td>
                    <td style="width:50%;padding-left:3%;">{{ (Auth::user()->subscription_type == "" ? "--" : Auth::user()->subscription_type) }}</td>
                    
                    </tr>

                    <tr>
                    <td style="">Subscription Start: </td>
                    <td style="width:50%;padding-left:3%;">{{ (Auth::user()->sub_start == "" ? "--" : Auth::user()->sub_start) }}</td>
                    
                    </tr>

                    <tr>
                    <td style="">Subscription End: </td>
                    <td style="width:50%;padding-left:3%;">{{ (Auth::user()->sub_end == "" ? "--" : Auth::user()->sub_end) }}</td>
                    
                    </tr>

                    <tr>
                    <td style="">My Dazo Coins: </td>
                    <td style="width:50%;padding-left:3%;"><img src="images/DazoCoin-png.png" alt="" style="width:40px;"> {{ Auth::user()->coins }}</td>
                    
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
                            @foreach ($data['trans'] as $r)
                            <tr>
                                <td style="height: 40px; padding: 0px 10px;">{{ $r->trans_meta }}</td>
                                <td>{{ $r->trans_p_mode }}</td>
                                <td style="text-align:center;">{{ ($r->trans_amount == "" ? "--" : number_format($r->trans_amount,2)) }}</td>
                                <td style="text-align:center;">{{ $r->coins }}</td>
                                <td style="text-align:center;">{{ ($r->trans_package == "" ? "--" : $r->trans_package) }}</td>
                                <td style="text-align:center;">{{ $r->created_at }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>