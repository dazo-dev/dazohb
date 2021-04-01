	<div class="row calendar-empty">

		<div class="col-lg-6 col-xl-6 col-12 left-block">

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


			<div class="u-calendar d-flex">

				<div class="legends d-flex my-auto">

					<div class="race-result"></div> WITH RACE RESULTS

				</div>

				<div class="legends d-flex my-auto">

					<div class="upcoming-events"></div> UPCOMING EVENTS

				</div>

			</div>

		</div>

		<div class="col-lg-6 col-xl-6 col-12 right-block">

			<div class="header">{{ \Carbon\Carbon::now()->isoFormat('MMMM, d YYYY') }}</div>

			<div class="right-content">

				<h2>Subscribe to see Race Schedule</h2>

				<button onclick="location.href='{{ route('subscription-packages') }}';">LEARN MORE</button>

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