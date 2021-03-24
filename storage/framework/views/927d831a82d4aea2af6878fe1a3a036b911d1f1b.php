<div class="bottom-section">
	<div class="row">
		<div class="col-sm-4 contact-col-1">
			<div class="row">
				<p class="header">get in touch with us</p>
			</div>
			<div class="row">
				<p class="sub">
					<i class="fas fa-map-marker-alt"></i> &nbsp 456 Lorem Ipsum Dolor, Nullam Street,<br>
					Phasellus Eget 4728
				</p>
			</div>
			<div class="row">
				<p class="body">
					<i class="fas fa-phone"></i> &nbsp +639123845614
				</p>
			</div>
			<div class="row">
				<p class="footer">
					<i class="fas fa-mail-bulk"></i> &nbsp dazoph@gmail.com
				</p>
			</div>
		</div>
		<div class="col-sm-4 contact-col-2">
			<div class="row">
				<p class="header">quick links</p>
			</div>
			<div class="row">
				<p class="sub">
					Home
				</p>
			</div>
			<div class="row">
				<p class="sub">
					Learn How To Race
				</p>
			</div>
			<div class="row">
				<p class="sub">
					OTB Locator
				</p>
			</div>
			<div class="row">
				<p class="sub">
					Livestream
				</p>
			</div>
			<div class="row">
				<p class="sub">
					Bet
				</p>
			</div>
			<?php if( Auth::user() ): ?>

				<div class="row">
					<p class="sub">
						Races
					</p>
				</div>
				<div class="row">
					<p class="sub">
						Horses
					</p>
				</div>
				<div class="row">
					<p class="sub">
						Forum
					</p>
				</div>

			<?php endif; ?>
			<div class="row">
				<p class="sub">
					Contact Us
				</p>
			</div>
		</div>
		<div class="col-sm-4 contact-col-3">
			<div class="row">
				<p class="header">account</p>
			</div>
			<?php if( Auth::user() ): ?>
				<div class="row">
					<p class="sub">
						<a href="<?php echo e(route('profile')); ?>">My Account</a>
					</p>
				</div>
				<div class="row">
					<p class="sub">
						<a href="<?php echo e(route('dazocoin')); ?>">Buy Dazo Coins</a>
					</p>
				</div>
				<div class="row">
					<p class="sub">
						<a href="javascript:void(0)" data-toggle="modal" data-target="#referModal">Invite Friends</a>
					</p>
				</div>

			<?php else: ?>

				<div class="row">
					<p class="sub">
						<a href="">Log In</a>
					</p>
				</div>
				<div class="row">
					<p class="sub">
						<a href="javascript:void(0)" data-toggle="modal" data-target="#registerModal">Sign up</a>
					</p>
				</div>
			<?php endif; ?>

			
			<div class="row" style="margin-top: 2%">
				<p class="header">Follow Us</p>
			</div>
			<div class="row" style="width: 100%">
				<p class="sub" style="width: 100%">
					<a class="btn btn-block btn-social btn-facebook">
				    	<span class="fa fa-facebook"></span> Facebook
				  	</a>
				</p>
			</div>
		</div>
	</div>
</div><?php /**PATH D:\xampp\htdocs\dazohb\resources\views/sections/bottom-section.blade.php ENDPATH**/ ?>