<div class="bottom-section">

	<div class="row">

		<div class="col-lg-4 col-xl-4 col-12 contact-column">

			<div class="header">get in touch with us</div>

			<div class="content d-flex">

				<div>
					<i class="fas fa-map-marker-alt"></i> 
				</div>
				456 Lorem Ipsum Dolor, Nullam Street,<br>
				Phasellus Eget 4728

			</div>


			<div class="content">

				<i class="fas fa-phone"></i>+639123845614

			</div>


			<div class="content font-weight-bold">

				<i class="fas fa-mail-bulk"></i>dazoph@gmail.com

			</div>


		</div>

		<div class="col-lg-4 col-xl-4 col-12 contact-column">

			<div class="header">quick links</div>

			<div class="content mb-0">Home</div>

			<div class="content mb-0">Learn How To Race</div>

			<div class="content mb-0">OTB Locator</div>

			<div class="content mb-0">Livestream</div>

			<div class="content mb-0">Bet</div>

			@if( Auth::user() )

			<div class="content mb-0">Races</div>

			<div class="content mb-0">Horses</div>

			<div class="content mb-0">Forum</div>

			@endif

			<div class="content">Contact Us</div>

		</div>

		<div class="col-lg-4 col-xl-4 col-12 contact-column">

			<div class="header">account</div>

			@if( Auth::user() )

			<div class="content mb-0">
				<a href="{{ route('profile') }}">My Account</a>
			</div>

			<div class="content mb-0">
				<a href="{{ route('dazocoin') }}">Buy Dazo Coins</a>
			</div>

			<div class="content">
				<a href="javascript:void(0)" data-toggle="modal" data-target="#referModal">Invite Friends</a>
			</div>

			@else

			<div class="content mb-0">
				<a href="">Log In</a>
			</div>

			<div class="content">
				<a href="javascript:void(0)" data-toggle="modal" data-target="#registerModal">Sign up</a>
			</div>

			@endif

			<div class="header">Follow Us</div>

			<a class="btn btn-social ">
				<span class="fa fa-facebook"></span> Facebook
			</a>


		</div>

	</div>

</div>