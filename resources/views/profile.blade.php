@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="bg-black content-white user-top-section" style="background:url('') !important;background-color: #0f1010 !important">
        @include('sections.top-ads-section')
        @include('sections.profile-section')
    </div>
       
        @include('sections.bottom-ads-section')
        @include('sections.bet-watch-section')
        @include('sections.bottom-section')
        @include('sections.footer-section')
        @include('modals.changepass')
        @include('modals.changemail')
        @include('modals.loading')
        @include('modals.editprofile')
        @include('modals.mobilechange')
</div>
@endsection
