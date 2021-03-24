<div class="row subscribe-row">
	@php
		$stat = substr(url()->current(), strrpos(url()->current(), '/') + 1);
	@endphp


	<div class="col-sm-6 col-lg-6 col-12 daily-block {{ ($stat == 'subscription' ? 'subscription' : '')}}">
		<div class="col-12 box-daily-block">
			<div class="row">
				<div class="col-12">
				<h2>Daily Subscription</h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				<ul>
					<li> &nbsp Early Race Programs with Dividendazo Tips</li>
					<li> &nbsp Race Results with Dividends and Replays</li>
					<li> &nbsp Instant Video Replay after the Race</li>
					<li> &nbsp Make your own Race Card</li>
					<li> &nbsp Handicap Indicator per Entries</li>
					<li> &nbsp Find the nearest OTB in your location</li>
					<li> &nbsp Last 1 Race of Entries Chart</li>
				</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="daily-button">
						<button>
							<a href="">
								SUBSCRIBE FOR ONLY <img src="{{url('/')}}/images/DazoCoin-png.png"> 20
							</a>
						</button>
					</div>
				</div>
			</div>
		</div>
		
			<!-- <h2>Daily Subscription</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.</p> -->
			<!-- <ul>
				<li> &nbsp Early Race Programs with Dividendazo Tips</li>
				<li> &nbsp Race Results with Dividends and Replays</li>
				<li> &nbsp Instant Video Replay after the Race</li>
				<li> &nbsp Make your own Race Card</li>
				<li> &nbsp Handicap Indicator per Entries</li>
				<li> &nbsp Find the nearest OTB in your location</li>
				<li> &nbsp Last 1 Race of Entries Chart</li>
			</ul> -->
			<!-- <div class="daily-button">
				<button>
					<a href="">
						SUBSCRIBE FOR ONLY <img src="images/DazoCoin-png.png"> 20
					</a>
				</button>
			</div> -->
		</div>


	@if( $stat == 'subscription')
		<div class="col-sm-6 col-lg-6 col-12 right-s-block">
			<div class="accordion block-accordion" id="accordionExample">
			    <div class="card">
			      <div class="card-header" id="headingOne">
			        <div class="row">
			          <div class="col-sm-11 col-9">
			            <h2 class="mb-0 title-block">
			                why do I need to avail daily subscription?
			            </h2>
			          </div>
			          <div class="col-sm-1 col-1">
			            <h2 class="mb-0 btn-block">
			              <button class="btn btn-link btn-s-link closed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			                <i class="fas fa-plus"></i>
			                 <i class="fas fa-times" style="color: #E95720"></i>
			              </button>
			            </h2>
			          </div>
			        </div>
			      </div>

			      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
			        <div class="card-body">
			          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet
			        </div>
			      </div>
			    </div>
			    <div class="card">
			      <div class="card-header" id="headingTwo">
			        <div class="row">
			          <div class="col-sm-11 col-9">
			            <h2 class="mb-0 title-block">
			                can I choose a date for my subscription
			            </h2>
			          </div>
			          <div class="col-sm-1 col-1">
			            <h2 class="mb-0 btn-block">
			              <button class="btn btn-link btn-s-link closed" type="button" data-toggle="collapse" data-target="#collapseSecond" aria-expanded="true" aria-controls="collapseOne">
			                <i class="fas fa-plus"></i>
			                 <i class="fas fa-times" style="color: #E95720"></i>
			              </button>
			            </h2>
			          </div>
			        </div>
			      </div>
			      <div id="collapseSecond" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			        <div class="card-body">
			          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet
			        </div>
			      </div>
			    </div>
			    <div class="card">
			      <div class="card-header" id="headingThree">
			        <div class="row">
			          <div class="col-sm-11 col-9">
			            <h2 class="mb-0 title-block">
			                how doeS this subscription work
			            </h2>
			          </div>
			          <div class="col-sm-1 col-1">
			            <h2 class="mb-0 btn-block">
			              <button class="btn btn-link btn-s-link closed" type="button" data-toggle="collapse" data-target="#collapseThird" aria-expanded="true" aria-controls="collapseOne">
			                <i class="fas fa-plus"></i>
			                 <i class="fas fa-times" style="color: #E95720"></i>
			              </button>
			            </h2>
			          </div>
			        </div>
			      </div>
			      <div id="collapseThird" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			        <div class="card-body">
			          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet
			        </div>
			      </div>
			    </div>
			    <div class="card">
			      <div class="card-header active" id="headingFour">
			        <div class="row">
			          <div class="col-sm-11 col-9">
			            <h2 class="mb-0 title-block">
			                ARE the details for my choseN date EXPIRES?
			            </h2>
			          </div>
			          <div class="col-sm-1 col-1">
			            <h2 class="mb-0 btn-block">
			              <button class="btn btn-link btn-s-link open" type="button" data-toggle="collapse" data-target="#collapseFourth" aria-expanded="true" aria-controls="collapseOne">
			                <i class="fas fa-plus"></i>
			                <i class="fas fa-times" style="color: #E95720"></i>
			              </button>
			            </h2>
			          </div>
			        </div>
			      </div>
			      <div id="collapseFourth" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
			        <div class="card-body">
			          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet
			        </div>
			      </div>
			    </div>
			    <div class="card">
			      <div class="card-header" id="headingFive">
			        <div class="row">
			          <div class="col-sm-11 col-9">
			            <h2 class="mb-0 title-block">
			                ARE the details for my choseN date EXPIRES?
			            </h2>
			          </div>
			          <div class="col-sm-1 col-1">
			            <h2 class="mb-0 btn-block">
			              <button class="btn btn-link btn-s-link closed" type="button" data-toggle="collapse" data-target="#collapsefifth" aria-expanded="true" aria-controls="collapseOne">
			                <i class="fas fa-plus"></i>
			                 <i class="fas fa-times" style="color: #E95720"></i>
			              </button>
			            </h2>
			          </div>
			        </div>
			      </div>
			      <div id="collapsefifth" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			        <div class="card-body">
			          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet
			        </div>
			      </div>
			    </div>
			</div>
		</div>
	@else
		
		<div class="col-sm-6 col-lg-6 col-12 pro-block">
			<h2>Pro Subscription Packages</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit aenean commodo ligula phasellus nullam eget sed num.</p>
			<div class="row row-main-package">
				<div class="col-sm-6 col-lg-6 col-md-6 col-12 monthly-block">
					<div class="row row-package-header">
						<div class="col-12">
							<div class="row row-header1">
								<div class="col-12">
								<h3>MONTHLY package</h3>
								</div>
							</div>
							<div class="row row-header2">
								<div class="col-12">
								<img src="{{url('/')}}/images/DazoCoin-png.png"><span>300</span>
								</div>
							
							</div>
						</div>
					</div>
					<div class="row row-list">
						<div class="col-12">
						<ul>
							<li>&nbsp Purchase Subscription </li>
							<li>&nbsp Lorem Ipsum Dolor</li>
							<li>&nbsp Sed ipsum vivamus elit</li>
						</ul>
						</div>
					</div>
					<div class="row row-see-all">
					<p>
						<a href="">see all...</a>
					</p>
					</div>
					
					
				</div>
				<div class="col-sm-6 col-lg-6 col-md-6 col-12 yearly-block">
					<div class="row row-package-header">
						<div class="col-12">						
							<div class="row row-header1">
								<div class="col-12">
									<h3>YEARLY package</h3>
								</div>
							</div>

							<div class="row row-header2">
								<div class="col-12">
									<img src="{{url('/')}}/images/DazoCoin-png.png"><span>1000</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row row-list">
						<div class="col-12">
							<ul>
								<li>&nbsp Purchase Subscription </li>
								<li>&nbsp Lorem Ipsum Dolor</li>
								<li>&nbsp Sed ipsum vivamus elit</li>
							</ul>
						</div>
					</div>
					
					<div class="row row-see-all">
						<div class="col-12">
							<p>
								<a href="">see all...</a>
							</p>
						</div>
						
					</div>
					
				</div>
			</div>
			<div class="monthy-year-button">
				<button>
					<a href="{{ route('subscription') }}">LEARN MORE</a>
				</button>
			</div>
		</div>
	@endif
</div>
