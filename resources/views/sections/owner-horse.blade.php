<div class="jockey-details-table-section" style="
    color: #fff;
    background-color: #121212;
    padding: 1% 10%;
">
	{{-- <div class="row">
		<div class="col-sm-9">
			<h3 style="font-size: 15px;">SUMMARY OF 20/221 SEASON (UP TO RACE MEETING OF 04/10/2020)</h3>
		</div>
		<div class="col-sm-3">
			<select class="form-control" >
                <option value="cur-month">This Month</option>
                <option value="prev-month">Last Month</option>
			</select>
		</div>
	</div>
	

    <div class="row">
        <div class="col-sm-6 p-0">        
            <table style="width: 100%;">
                <tr style="border: solid 1px #151515; padding: 2% 5%">
                    <td style="width: 25%; padding: 1% 2%; background-color: #181818">Stakes Won</td>
                    <td style="width: 25%; background-color: #001E32; padding: 1% 2%;"> </td>
                </tr>
                <tr>
                    <td style="width: 25%; padding: 1% 2%; background-color: #181818;">Number of Wins</td>
                    <td style="width: 25%; background-color: #001E32; padding: 1% 2%;">{{ $data['wins1'] }}</td>
                </tr>
                <tr>
                    <td style="width: 25%; padding: 1% 2%; background-color: #181818;">No. of Winss in Past 10 days</td>
                    <td style="width: 25%; background-color: #001E32; padding: 1% 2%;"></td>
                </tr>
                <tr>
                    <td style="width: 25%; padding: 1% 2%; background-color: #181818;">Number of 2nds</td>
                    <td style="width: 25%; background-color: #001E32; padding: 1% 2%;">{{ $data['wins2'] }}</td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6 p-0">
            <table style="width: 100%;">
                <tr style="border: solid 1px #151515; padding: 2% 5%">
                    <td style="width: 25%; padding: 1% 2%; background-color: #181818;">avg. JKC Points in Past 10 race days</td>
                    <td style="width: 25%; background-color: #001E32; padding: 1% 2%;">37.0</td>
                </tr>
                <tr style="border: solid 1px #151515; padding: 2% 5%">
                    <td style="width: 25%; padding: 1% 2%; background-color: #181818;">Number of 3rds</td>
                    <td style="width: 25%; background-color: #001E32; padding: 1% 2%;">{{ $data['wins3'] }}</td>
                </tr>
                <tr style="border: solid 1px #151515; padding: 2% 5%">
                    <td style="width: 25%; padding: 1% 2%; background-color: #181818;">Total Rides</td>
                    <td style="width: 25%; background-color: #001E32; padding: 1% 2%;">{{ $data['rcount'] }}</td>
                </tr>
                <tr style="border: solid 1px #151515; padding: 2% 5%">
                    <td style="width: 25%; padding: 1% 2%; background-color: #181818;">Win %</td>
                    <td style="width: 25%; background-color: #001E32; padding: 1% 2%;">{{ ($data['wins1']) * $data['rcount'] }} %</td>
                </tr>
            </table>
        </div>
    </div> --}}

	<div class="col-sm-12" style="margin-top: 5%">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="horsename-form-title">{{-- {{ $data['j_name'] }} --}}</h2>
            </div>
            {{--<div class="col-sm-6 display-flex div-sort-label-mb">
                <div class="col-6" style="padding-right: 0;"><label class="sort-label" for="">CHOOSE YEAR:</label></div>
                <div class="col-6" style="padding-left: 0;">
                   
                    <select id="select-jockey-year" class="form-control filter-season select-jockey-year" target-id="{{$data['jInfo'][0]->id}}">
                        <option value="allyear">ALL YEAR</option>
                        @foreach ($data['jockeyYears'] as $result)
                        <option value="{{$result->ryears}}">{{$result->ryears}}</option>
                        @endforeach
                    </select>
                </div>
            </div>--}}
        </div>

        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 takeover-col-3-mb">
                <h5 class="season-header">HORSES OWNED</h5>
            </div>
            
            {{--<div class="col-lg-9 col-sm-12 display-block-mb" style="display:inline-flex;">
                <!-- <table class="m-l-0-mb w-100-mb" style="width: 38%;margin-left: 35%;">
                	<tr>
                		<td class="t-a-r t-a-l points-width-mb">JOCKEY CHALLENGE POINTS:</td>
                        <td>42</td>
                		
                	</tr>
                </table> -->
                <table id="tbljwins" class="w-100-mb">
                @foreach ($data['jInfo'] as $result)
                    <tr>
                        <td class="t-a-r t-a-l win-width-mb">WINS:</td>
                		<td>{{ $result->wins1 }}</td>
                		<td class="t-a-r t-a-l win-width-mb">2nd:</td>
                		<td>{{ $result->wins2 }}</td>
                		<td class="t-a-r t-a-l win-width-mb">3rd:</td>
                		<td>{{ $result->wins3 }}</td>
                   
                    </tr>
                 @endforeach
                </table>
            </div>--}}
        </div>
        <div class="row">
            <div class="col-12">
                <table id="tblownerhorse" class="table-season-details table-bordered">
                    <thead>
                        <th>Horse</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Color</th>
                        <th>Weight</th>
                        <th>Jockey</th>
                        <th>JRTE</th>
                        <th>Trainer</th>
                    </thead>
                    <tbody>
                        @foreach ($data['ownerHorse'] as $result)
                            <tr>
                                <td>
                                <a href="{{url('horsedetails', $id = $result->id)}}">
                                        {{ $result->h_name }}
                                    </a>
                                </td>
                                <td>{{ $result->h_sex }}</td>
                                <td>{{ $result->h_age }}</td>
                                <td>{{ $result->h_color }}</td>
                                <td>{{ $result->h_weight }}</td>
                                <td>
                                    <a href="{{url('jockeydetails', $id = $result->h_j_id)}}">
                                        {{ $result->j_name }}
                                    </a>
                                </td>
                                
                                <td>{{ $result->j_jrte }}</td>
                                <td>
                                    <a href="{{url('trainerdetails', $id = $result->h_t_id)}}">
                                        {{ $result->t_name }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>