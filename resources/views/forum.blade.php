@extends('layouts.app')

@section('content')
@php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    @endphp
<div class="container">
    <div class="jockey-header" style="background-image: url('{{ $url }}/dazohb/public/images/slider1.jpg');background-color: black;width: 100%;padding: 5% 10%; color:#fff;background-position: center;
    background-repeat: no-repeat;">
        <h1>Dividendazo Forum</h1>
    </div>
    <div class="bg-black content-white user-top-section" style="background:url('') !important;background-color: #0f1010 !important">
        <div class="row">
            <div class="col-lg-10 col-sm-12" style="font-size:13px;">
                <div class="row">
                    <h5>General Topics</h5>
                    <table width="100%" class="table table-striped table-bordered dataTable no-footer" style="color: #fff">
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="row">
                    <h5>Tips</h5>
                    <table width="100%" class="table table-striped table-bordered dataTable no-footer" style="color: #fff">
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="row">
                    <h5>Personal Discussion</h5>
                    <table width="100%" class="table table-striped table-bordered dataTable no-footer" style="color: #fff">
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="row">
                    <h5>Others</h5>
                    <table width="100%" class="table table-striped table-bordered dataTable no-footer" style="color: #fff">
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 90%">
                                <p style="margin: 0; padding: 0; font-weight: bold">Title Forum Sample 1</p>
                                <p style="margin: 0; padding: 0">Posted By: Admin 1 - December 25, 2020</p>
                            </td>
                            <td style="width: 10%; text-align: center">
                                <i class="fas fa-eye">120</i>
                                <i class="fas fa-reply-all">120</i>
                            </td>
                        </tr>
                    </table>
                </div>
               
            </div>
            <div class="col-lg-2 col-sm-12" style="font-size:13px;">
                <div class="row">
                    <label>Top 5 Latest Posts</label>
                    <table style="width: 100%; color: #fff" class="table table-striped table-bordered dataTable no-footer">
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                    </table>
                </div>

                <div class="row" style="margin-top: 25px">
                    <label>Top 5 Most Replies</label>
                    <table style="width: 100%; color: #fff" class="table table-striped table-bordered dataTable no-footer">
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                        <tr>
                            <td><p>Title Forum Sample 1</p></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
        {{--@include('sections.horses-slider-section')--}}
        @include('sections.bottom-ads-section')
        @include('sections.bet-watch-section')
        @include('sections.bottom-section')
        @include('sections.footer-section')
</div>
@endsection

