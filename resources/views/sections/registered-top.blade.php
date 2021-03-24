	<div class="row calendar-empty">
		<div class="col-sm-6 col-lg-6 col-12 left-block">
			<header>
			  	<div class="title-content">
				    <button id="last"></button>
				    	<span>
						    <h1 id="month"></h1>
						</span>
				    <button id="next"></button>
			  	</div>
			</header>
			<div class="ci-cal-container" id="calendar"></div>
			

			<div class="row u-calendar" style="background-color: unset;">
				<div class="col-12 f-12 p-0 display-flex">
					<div class="col-sm-6">
						<div class="race-result"></div> WITH RACE RESULTS
					</div>
					<div class="col-sm-6">
						<div class="upcoming-events"></div> UPCOMING EVENTS
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-6 col-12 right-block">
			<div class="right-content">
				<h2 class="m-t-25" style="font-size: 25px">Purchase a daily subscription package<br> to view the Race Program </h2>
				<button class="show-subscribe">LEARN MORE</button>
			</div>
		</div>
	</div>

	<div class="row coin-purchase" style="background-color: black; padding: 40px 100px; display: none">
		<h3 style="font-weight: bold; font-family: Roboto; font-style: italic;">Choose Subscription Package</h3>
		<div class="row col-sm-12 col-lg-12">
			<div class="col-sm-6 col-lg-6 col-12">
				<p>Daily Subscription Package</p>
				<table style="width: 100%">
					<tr>
						<td><input type="checkbox" class="non-pro" name="subamt" value="one" target-amt="20" target-opt="1 Day">&nbsp&nbsp1 Day</td>
						<td><img src="images/DazoCoin-png.png" style="width: 25px">&nbsp20</td>
					</tr>
					<tr>
						<td><input type="checkbox" class="non-pro" name="subamt" value="two" target-amt="40" target-opt="2 Days">&nbsp&nbsp2 Days</td>
						<td><img src="images/DazoCoin-png.png" style="width: 25px">&nbsp40</td>
					</tr>
				</table>
				<input type="date" class="form-control start-date" min="{{ now()->toDateString('Y-m-d') }}" style="margin-top: 25px; width: 400px;display: none">
				<input type="date" class="form-control end-date" min="{{ now()->toDateString('Y-m-d') }}" style="margin-top: 10px; width: 400px;display: none">
				<p style="margin-top: 25px">Additional Pro Subscription(Optional)</p>
				<table style="width: 100%">
					<tr>
						<td><input type="checkbox" class="pro" name="subpro" value="month" target-amt="300" target-opt="Monthly">&nbsp&nbspMonthly</td>
						<td><img src="images/DazoCoin-png.png" style="width: 25px">&nbsp300</td>
					</tr>
					<tr>
						<td><input type="checkbox" class="pro" name="subpro" value="year" target-amt="1000" target-opt="Yearly">&nbsp&nbspYearly</td>
						<td><img src="images/DazoCoin-png.png" style="width: 25px">&nbsp1000</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-6 col-lg-6 col-12">
				<h5 style="font-weight: bold; font-family: Roboto; font-style: italic;">Payment Summary</h5>
				<p style="margin-top: 30px">SUBSCRIPTION PACKAGES</p>
				<div class="payment-summary">
					<table style="width: 100%">
						<tr>
							<td>Daily Packages: <b class="dpackage"></b></td>
							<td style=" text-align: right; "><img src="images/DazoCoin-png.png" style="width: 25px">&nbsp<b class="total-d-amt">0</b></td>
						</tr>
						<tr>
							<td>Additional Pro Subscription: <b class="ppackage"></b></td>
							<td style=" text-align: right; "><img src="images/DazoCoin-png.png" style="width: 25px">&nbsp<b class="total-p-amt">0</b></td>
						</tr>
					</table>
				</div>
				<div style="width: 100%;border-bottom: 10px;height: 0vh;border: 1px solid #333333;margin-top: 0px;margin-bottom: 5px;"></div>
				<table style="width: 100%">
					<tr>
						<td>Total Amount</td>
						<td style=" text-align: right; "><img src="images/DazoCoin-png.png" style="width: 25px">&nbsp<b class="total-amt"></b></td>
					</tr>
				</table>
				<button type="button" class="form-control btn btn-info btn-subscribe" style="margin-top: 40px; font-size: 12px" disabled>Purchase Subscription</button>
				<div class="error-funds" style=" margin-top: 10px; background-color: red; padding: 2% 5%;display: none">
					Warning! Insufficient Funds.
				</div>
			</div>
		</div>
		
	</div>
	
