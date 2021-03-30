@extends('layouts.app')



@section('content')



<div class="home-container">

    

    <div class="bg-black content-white user-top-section" style="background:url('') !important;background-color: #0f1010 !important">

        @include('sections.top-ads-section')

       

    </div>

        @include('sections.map-track-section')

        @include('sections.bottom-ads-section')

        @include('sections.bet-watch-section')

        @include('sections.bottom-section')

        @include('sections.footer-section')

        

</div>

@endsection

