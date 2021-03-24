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
				<h2 style="font-size: 25px">Purchase a daily subscription package<br> to view the Race Program </h2>
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
				<input type="date" class="form-control start-date" min="<?php echo e(now()->toDateString('Y-m-d')); ?>" style="margin-top: 25px; width: 400px;display: none">
				<input type="date" class="form-control end-date" min="<?php echo e(now()->toDateString('Y-m-d')); ?>" style="margin-top: 10px; width: 400px;display: none">
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
	

<?php /**PATH D:\xampp\htdocs\dazobh\resources\views/sections/registered-top.blade.php ENDPATH**/ ?>