<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
</head>
<body>
    <div id="app">
        @include('sections.default-header-section')
        @include('sections.slider-section')
        <section class="sect-2">
            @include('sections.top-ads-section')
            @include('sections.calendar-section')
        </section>
        @include('sections.place-bet-section')
        @include('sections.partner-section')
        @include('sections.accordion-section')
        @include('sections.map-track-section')
        @include('sections.contact-section')
        @include('sections.bottom-ads-section')
        @include('sections.bet-watch-section')
        @include('sections.bottom-section')
        @include('sections.footer-section')
    </div>

@include('modals.signin')
@include('modals.register')
@include('modals.terms-and-conditions')
@include('modals.otp')
@include('modals.profile')
@include('modals.notification')

</body>
</html>
