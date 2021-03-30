@extends('layouts.app')



@section('content')

@php

        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    @endphp

<div class="home-container">

    <div class="jockey-header" style="background-image: url('{{ $url }}/dazohb/public/images/slider1.jpg');background-color: black;width: 100%;padding: 5% 10%; color:#fff;background-position: center;

    background-repeat: no-repeat;">

        <h2>Dividendazo Owner</h2>

    </div>

    <div class="bg-black content-white user-top-section" style="background:url('') !important;background-color: #0f1010 !important">

        @include('sections.top-ads-section')

        @include('sections.owner-list')

    </div>

       

        @include('sections.bottom-ads-section')

        @include('sections.bet-watch-section')

        @include('sections.bottom-section')

        @include('sections.footer-section')

</div>

@endsection