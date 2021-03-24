@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-black content-white user-top-section">
        @include('sections.top-ads-section')
            <br>
        <!-- @include('sections.registered-top') -->
    </div>
    <div class="full-race-program">
        @include('sections.full-race-prog-n-section')
    </div>
    <div class="content-white contact-section">
        @include('sections.coins-refer-section')
    </div>
    <div class="subscribe-section">
        @include('sections.subscribe-section')
    </div>
    @include('sections.map-track-section')
    @include('sections.place-bet-section')
    @include('sections.bottom-ads-section')
    @include('sections.bet-watch-section')
    @include('sections.bottom-section')
    @include('sections.footer-section')

    @include('modals.refer')
    @include('modals.calendar')
</div>
@endsection

