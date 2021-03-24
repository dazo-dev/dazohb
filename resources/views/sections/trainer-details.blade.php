<div class="horse-details-section">
@php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    @endphp
    <div class="col-sm-12">
        @foreach ($data['trainerDetails'] as $result)
            <div class="row">
                <div class="col-sm-5 p-b-1 p-t-1">
                    <img class="img-horsedetails" src='//localhost/dazoAdmin/public/uploads/trainer-img/{{$result->t_img_path}}' alt="" style="width:100% !important;height:100% !important;">
                </div>
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="horsename">{{ $result->t_name }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table-horseprofile w-100-mb" style="font-size: 13px;">
                                <tr>
                                    <td><p>Sex:</p></td>
                                    <td><p>{{ ($result->t_sex == 'M' ? 'Male' : 'Female') }}</p></td>
                                </tr>
                                <tr>
                                    <td><p>Age:</p></td>
                                    <td><p>{{ $result->t_age }}</p></td>
                                </tr>
                                <tr>
                                    <td><p>Nationality:</p></td>
                                    <td><p>{{ $result->t_nation }}</p></td>
                                </tr>
                                <tr>
                                    <td><p>Background:</p></td>
                                    <td><p>{{ $result->t_bground }}</p></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6" style="font-size: 13px;">
                            <table class="table-horseprofile w-100-mb">
                                <tr>
                                    <td><p>Year Started:</p></td>
                                    <td><p>{{ $result->t_started }}</p></td>
                                </tr>
                                <tr>
                                    <td><p>Total Races:</p></td>
                                    <td><p>{{ $result->totalraces }}</p></td>
                                </tr>
                                <tr>
                                    <td><p>Number of Wins:</p></td>
                                    <td><p>{{ $result->wins1 }}</p></td>
                                </tr>
                                <tr>
                                    <td><p>Number of 2nds:</p></td>
                                    <td><p>{{ $result->wins2 }}</p></td>
                                </tr>
                                <tr>
                                    <td><p>Number of 3rds</p></td>
                                    <td><p>{{ $result->wins3 }}</p></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="row row-profile-bottom" style="font-size: 13px;">
                        <div class="col-12">
                             <i>*Include local and overseas records and earnings</i>
                        </div>
                    </div>
                </div>
            </div>
           
        @endforeach
    </div>
</div>
