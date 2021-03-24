@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content-white contact-section">
    	@include('sections.top-ads-section')
    	<br>
    	@include('sections.buy-coin-section')
    </div>
    <div class="content-white contact-section">
        <div class="row row-referal" style="padding: 0">
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                <img src="images/support.png">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <h2 style="font-size: 40px; font-style: italic; font-weight: bolder">Invite a Friend and Earn Rewards</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <p style="font-size: 15px;width: 90%;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula ege.
                    maeceneas Nullam</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                <button style="width: 100%; height: 5vh; text-transform: uppercase; background-color: #0D6499; border: none; color: #fff;" data-toggle="modal" data-target="#referModal">refer now</button>
            </div>
        </div>
    </div>
    <div class="content-white" style="background-color: #0f1010; padding: 5% 5%">
       @include('sections.subscribe-section')
    </div>
    @include('sections.accordion-section')
    @include('sections.bottom-ads-section')
    @include('sections.bet-watch-section')
    @include('sections.bottom-section')
    @include('sections.footer-section')


    @include('modals.refer')
</div>
@endsection
