@extends('layouts.app')

@section('content')

<div class="home-container content-white">
    <div class="subscription-packages bg-dark-horse-with-jockey">
        <div class="row">
            <div class="col-lg-6 col-xl-6 col-12 left-section">
                <h3>Choose Subscription Package</h3>
                <div class="coin-purchase-label">Daily Subscription Package</div>
                <div class="divider"></div>
                <div class="d-flex coin-purchase-subscription">
                    <div>
                        <input type="checkbox" class="non-pro" name="subamt" value="one" target-amt="20" target-opt="1 Day"><label>1 Day</label>
                    </div>
                    <div>
                        <img src="images/DazoCoin-png.png"><label>20</label>
                    </div>
                </div>
                <div class="d-flex coin-purchase-subscription">
                    <div>
                        <input type="checkbox" class="non-pro" name="subamt" value="two" target-amt="40" target-opt="2 Days"><label>2 Days</label>
                    </div>
                    <div>
                        <img src="images/DazoCoin-png.png"><label>40</label>
                    </div>
                </div>
                <input type="date" class="start-date" min="{{ now()->toDateString('Y-m-d') }}">
                <input type="date" class="end-date" min="{{ now()->toDateString('Y-m-d') }}">
                <div class="coin-purchase-label d-flex justify-content-between">
                    <div>Additional Pro Subscription (Optional)</div>
                    <a href="#"><i class="fa fa-info-circle"></i></a>
                </div>
                <div class="divider"></div>
                <div class="d-flex coin-purchase-subscription">
                    <div>
                        <input type="checkbox" class="pro" name="subpro" value="month" target-amt="300" target-opt="Monthly"><label>Monthly</label>
                    </div>
                    <div>
                        <img src="images/DazoCoin-png.png"><label>300</label>
                    </div>
                </div>
                <div class="d-flex coin-purchase-subscription">
                    <div>
                        <input type="checkbox" class="pro" name="subpro" value="year" target-amt="1000" target-opt="Yearly"><label>Yearly</label>
                    </div>
                    <div>
                        <img src="images/DazoCoin-png.png"><label>1000</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 col-12 right-section">
                <div class="d-flex balance-container">
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
                <div class="payment-summary">
                    <h3>Payment Summary</h3>
                    <div class="divider"></div>
                    <div class="coin-purchase-label">SUBSCRIPTION PACKAGES</div>
                    <div class="subscription-items">
                        <div class="d-flex justify-content-between">
                            <div class="my-auto">Daily Packages: <b class="dpackage"></b></div>
                            <div><img src="images/DazoCoin-png.png"><b class="total-d-amt">0</b></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="my-auto">Additional Pro Subscription: <b class="ppackage"></b></div>
                            <div><img src="images/DazoCoin-png.png"><b class="total-p-amt">0</b></div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="d-flex justify-content-between">
                        <div class="coin-purchase-label">TOTAL AMOUNT</div>
                        <div><img src="images/DazoCoin-png.png"><b class="total-amt">0</b></div>
                    </div>
                    <button type="button" class="form-control btn btn-info btn-subscribe" data-toggle="modal" data-target="#modal-subscription-package-confirmation" disabled>Purchase Subscription</button>
                    <div class="error-funds">
                        <div class="msg">Sorry, you have insufficient Dazo Coins.</div>
                        <a href="{{ route('dazocoin') }}">Buy Dazo Coins now.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sections.bottom-section')
    @include('sections.footer-section')
</div>

@include('modals.subscription-package-confirmation')
@include('modals.subscription-package-successful')

@endsection