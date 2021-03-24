<div class="horse-details-table-section">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-6 full-width-mb">
                <h2 class="horsename-form-title">{{-- {{ $data['h_name'] }} --}} RACE RECORD</h2>
            </div>
            <div class="col-6 display-flex full-width-mb">
                <div class="col-6" style="padding-right: 0;"><label class="sort-label" for="">CHOOSE YEAR:</label></div>
                <div class="col-6" style="padding-left: 0;">
                    <select class="form-control filter-season" id='horse-filter-season' target-id="{{ $data['horseDetails'][0]->id }}">
                        <option value="CURRENT YEAR">Current Year</option>
                        <option value="LAST YEAR">Last Year</option>
                        {{-- <option value="last-three-season">Last 3 Year</option> --}}
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
                        @foreach ($data['horseRaceCurrent'] as $result)
                            <tr>
                            <td>{{ $result->r_date }}</td>
                                <td>{{ $result->r_track }}</td>
                                <td>{{ $result->r_length }}</td>
                                <td>@if($result->r_t_type == null) {{'--'}} @else {{$result->r_t_type}} @endif</td>
                                <td>{{ $result->r_group }}</td>
                                <td>
                                    <a href="{{url('jockeydetails', $id = $result->j_id)}}">
                                        {{ $result->j_name }}
                                    </a>
                                </td>
                                <td>{{ $result->h_weight }}</td>
                                <td>{{ $result->h_pos }}</td>
                                <td> @if($result->h_half == null) {{'--'}} @else {{$result->h_half}} @endif</td>
                                <td>@if($result->h_quarter == null) {{'--'}} @else {{$result->h_quarter}} @endif </td>
                                <td>{{ $result->h_f_time }}</td>
                                <td><a href="//{{ $result->r_replay }}" target="_blank">
                                    <button><span class="fa fa-play"></span></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>


        {{--<div class="row season last-two-season" id="last-two-season">
            <div class="col-12">
                <h5 class="season-header">PREVIOUS YEAR</h5>
            </div>
        </div>
        <div class="row season last-two-season" id="last-two-season">
            <div class="col-12 table-wrapper">
                <table id="prev-season" class="table-season-details table-bordered">
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
                    <tbody>
                        @foreach ($data['horseRacelastTwo'] as $result)
                            <tr>
                               <td>{{ $result->r_date }}</td>
                                <td>{{ $result->r_track }}</td>
                                <td>{{ $result->r_length }}</td>
                                <td>--</td>
                                <td>{{ $result->r_group }}</td>
                                <td>
                                    <a href="{{url('jockeydetails', $id = $result->j_id)}}">
                                        {{ $result->j_name }}
                                    </a>
                                </td>
                                <td>{{ $result->h_weight }}</td>
                                <td>{{ $result->h_pos }}</td>
                                <td>{{ $result->h_half }}</td>
                                <td>{{ $result->h_quarter }}</td>
                                <td>{{ $result->h_f_time }}</td>
                                <td><a href="{{ $result->r_replay }}">
                                    <button><span class="fa fa-play"></span></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>--}}


       {{-- <div class="row season last-three-season" id="last-three-season">
            <div class="col-12">
                <h5 class="season-header">SEASON 18/19</h5>
            </div>
        </div>
        <div class="row season last-three-season" id="last-three-season">
            <div class="col-12 table-wrapper">
                <table id="prev-season2" class="table-season-details table-bordered">
                    <thead>
                       <th>Race Index</th>
                        <th>Place</th>
                        <th>Date</th>
                        <th>RC/Track/Course</th>
                        <th>Dist.</th>
                        <th>G</th>
                        <th>Race Class</th>
                        <th>Rtg.</th>
                        <th>Trainer</th>
                        <th>Jockey</th>
                        <th>LBW</th>
                        <th>Actual Weight</th>
                        <th>Running Position</th>
                        <th>Finish Time</th>
                        <th>Video Replay</th>
                        <th>Season</th>
                    </thead>
                    <tbody>
                         @foreach ($data['horseRacelastTwo'] as $result)
                            <tr>
                                <td>{{ $result->er_id }}</td>
                                <td>{{ $result->er_position }}</td>
                                <td>{{ $result->er_date }}</td>
                                <td>
                                    {{ $result->rc_name }}/
                                    {{ $result->track_name }}/
                                    "{{ $result->course_name }}"
                                </td>
                                <td>{{ $result->race_distance }}</td>
                                <td>{{ $result->gate }}</td>
                                <td>{{ $result->race_class }}</td>
                                <td>{{ $result->er_rtg }}</td>
                                <td>{{ $result->trainer_name }}</td>
                                <td>
                                    <a href="{{url('jockeydetails', $id = $result->er_jockey)}}">
                                        {{ $result->jockey_name }}
                                    </a>
                                </td>
                                <td>{{ $result->er_lbw }}</td>
                                <td>{{ $result->er_ha_weight }}</td>
                                <td>{{ $result->er_r_post }}</td>
                                <td>{{ $result->er_finishing_time }}</td>
                                <td><button><span class="fa fa-play"></span></button></td>
                                <th>{{ $result->er_season }}</th>
                            </tr>
                        @endforeach

                        
                    </tbody>
                </table>
            </div>
        </div>--}}

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
</div>