	<h2 style="text-align: center; font-size: 40px; font-style: italic; font-weight: bolder;">Dazo Coins</h2>
	<!-- <div class="row coin-refer">

		<div class="col-sm-6 col-lg-6 col-12 right-block">
			
			<div class="row main-container">
				<div class="col-sm-3 col-lg-3 col-12 img-container" style="">
					<img src="images/DazoCoin-png.png">
				</div>
				<div class="col-sm-4 col-lg-4 col-12 balance-container" style="padding-left: 0;padding-right: 0;">
					<div class="row balance-header">CURRENT BALANCE</div>
					<div class="row balance"><?php echo e((Auth::user()->coins == "") ? 0 : Auth::user()->coins); ?></div>
				</div>
				<div class="col-sm-5 col-lg-5 col-12 btn-container">
					<button>
						<a href="<?php echo e(route('dazocoin')); ?>">+ BUY DAZO COINS</a>
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

	<div class="row coin-refer">
		<div class="container main-container1 display-flex">
			<div class="col-md-6">
				<div class="row balance-container" style="background-color:#000;">
					<div class="col-md-2 dazo-coin-container">
						<img src="images/DazoCoin-png.png">
					</div>
					<div class="col-md-5 balance-col">
						<div class="row balance-header"><p>CURRENT BALANCE</p></div>
						<div class="row balance"><p><?php echo e((Auth::user()->coins == "") ? 0 : Auth::user()->coins); ?></p></div>
					</div>
					<div class="col-md-5 btn-col2">
						<button>
							<a href="<?php echo e(route('dazocoin')); ?>">+ BUY DAZO COINS</a>
						</button>
					</div>
				</div>
				<div class="row content">
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean <br>commodo ligula eget dolor. Aenean massa. Cum sociis natoque <br>penatibus et magnis dis parturient phasellus nullam.</p>
				</div>
				<div class="row list">
					<ul>
						<li> &nbsp Purchase Subscription Packages</li>
						<li> &nbsp Purchase Subscription Packages</li>
						<li> &nbsp Purchase Subscription Packages</li>
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-buy-coin">
				<div class="row row-dazo-coin-price">
					<div class="col-md-3 col-price">
						<h3>&#8369;100</h3>
					</div>
					<div class="col-md-1 col-equal">
						<p>=</p>
					</div>
					<div class="col-md-4 col-dazo-coins">
						<h3><img src="images/DazoCoin-png.png" width="30%">100</h3>
					</div>
					<div class="col-md-4 col-dazo-btn">
						<button><a href="<?php echo e(url('checkout', [$type = 'coin', $amount = '100'])); ?>" style="color: #fff;text-decoration: none">BUY DAZO COINS</a> </button>
					</div>
				</div>
				<div class="row row-dazo-coin-price">
					<div class="col-md-3 col-price">
						<h3>&#8369;500</h3>
					</div>
					<div class="col-md-1 col-equal">
						<p>=</p>
					</div>
					<div class="col-md-4 col-dazo-coins">
						<h3><img src="images/DazoCoin-png.png" width="30%">520</h3>
					</div>
					<div class="col-md-4 col-dazo-btn">
						<button><a href="<?php echo e(url('checkout', [$type = 'coin', $amount = '500'])); ?>" style="color: #fff;text-decoration: none">BUY DAZO COINS</a> </button>
					</div>
				</div>
				<div class="row row-dazo-coin-price">
					<div class="col-md-3 col-price">
						<h3>&#8369;1000</h3>
					</div>
					<div class="col-md-1 col-equal">
						<p>=</p>
					</div>
					<div class="col-md-4 col-dazo-coins">
						<h3><img src="images/DazoCoin-png.png" width="30%">1200</h3>
					</div>
					<div class="col-md-4 col-dazo-btn">
						<button class="fin"><a href="<?php echo e(url('checkout', [$type = 'coin', $amount = '1000'])); ?>" style="color: #fff;text-decoration: none">BUY DAZO COINS</a> </button>
					</div>
				</div>
			</div>
		</div>
	</div><?php /**PATH /home/n5v1kkfmopdy/public_html/dazohb/resources/views/sections/buy-coin-section.blade.php ENDPATH**/ ?>