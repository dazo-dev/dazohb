@extends('layouts.app')



@section('content')

<div class="home-container">

    <div class="bg-dark-horse-with-jockey buy-coins">

    	@include('sections.top-ads-section')

    	@include('sections.buy-coin-section')

    </div>

    <div class="buy-coin-refer-friend">

        <div class="row row-referal" style="padding: 0; text-align: center">

            <div class="col-lg-2 col-xl-2 col-12">

                <img src="images/support.png">

            </div>

            <div class="col-lg-4 col-xl-4 col-12">

                <h2>Invite a Friend and Earn Rewards</h2>

            </div>

            <div class="col-lg-4 col-xl-4 col-12">

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula ege. maeceneas Nullam</p>

            </div>

            <div class="col-lg-2 col-xl-2 col-12">

                <button data-toggle="modal" data-target="#referModal">refer now</button>

            </div>

        </div>

    </div>

    @include('sections.subscribe-section')

    @include('sections.accordion-section')

    @include('sections.bottom-ads-section')

    @include('sections.bet-watch-section')

    @include('sections.bottom-section')

    @include('sections.footer-section')





    @include('modals.refer')

</div>

@endsection

