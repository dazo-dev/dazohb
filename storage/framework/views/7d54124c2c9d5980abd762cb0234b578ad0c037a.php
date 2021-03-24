	<!-- <div class="row coin-refer">
		<div class="col-sm-7 col-lg-7 col-12 right-block">
			<h2>Dazo Coins</h2>
			<div class="row main-container">
				<div class="col-sm-2 col-lg-2 col-12 img-container" style="">
					<img src="images/DazoCoin-png.png">
				</div>
				<div class="col-sm-6 col-lg-6 col-12 balance-container">
					<div class="row balance-header">CURRENT BALANCE</div>
					<div class="row balance"><?php echo e((Auth::user()->coins == "") ? 0 : Auth::user()->coins); ?></div>
				</div>
				<div class="col-sm-4 col-lg-4 col-12 btn-container">
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

	<div class="row coin-refer">
		<div class="container main-container1">
			<div class="col-md-6">
				<div class="coin-refer-header">
					<h1>Dazo Coins</h1>
				</div>
				<div class="row balance-container" style="background-color:#000;">
					<div class="col-md-2 dazo-coin-container">
						<img src="<?php echo e(url('/')); ?>/images/DazoCoin-png.png">
					</div>
					<div class="col-md-5 balance-col">
						<div class="row balance-header"><p>CURRENT BALANCE</p></div>
						<div class="row balance"><p><?php echo e((Auth::user()->coins == "") ? 0 : Auth::user()->coins); ?></p></div>
					</div>
					<div class="col-md-5 btn-col">
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
			<div class="col-md-6">
				<div class="container referal-container">
					<div class="row image-container">
						<div class="col-12">
							<img src="<?php echo e(url('/')); ?>/images/support.png">
						</div>						
					</div>
					<div class="row referal-header">
						<div class="col-12">
							<h2>Invite a Friend and Earn Rewards</h2>
						</div>						
					</div>
					<div class="row referal-content">
						<div class="col-12">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula ege.</p>
						</div>						
					</div>
					<div class="row btn-row">
						<div class="col-12">
							<button>
								<a href="javascript:void(0)" data-toggle="modal" data-target="#referModal">REFER NOW</a>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php /**PATH D:\xampp\htdocs\dazohb\resources\views/sections/coins-refer-section.blade.php ENDPATH**/ ?>