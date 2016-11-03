@extends('main')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
@endsection


@section('content')
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        username here
                    </div>
                    <div class="profile-usertitle-job">
                        Email
                    </div>
                    <div class="profile-usertitle-job">
                        User Age here
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->

                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-stats"></i>
                                Stats </a>
                        </li>

                        <li>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                Threads </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-pencil"></i>
                                Comments </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                Comments
            </div>
        </div>

        <div class="col-md-9">
            <div class="profile-content">
                Threads
            </div>
        </div>

        <div class="col-md-9">
            <div class="profile-content">
                Stats
            </div>
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>



    </div>
</div>

<br>
<br>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
    <script src="/js/user.js"></script>
@endsection