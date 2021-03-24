@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content-white contact-section">
    	@include('sections.top-ads-section')
    	<br>
    	@include('sections.subscribe-section')
    </div>
    <div class="bg-black content-white user-top-section">
    	@include('sections.pro-package')
    </div>
    <div class="content-white contact-section">
        @include('sections.coins-refer-section')
    </div>
    @include('sections.bottom-ads-section')
    @include('sections.bet-watch-section')
    @include('sections.bottom-section')
    @include('sections.footer-section')


    @include('modals.refer')
</div>
@endsection
