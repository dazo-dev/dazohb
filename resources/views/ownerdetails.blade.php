@extends('layouts.app')



@section('content')



<div class="home-container">

    <!-- <div class="jockey-header" style="background-color: black;width: 100%;padding: 7% 10% 1% 10%;color: #fff;">

        <h2>Dividendazo Owner</h2>

    </div> -->

    <div class="bg-black content-white user-top-section" style="background:url('') !important;background-color: #0f1010 !important">

        @include('sections.top-ads-section')

        @include('sections.owner-details')

    </div>

        @include('sections.owner-horse')

        @include('sections.horses-slider-section')

        

        @include('sections.bottom-ads-section')

        @include('sections.bet-watch-section')

        @include('sections.bottom-section')

        @include('sections.footer-section')

</div>

@endsection