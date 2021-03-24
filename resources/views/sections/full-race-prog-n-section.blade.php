<div class="col-sm-12 full-race-prog-container">
    <div class="main-container">
        <div class="col-sm-12 row-header d-inline-flex p-0">
            <div class="col-lg-6 col-sm-12 p-0">
                @php
                    $a = substr("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1);
                @endphp
                @if ( date("Y-m-d") == date("Y-m-d",strtotime(str_replace('-','/', $a))) )
                    <h2 class="p-t-5 full-prog-header">Full Race Program</h2>
                @else
                    <h2 class="p-t-5 full-prog-header">Race Result</h2>
                @endif
            </div>
            <div class="col-lg-6 d-inline-flex p-0">
                <div class="col-sm-12 p-0">                      
                    <div class="btn-container">

                        <table style="width:100%;">
                            <tr>
                                @if ($data['resCount'] > 0)

                                    <td>
                                        <button class="btn-r-res btn-date-switch" style="width: 100% !important">
                                            <h5>{{ $data['slug'] != null ? date('F d, Y',(strtotime ( $data['slug'] ) )) : date('F d, Y',(strtotime ( date('Y-m-d') ) )) }}</h5>
                                            @php
                                                $a = substr("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1);
                                            @endphp
                                            @if( ctype_alpha($a) )
                                                <p>RACE RESULT</p>
                                            
                                            @elseif ( date("Y-m-d") >= date("Y-m-d",strtotime(str_replace('-','/', $a))) )
                                                <p>RACE RESULT</p>

                                            @else
                                                <p>RACE PROGRAM</p>
                                            @endif
                                        </button>
                                    </td>
                                @endif
                                @if ($data['ractiveCount'] > 0)
                                    <td>
                                        <button class="active btn-r-cur btn-date-switch" target-section="previous-accordion" style="width: 100% !important">
                                            <h5>
                                            {{ $data['slug'] != null ? date('F d, Y',(strtotime ( $data['slug'] ) )) : date('F d, Y',(strtotime ( date('Y-m-d') ) )) }}
                                            </h5>
                                            @php
                                                $a = substr("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1);
                                            @endphp
                                            @if( ctype_alpha($a) )
                                                <p>RACE PROGRAM</p>
                                            
                                            @elseif ( date("Y-m-d") >= date("Y-m-d",strtotime(str_replace('-','/', $a))) )
                                                <p>RACE RESULT</p>

                                            @else
                                                <p>RACE PROGRAM</p>
                                            @endif
                                        </button>
                                    </td>
                                @endif
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


        <div class="col-sm-12 row-header d-inline-flex" style="background-color: #171717; width: 100%; height: 15vh; margin-top: 1%; padding: 20px 35px;">
            <div class="col-lg-4 col-sm-12 p-0">
                <img src="{{url('/')}}/images/DazoCoin-png.png" style="float: left;">
                <h5 style="padding-top: 10px; font-size: 15px">Your subscription will end in<br>
                    <p style="color: #E6581F; font-size: 25px">{{ $data['subscriptionEnd'] }} days</p>
                </h5>
            </div>    
        </div>

        @if($data['ractiveCount'] > 0)
            <div class="col-sm-12 race-main-table accord-sect row-race-accordion hidden-r-program" style="margin-top: 1% !important;">
                @php
                    $a = substr("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1);
                @endphp
                @if ( date("Y-m-d") == date("Y-m-d",strtotime(str_replace('-','/', $a))) || ctype_alpha($a) )
                    <div class="announcement" style="background-color: #fff;color: #000;height: 30vh;min-height: 30vh;padding: 45px 15px 15px 35px; overflow-y: auto;">
                        <div style="position: absolute; background-color: gray; top: 0px; left: 50px; height: 6vh; padding: 10px; font-size: 17px; font-weight: bold; color: #fff;">ANNOUNCEMENTS</div>
                        @forelse($data['curDResults'] as $result)
                            @if ($result->r_status == 1)
                                <label style="color: #0D6499"><strong>Race {{$result->r_num}}</strong></label>
                                @php
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
                                @endphp
                            @endif
                        @endforeach
                    </div>
                @endif
               
                
                <div class="sect-cur">
                    @forelse($data['curDResults'] as $result)
                        @if($result->r_status == 1)
                            <button class="accordion frp-sect hid-btn-cur display-flex display-block-mb" target-race="{{$result->id}}" target-date="{{$result->r_date}}">
                            <div>    
                            <span class="fas fa-angle-right"></span>
                                <span class="race-num">&nbsp RACE {{$result->r_num}}</span>
                                </div>
                                <div>
                                <span class="race-time">&nbsp • {{ date("g:i a", strtotime($result->r_time)) }}</span>
                                <span class="race-distance">&nbsp • {{ $result->r_length }} M</span>
                                @foreach (unserialize($result->rd_x_bet) as $data)
                                    <span class="x-bet">&nbsp • {{ $data }}</span>
                                @endforeach
                                <span class="race-age">&nbsp • {{ $result->r_group }}</span>
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
                                    <div class="col-lg-12 col-sm-12 p-t-1 tip-r p-l-0" style="padding-left: 35px;padding-bottom: 10px;">
                                        <div class="col-lg-4 col-sm-12 col-b p-l-0" style="padding-left: 0px;"></div>
                                        <div class="col-lg-4 col-sm-12 col-r p-l-0" style="padding-left: 100px;"></div>
                                        <div class="col-lg-4 col-sm-12 col-y p-l-0" style="padding-left: 200px;"></div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <button class="accordion frp-sect-result hid-btn display-flex display-block-mb" target-race="{{$result->id}}" target-date="{{$result->r_date}}" style="display: none">
                                <div>
                                <span class="fas fa-angle-right"></span>
                                <span class="race-num">&nbsp RACE {{$result->r_num}}</span>
                                </div>
                                <div>
                                <span class="race-track-type">&nbsp • {{ $result->r_track }}</span>
                                <span class="race-distance">&nbsp • {{ $result->r_length }} M</span>
                                <span class="race-track-type">&nbsp • {{ $result->r_t_type }}</span>
                                <span class="race-age">&nbsp • {{ $result->r_group }}</span>
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
                                    <div class="col-lg-12 col-sm-12 d-inline-flex p-t-1 b-res p-l-0" style="flex-wrap: wrap;padding-left: 35px;padding-bottom: 10px;">

                                    </div>
                                </div>
                                <div class="container m-0" style="overflow-x:scroll;">
                                <!-- <div class="row bet-row col-five" style="padding: 0px 25px;"> -->
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
                                    <table style="width: 100%;margin-top: 15px;margin-bottom: 15px;"><tr><td style="text-align: center;"><span><i class="fas fa-play-circle" style="color: orange"></i></span>
                                    @if ($result->r_replay != "")
                                        <a href="{{ $result->r_replay }}" target="_blank">View Replay</a>
                                    @else
                                        <a href="javascript:void(0)" class="no-vid">View Replay</a>
                                    @endif
                                </td></tr></table>
                                </div>
                            </div>
                            <!-- </div> -->
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>

            {{-- <div class="col-sm-12 race-main-table hidden-result row-race-accordion" style="margin-top: 1% !important; display: none">
                @foreach($data['hidDResults'] as $results)
                    <button class="accordion frp-sect-result" target-race="{{$results->r_num}}" target-date="{{$rresultseresultssult->r_date}}">
                        <span class="fas fa-angle-right"></span>
                        <span class="race-num">&nbsp RACE {{$results->r_num}}</span>
                        <span class="race-track-type">&nbsp • {{ $results->r_track }}</span>
                        <span class="race-distance">&nbsp • {{ $results->r_length }} M</span>
                        <span class="race-track-type">&nbsp • {{ $results->r_t_type }}</span>
                        <span class="race-age">&nbsp • {{ $results->r_group }}</span>
                    </button>
                    
                @endforeach
            </div> --}}
        @else
            <div class="col-sm-12 race-main-table accord-sect row-race-accordion" style="margin-top: 1% !important;">
                @forelse($data['yesDResults'] as $result)
                    <button class="accordion frp-sect-result display-flex display-block-mb" target-race="{{$result->id}}" target-date="{{$result->r_date}}">
                        <div>
                            <span class="fas fa-angle-right"></span>
                            <span class="race-num">&nbsp RACE {{$result->r_num}}</span>
                        </div>
                        <div>
                            <span class="race-track-type">&nbsp • {{ $result->r_track }}</span>
                            <span class="race-distance">&nbsp • {{ $result->r_length }} M</span>
                            <span class="race-track-type">&nbsp • {{ $result->r_t_type }}</span>
                            <span class="race-age">&nbsp • {{ $result->r_group }}</span>
                        </div>
                    </button>
                    <div class="panel hid-panel">
                        <div class="row bet-row col-five">
                            <div class="col-sm-12 d-inline-flex p-t-1 t-a-c" style="padding-left: 0px;">
                                <div class='main-bet-header'>

                                </div>
                            </div>
                        </div>
                        <div class="row bet-row col-five">
                            <div class="col-sm-12 d-inline-flex p-t-1 b-res p-l-0" style="flex-wrap: wrap;padding-left: 35px;padding-bottom: 10px;">
                            </div>
                        </div>
                        <div class="container m-0" style="overflow-x:scroll;">
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
                            <table style="width: 100%;margin-top: 15px;margin-bottom: 15px;"><tr><td style="text-align: center;"><span><i class="fas fa-play-circle" style="color: orange"></i></span>
                                @if ($result->r_replay != "")
                                    <a href="{{ $result->r_replay }}" target="_blank">View Replay</a>
                                @else
                                    <a href="javascript:void(0)" class="no-vid">View Replay</a>
                                @endif
                            </td></tr></table>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        @endif


    </div>
</div>