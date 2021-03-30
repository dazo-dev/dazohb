	<!-- <div class="row coin-refer">

		<div class="col-sm-7 col-lg-7 col-12 right-block">

			<h2>Dazo Coins</h2>

			<div class="row main-container">

				<div class="col-sm-2 col-lg-2 col-12 img-container" style="">

					<img src="images/DazoCoin-png.png">

				</div>

				<div class="col-sm-6 col-lg-6 col-12 balance-container">

					<div class="row balance-header">CURRENT BALANCE</div>

					<div class="row balance">{{ (Auth::user()->coins == "") ? 0 : Auth::user()->coins }}</div>

				</div>

				<div class="col-sm-4 col-lg-4 col-12 btn-container">

					<button>

						<a href="{{ route('dazocoin') }}">+ BUY DAZO COINS</a>

					</button>

				</div>

			</div>

			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean <br>commodo ligula eget dolor. Aenean massa. Cum sociis natoque <br>penatibus et magnis dis parturient phasellus nullam.</p>

			<ul>

				<li> &nbsp Purchase Subscription Packages</li>

				<li> &nbsp Purchase Subscription Packages</li>

				<li> &nbsp Purchase Subscription Packages</li>

			</ul>

		</div>

		<div class="col-sm-5 col-lg-5 col-12 left-block">

			<div class="row img-container">

				<img src="images/support.png">

			</div>

			<h2>Invite a Friend and Earn Rewards</h2>

			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula ege.</p>

			<div class="refer-btn">

				<button>

					<a href="javascript:void(0)" data-toggle="modal" data-target="#referModal">refer now</a>

				</button>

			</div>

		</div>

	</div> -->

	<div class="bg-dark-horse-with-jockey coin-refer">

		<div class="row">

			<div class="col-lg-6 col-xl-6 col-12">

				<div class="coin-refer-header">

					<h1>Dazo Coins</h1>

				</div>

				<div class="d-flex balance-container" style="background-color:#000;">

					<div class="d-flex">

						<img src="{{url('/')}}/images/DazoCoin-png.png">

						<div class="balance-col">

							<div class="balance-header">CURRENT BALANCE</div>

							<div class="balance">{{ (Auth::user()->coins == "") ? 0 : Auth::user()->coins }}</div>

						</div>
					
					</div>

					<button type="button" onclick="location.href = '{{ route('dazocoin') }}'">

						+ BUY DAZO COINS

					</button>


				</div>

				<div class="content">

					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient phasellus nullam.</p>

				</div>

				<div class="list">

					<ul>

						<li> &nbsp Purchase Subscription Packages</li>

						<li> &nbsp Lorem Ipsum Dolor Sit Amet Nuliam Phasellus</li>

						<li> &nbsp Maeceneas sed ipsum vivamus elit</li>

					</ul>

				</div>

			</div>

			<div class="col-lg-6 col-xl-6 col-12">

				<div class="referal-container">

					<img src="{{url('/')}}/images/support.png">

					<div class="referal-header">

						<h2>Invite a Friend and Earn Rewards</h2>
		
					</div>

					<div class="referal-content">

						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula ege.</p>
			
					</div>


					<button type="button">

						<a href="javascript:void(0)" data-toggle="modal" data-target="#referModal">REFER NOW</a>

					</button>


				</div>

			</div>

		</div>

	</div>

