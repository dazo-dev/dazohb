
	<!-- <div class="row coin-refer">



		<div class="col-sm-6 col-lg-6 col-12 right-block">

			

			<div class="row main-container">

				<div class="col-sm-3 col-lg-3 col-12 img-container" style="">

					<img src="images/DazoCoin-png.png">

				</div>

				<div class="col-sm-4 col-lg-4 col-12 balance-container" style="padding-left: 0;padding-right: 0;">

					<div class="row balance-header">CURRENT BALANCE</div>

					<div class="row balance">{{ (Auth::user()->coins == "") ? 0 : Auth::user()->coins }}</div>

				</div>

				<div class="col-sm-5 col-lg-5 col-12 btn-container">

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

		<div class="col-sm-6 col-lg-6 col-12 left-block coins-sect">

			<div class="row main-row" style="height: auto">

				<div class="col-lg-3 col-md-3 col-sm-3 col-12 cost-sect">

					<h3>&#8369;100</h3>

				</div>

				<div class="col-lg-1 col-md-1 col-sm-1 col-12 p-sect">

					<p>=</p>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-12">

					<h3><img src="images/DazoCoin-png.png" width="30%">100</h3>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-12">

					<button>buy dazo coins</button>

				</div>

			</div>

			<div class="row main-row" style="height: auto">

				<div class="col-lg-3 col-md-3 col-sm-3 col-12 cost-sect">

					<h3>&#8369;500</h3>

				</div>

				<div class="col-lg-1 col-md-1 col-sm-1 col-12 p-sect">

					<p>=</p>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-12">

					<h3><img src="images/DazoCoin-png.png" width="30%">550</h3>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-12">

					<button>buy dazo coins</button>

				</div>

			</div>

			<div class="row main-row" style="height: auto">

				<div class="col-lg-3 col-md-3 col-sm-3 col-12 cost-sect">

					<h3>&#8369;1000</h3>

				</div>

				<div class="col-lg-1 col-md-1 col-sm-1 col-12 p-sect">

					<p>=</p>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-12">

					<h3><img src="images/DazoCoin-png.png" width="30%">1200</h3>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-12">

					<button style="background-color: #0D6499 !important">buy dazo coins</button>

				</div>

			</div>

		</div>

	</div> -->

@php
	$coins = [[ 'peso' => 100, 'dazo' => 100], [ 'peso' => 500, 'dazo' => 520], [ 'peso' => 1000, 'dazo' => 1200]];
@endphp

<div class="buy-dazo-coin-section">
	<h2>Dazo Coins</h2>

	<div class="row">

		<div class="col-lg-6 col-xl-6 col-12">

			<div class="balance-container d-flex">

				<div class="d-flex">

					<img src="images/DazoCoin-png.png">

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

				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean <br>commodo ligula eget dolor. Aenean massa. Cum sociis natoque <br>penatibus et magnis dis parturient phasellus nullam.</p>

			</div>

			<div class="list">

				<ul>

					<li> &nbsp Purchase Subscription Packages</li>

					<li> &nbsp Lorem Ipsum Dolor Sit Amet Nullam Phasellus</li>

					<li> &nbsp Maeceness sed Ipsum vivamus elit</li>

				</ul>

			</div>

		</div>

		<div class="col-lg-6 col-xl-6 col-12">

			@foreach($coins as $coin)

			<div class="row-dazo-coin-price">

				<div class="col-price">

					<h3>&#8369;{{ $coin['peso'] }}</h3>

				</div>

				<div class="col-equal">

					<h3>=</h3>

				</div>

				<div class="col-dazo-coins">

					<h3><img src="images/DazoCoin-png.png" width="30%">{{ $coin['dazo'] }}</h3>

				</div>

				<div class="col-dazo-btn">

					<button type="buton" onclick="location.href = '{{route('checkout', [$type = 'coin', $amount = $coin['peso']])}}';">
						BUY DAZO Coins
					</button>

				</div>

			</div>

			@endforeach

		</div>

	</div>
</div>