{{-- <div class="right-header row">
				@if( Auth::user()->is_subscribed == 0)
					<p>{{ date('F d, Y') }}</p>
				@else
					<div class="col-sm-6 col-md-6 col-lg-6 col-12 temp-race-btn" target-action="previous-result" style="cursor: pointer">
						<p class="temp-date-sect">{{ date('F d, Y',(strtotime ( '-1 day' , strtotime ( date('F d, Y') ) ) )) }}</p>
					</div>
					<div class="col-sm-6 col-md-6 col-lg-6 col-12 temp-race-btn active-race-date" target-action="current-result" style="cursor: pointer">
						<p  class="temp-date-sect cur_date">{{ date('F d, Y') }}</p>
					</div>
				@endif
				
			</div> --}}
{{-- @if( $data['dailySub'] == 0)
				
			@else
				<div class="right-content" style="padding: 0">
					<div class="previous-result race-temp-result">
						@forelse($data['preDResults'] as $result)
						    <div class="row race-row">
								<div class="col-lg-3 col-md-3 col-sm-3 col-12">
									<h3 class="race-col">Race {{ isset($result->race_id)}}</h3>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9 col-12" style="padding: 0">
									<h3 class="sched-col">
										<span>
											{{ isset($result->race_time) }}
										</span>
											<i>&bull;</i> 
										<span>{{ isset($result->track_length) }}M</span>
											<i>&bull;</i>
										<span>{{ isset($result->race_type) }}</span> 
											<i>&bull;</i> 
										<span>{{ isset($result->class_name) }}</span>
									</h3>
								</div>
							</div>
							<button class="full-race-btn" style="width: 95%;padding: 1% 5%;background-color: #0D6499;margin: 1% 5%;height: 5vh; text-transform: uppercase;">view full race program</button>
						@empty
						    <div class="row race-row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<h3 class="race-col">No Race Found</h3>
								</div>
							</div>
						@endforelse
					</div>
					<div class="current-result race-temp-result">
						@php
							var_dump($data['curDResults'])
						@endphp
						@forelse($data['curDResults'] as $result)
						    <div class="row race-row">
								<div class="col-lg-3 col-md-3 col-sm-3 col-12">
									<h3 class="race-col">Race {{$result->r_num}}</h3>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9 col-12" style="padding: 0">
									<h3 class="sched-col">
										<span>
											{{ date("g:i a", strtotime($result->r_time)) }}
										</span>
											<i>&bull;</i> 
										<span>{{ $result->r_length }}M</span>
											<i>&bull;</i>
										<span>{{ $result->r_t_type }}</span> 
											<i>&bull;</i> 
										<span>{{ $result->r_group }}</span>
									</h3>
								</div>
							</div>
							
						@empty
						    <div class="row race-row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<h3 class="race-col">No Race Found</h3>
								</div>
							</div>
						@endforelse
						@if ($data['curDResults'] != null)
							<button class="full-race-btn" style="width: 95%;padding: 1% 5%;background-color: #0D6499;margin: 1% 5%;height: 5vh; text-transform: uppercase;">view full race program</button>
						@endif
						
					</div>
					
				</div>
			@endif --}}