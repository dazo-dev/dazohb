@extends('layouts.app')

@section('content')
@csrf
<div class="container">
    <!-- <div class="jockey-header" style="background-color: black;width: 100%;padding: 5% 10%;">
        <h2>Dividenzo Jockeys</h2>
    </div> -->
    <div class="bg-black content-white user-top-section" style="background:url('') !important;background-color: #0f1010 !important">
        @include('sections.top-ads-section')
        @include('sections.horse-details-section')
    </div>
        @include('sections.horse-details-table-section')
        @include('sections.horses-slider-section')
        @include('sections.bottom-ads-section')
        @include('sections.bet-watch-section')
        @include('sections.bottom-section')
        @include('sections.footer-section')
</div>
@endsection