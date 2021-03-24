<div class="row full-prog-block">
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-12 header">
		<h2 class="full-prog-header">full race program</h2>
	</div>
	<div class="col-lg-1 col-md-1 col-sm-3 col-xs-1 col-12"></div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-12 btn-container btn-race-result-tab" target-section="previous-accordion">
		<h3>{{ date('F d, Y',(strtotime ( '-1 day' , strtotime ( date('F d, Y') ) ) )) }}</h3>
		<p>race result</p>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-12 btn-container btn-race-result-tab active" target-section="race-accordion">
		<h3 class="cur-r-p">{{ date('F d, Y') }}</h3>
		<p>race program</p>
	</div>
	<div class="default-program-section" style="width: 100%">
		<div class="row race-accordion current-accordion accord-sect">
			<div class="container my-4">
		    
			    <!--Accordion wrapper-->
				<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

				  <!-- Accordion card -->
				  <div class="card" style="background-color: #000">

				    <!-- Card header -->
				    <div class="card-header" role="tab" id="headingOne1">
				      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
				        aria-controls="collapseOne1">
				        <h5 class="mb-0">
				          <i class="fas fa-angle-down rotate-icon"></i> 
				          	&nbsp 
				          	RACE 1
				        </h5>
				        <p>01:49 AM • 1400M • WTA • 3Y&UPM</p>
				      </a>
				    </div>

				    <!-- Card body -->
				    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
				      data-parent="#accordionEx">
				      <div class="card-body">
				        <!-- <table style="width: 50%; text-align: center;">
				        	<tr>
				        		<td style="padding: 0 1%;">XD-46</td>
				        		<td style="border-left: 1px solid white;padding: 0 1%;">TRIFECTA</td>
				        		<td style="border-left: 1px solid white;padding: 0 1%;">QUARTET</td>
				        		<td style="border-left: 1px solid white;padding: 0 1%;">PENTAFECTA</td>
				        		<td style="border-left: 1px solid white;padding: 0 1%;">DD + 1</td>
				        	</tr>
				        </table> -->
						<div class="col-sm-12">
							<div class="row col-five">
								<div class="col-2 b-r m-w-33 m-b-2"><p class="f-10">XD-46</p></div>
								<div class="col-2 b-r m-w-33 m-b-2"><p class="f-10">TRIFECTA</p></div>
								<div class="col-2 b-r m-w-33 m-b-2"><p class="f-10">QUARTET</p></div>
								<div class="col-2 b-r m-w-33 m-b-2"><p class="f-10">PENTAFECTA</p></div>
								<div class="col-2 m-w-33 m-b-2"><p class="f-10">DD + 1</p></div>
							</div>
						</div>
				        <div class="container my-4">

	    
							      <!--Accordion wrapper-->
							  <div class="accordion md-accordion" id="accordionInner" role="tablist" aria-multiselectable="true">

							    <!-- Accordion card -->
							    <div class="card">

							      <!-- Card header -->
							      <div class="card-header" role="tab" id="headingOne1">
							      	<table style="width: 100%" class="heading-link">
							          	<tr>
							          		<td style="width: 5%;">
							          			<h5 class="mb-0">
							          				<a data-toggle="collapse" data-parent="#accordionInner" href="#collapseInner1" aria-expanded="true"
							          aria-controls="collapseOne1">1</a>
							          			</h5>
							          		</td>
							          		<td style="width: 2%;">
							          			<i class="fas fa-angle-double-up" style="color: red"></i>
							          		</td>
							          		<td style="width: 2%;">
							          			<i class="fas fa-horse-head"></i>
							          		</td>
							          		<td>Ravel</td>
							          		<td style="width: 60%;">
							          			<span class="numberCircle" target-color="green-tip" style="background-color: #808005">1</span>
									            <span class="numberCircle" target-color="red-tip" style="background-color: red">2</span>
									            <span class="numberCircle" target-color="blue-tip" style="background-color: blue">3</span>
									        </td>
							          		<td style="width: 15%;">
							          			<span style="float: right;">120K</span>
							          		</td>
							          		<td style="width: 5%; text-align: right;">
							          			{{-- <i class="fas fa-star"></i> --}}
							          			<div class="star-post star">1</div>
							          		</td>
							          	</tr>
							          </table>
							        
							      </div>

							      <!-- Card body -->
							      <div id="collapseInner1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
							        data-parent="#accordionInner">
							        <div class="row tip-area green-tip" style="background-color: #808004; height: auto; width: 100%; display: none; margin: 0">
							        		<span class="tool-tip-close" style="position: absolute; right: 2%">X</span>
							        		<p style="font-size: 15px">
							        			<i class="fas fa-lightbulb"></i> &nbsp Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
							        		</p>
							        </div>
							        <div class="row tip-area red-tip" style="background-color: red; height: auto; width: 100%; display: none; margin: 0">
							        		<span class="tool-tip-close" style="position: absolute; right: 2%">X</span>
							        		<p style="font-size: 15px">
							        			<i class="fas fa-lightbulb"></i> &nbsp Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
							        		</p>
							        </div>
							        <div class="row tip-area blue-tip" style="background-color: blue; height: auto; width: 100%; display: none; margin: 0">
							        		<span class="tool-tip-close" style="position: absolute; right: 2%">X</span>
							        		<p style="font-size: 15px">
							        			<i class="fas fa-lightbulb"></i> &nbsp Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
							        		</p>
							        </div>
							        <div class="card-body">
							        	
							          {{-- TAB WITH TABLE --}}

									<ul class="nav nav-tabs" id="myTab" role="tablist" style="border: none;">
										<li class="nav-item">
											<a class="nav-link active inner-inner-tab" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span class="active">last 5 races</span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link inner-inner-tab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><span>last 5 dist</span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link inner-inner-tab" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span>jockey</span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link inner-inner-tab" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span>trainer</span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link inner-inner-tab" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span>stable</span></a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="background-color: #181818;border:none">
											<table id="example" class="table table-bordered race-tbl" style="width:100%; color: #fff">
										        <thead>
										            <tr>
										                <th>DATE</th>
										                <th>PLACE</th>
										                <th>TRACK</th>
										                <th>DIST</th>
										                <th>CLS</th>
										                <th>RNGPSTN</th>
										                <th>BT</th>
										                <th>VR</th>
										                <th>RTG</th>
										                <th>TIME</th>
										            </tr>
										        </thead>
										        <tbody style="background-color: #333333;">
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										        </tbody>
										    </table>
										</div>
										<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
										<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
									</div>

							        </div>
							      </div>

							    </div>
							    <!-- Accordion card -->

							    <!-- Accordion card -->
							    <div class="card">

							      <!-- Card header -->
							      <div class="card-header" role="tab" id="headingOne1">
							      	<table style="width: 100%" class="heading-link">
							          	<tr>
							          		<td style="width: 5%;">
							          			<h5 class="mb-0">
							          				<a data-toggle="collapse" data-parent="#accordionInner" href="#collapseInner2" aria-expanded="true"
							          aria-controls="collapseOne2">2</a>
							          			</h5>
							          		</td>
							          		<td style="width: 2%;">
							          			
							          		</td>
							          		<td style="width: 2%;">
							          			<i class="fas fa-horse-head"></i>
							          		</td>
							          		<td>YES I will</td>
							          		<td style="width: 60%;">
									            <span class="numberCircle" target-color="red-tip" style="background-color: red">2</span>
									        </td>
							          		<td style="width: 15%;">
							          			<span style="float: right;">120K</span>
							          		</td>
							          		<td style="width: 5%; text-align: right;">
							          			<div class="star-post star-blank"></div>
							          		</td>
							          	</tr>
							          </table>
							        
							      </div>

							      <!-- Card body -->
							      <div id="collapseInner2" class="collapse" role="tabpanel" aria-labelledby="headingOne2"
							        data-parent="#accordionInner">
								    <div class="row tip-area green-tip" style="background-color: #808004; height: auto; width: 100%; display: none; margin: 0">
										<span class="tool-tip-close" style="position: absolute; right: 2%">X</span>
										<p style="font-size: 15px">
											<i class="fas fa-lightbulb"></i> &nbsp Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
										</p>
								    </div>
								    <div class="row tip-area red-tip" style="background-color: red; height: auto; width: 100%; display: none; margin: 0">
								    		<span class="tool-tip-close" style="position: absolute; right: 2%">X</span>
								    		<p style="font-size: 15px">
								    			<i class="fas fa-lightbulb"></i> &nbsp Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								    		</p>
								    </div>
								    <div class="row tip-area blue-tip" style="background-color: blue; height: auto; width: 100%; display: none; margin: 0">
								    		<span class="tool-tip-close" style="position: absolute; right: 2%">X</span>
								    		<p style="font-size: 15px">
								    			<i class="fas fa-lightbulb"></i> &nbsp Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								    		</p>
								    </div>
								    <div class="card-body">
								    	
								      {{-- TAB WITH TABLE --}}

									<ul class="nav nav-tabs" id="myTab" role="tablist" style="border: none;">
										<li class="nav-item">
											<a class="nav-link active inner-inner-tab" id="home-tab" data-toggle="tab" href="#l-5-r" role="tab" aria-controls="home" aria-selected="true"><span class="active">last 5 races</span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link inner-inner-tab" id="profile-tab" data-toggle="tab" href="#l-5-d" role="tab" aria-controls="profile" aria-selected="false"><span>last 5 dist</span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link inner-inner-tab" id="contact-tab" data-toggle="tab" href="#jockey" role="tab" aria-controls="contact" aria-selected="false"><span>jockey</span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link inner-inner-tab" id="contact-tab" data-toggle="tab" href="#trainer" role="tab" aria-controls="contact" aria-selected="false"><span>trainer</span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link inner-inner-tab" id="contact-tab" data-toggle="tab" href="#stable" role="tab" aria-controls="contact" aria-selected="false"><span>stable</span></a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="l-5-r" role="tabpanel" aria-labelledby="home-tab" style="background-color: #181818;border:none">
											<table id="example" class="table table-bordered race-tbl" style="width:100%; color: #fff">
										        <thead>
										            <tr>
										                <th>DATE</th>
										                <th>PLACE</th>
										                <th>TRACK</th>
										                <th>DIST</th>
										                <th>CLS</th>
										                <th>RNGPSTN</th>
										                <th>BT</th>
										                <th>VR</th>
										                <th>RTG</th>
										                <th>TIME</th>
										            </tr>
										        </thead>
										        <tbody style="background-color: #333333;">
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										            <tr>
										                <td>09/06/2020</td>
										                <td>2</td>
										                <td>SL (HT)</td>
										                <td>1600</td>
										                <td>5</td>
										                <td>6-6-5-2</td>
										                <td>1.33.39</td>
										                <td>1234</td>
										                <td>19</td>
										                <td>1:14:55</td>
										            </tr>
										        </tbody>
										    </table>
										</div>
										<div class="tab-pane fade" id="l-5-d" role="tabpanel" aria-labelledby="profile-tab">...</div>
										<div class="tab-pane fade" id="jockey" role="tabpanel" aria-labelledby="contact-tab">...</div>
										<div class="tab-pane fade" id="trainer" role="tabpanel" aria-labelledby="contact-tab">...</div>
										<div class="tab-pane fade" id="stable" role="tabpanel" aria-labelledby="contact-tab">...</div>
									</div>

								    </div>
								  </div>

							    </div>
							    <!-- Accordion card -->

							    

							  </div>
							  <!-- Accordion wrapper -->

							</div>
				      </div>
				    </div>

				  </div>
				  <!-- Accordion card -->

				  <!-- Accordion card -->
				  <div class="card">

				    <!-- Card header -->
				    <div class="card-header" role="tab" id="headingOne1">
				      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="true"
				        aria-controls="collapseOne1">
				        <h5 class="mb-0">
				          <i class="fas fa-angle-down rotate-icon"></i> 
				          	&nbsp 
				          	RACE 2
				        </h5>
				        <p>01:49 AM • 1400M • WTA • 3Y&UPM</p>
				      </a>
				    </div>

				    <!-- Card body -->
				    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
				      data-parent="#accordionEx">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
				        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
				        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
				        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
				        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
				        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
				        labore sustainable VHS.
				      </div>
				    </div>

				  </div>
				  <!-- Accordion card -->

				  <!-- Accordion card -->
				  <div class="card">

				    <!-- Card header -->
				    <div class="card-header" role="tab" id="headingOne1">
				      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3" aria-expanded="true"
				        aria-controls="collapseOne1">
				        <h5 class="mb-0">
				          <i class="fas fa-angle-down rotate-icon"></i> 
				          	&nbsp 
				          	RACE 3
				        </h5>
				        <p>01:49 AM • 1400M • WTA • 3Y&UPM</p>
				      </a>
				    </div>

				    <!-- Card body -->
				    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
				      data-parent="#accordionEx">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
				        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
				        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
				        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
				        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
				        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
				        labore sustainable VHS.
				      </div>
				    </div>

				  </div>
				  <!-- Accordion card -->

				</div>
				<!-- Accordion wrapper -->

			  </div>
		</div>

		<div class="row accord-sect previous-accordion accord-sect" style="display: none">
			<div class="accordion" id="accordionExample">
			  <div class="card">
			    <div class="card-header" role="tab" id="headingOne1">
			      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="header-btn">
			        <table>
			        	<tr>
			        		<td class="td-1"><i class="fas fa-angle-down rotate-icon angle-btn"></i></td>
			        		<td class="td-2">RACE 1</td>
			        		<td class="td-3">01:49 AM</td>
			        		<td class="td-4">•</td>
			        		<td class="td-5">1400M</td>
			        		<td class="td-6">•</td>
			        		<td class="td-7">WTA</td>
			        		<td class="td-8">•</td>
			        		<td class="td-9">3Y&UPM</td>
			        	</tr>
			        </table>
			      </a>
			    </div>

			    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
			      <div class="card-body">
			      	{{-- <p><span>18'-24'-26-28</span> &nbsp <span>Length Finished = 2-1/2-3</span><span>1:37.2</span></p> --}}
			      	<table style="width: 40%; text-align: center;">
			        	<tr>
			        		<td style="padding: 0 1%;">18'-24'-26-28</td>
			        		<td style="padding: 0 1%;">Length Finished = 2-1/2-3</td>
			        		<td style="padding: 0 1%;">1:37.2</td>
			        	</tr>
			        </table>
			        <table style="width: 50%; text-align: center;">
			        	<tr>
			        		<td style="padding: 0 1%;">XD-46</td>
			        		<td style="border-left: 1px solid white;padding: 0 1%;">TRI = 33.80</td>
			        		<td style="border-left: 1px solid white;padding: 0 1%;">QRT = 47.80</td>
			        		<td style="border-left: 1px solid white;padding: 0 1%;">PENTA = 78.20</td>
			        		<td style="border-left: 1px solid white;padding: 0 1%;">F = 44.50</td>
			        	</tr>
			        </table>

			        <table id="example" class="table table-bordered race-tbl" style="width:100%; color: #fff">
				        <thead style="font-size: 12px;">
				            <tr>
				                <th>1/2</th>
				                <th>1/4</th>
				                <th>(R3-4)</th>
				                <th>HORSE</th>
				                <th>JOCKEY</th>
				                <th>TIME</th>
				            </tr>
				        </thead>
				        <tbody style="background-color: #333333;">
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i> &nbsp Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i> &nbsp Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i> &nbsp Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i> &nbsp Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i> &nbsp Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i> &nbsp Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				        </tbody>
				    </table>
				    <div style="text-align: center;">
					    <button style="border: none;background-color: transparent;width: 15%;">
				      		<div style="float: left;width: 16%;border-radius: 56px;background-color: red;"><i class="fas fa-play" style="color: #fff;font-size: 10px;"></i></div>
				      		<span style="color: #E95720">VIEW REPLAY</span>
				      	</button>
				    </div>
			      </div>
			      	
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" role="tab" id="headingTwo">
			      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="header-btn">
			        <table style="width: 37%;">
			        	<tr>
			        		<td><i class="fas fa-angle-down rotate-icon angle-btn"></i></td>
			        		<td style="width: 15%;">RACE 2</td>
			        		<td style="width: 25%; text-align: right; padding: 0 1%;">01:49 AM</td>
			        		<td style="width: 5%; text-align: center;">•</td>
			        		<td style="width: 10%;">1400M</td>
			        		<td style="width: 10%; text-align: center;">•</td>
			        		<td style="width: 10%;">WTA</td>
			        		<td>•</td>
			        		<td style="width: 10%;">3Y&UPM</td>
			        	</tr>
			        </table>
			      </a>
			    </div>
			    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			      <div class="card-body">
			        <p><span>18'-24'-26-28</span> &nbsp <span>Length Finished = 2-1/2-3</span><span>1:37.2</span></p>
			        <table style="width: 50%; text-align: center;">
			        	<tr>
			        		<td style="padding: 0 1%;">XD-46</td>
			        		<td style="border-left: 1px solid white;padding: 0 1%;">TRI = 33.80</td>
			        		<td style="border-left: 1px solid white;padding: 0 1%;">QRT = 47.80</td>
			        		<td style="border-left: 1px solid white;padding: 0 1%;">PENTA = 78.20</td>
			        		<td style="border-left: 1px solid white;padding: 0 1%;">F = 44.50</td>
			        	</tr>
			        </table>

			        <table id="example" class="table table-bordered race-tbl" style="width:100%; color: #fff">
				        <thead>
				            <tr>
				                <th>1/2</th>
				                <th>1/4</th>
				                <th>(R3-4)</th>
				                <th>HORSE</th>
				                <th>JOCKEY</th>
				                <th>TIME</th>
				            </tr>
				        </thead>
				        <tbody style="background-color: #333333;">
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i>Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i>Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i>Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i>Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i>Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				            <tr>
				                <td>1</td>
				                <td>1</td>
				                <td>(7)</td>
				                <td><i class="fas fa-horse-head"></i>Endorser</td>
				                <td>C P Henson 55</td>
				                <td>1:14.8</td>
				            </tr>
				        </tbody>
				    </table>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>


	<div class="selected-program-section" style="width: 100%">

	</div>
	
</div>