@extends('main')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
@endsection


@section('content')
<div class="container">
    <div class="row profile">

        <!--Sidebar-->
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="/defaultProfile.png" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-job">
                        <b>Username</b>
                    </div>
                    {{$user->name}}
                    <div class="profile-usertitle-job">
                        <b>Email</b>
                    </div>
                    {{$user->email}}
                    <div class="profile-usertitle-job">
                        <b>Age</b>
                    </div>
                    <b>{{$date}}</b> Months
                    <div class="profile-usertitle-job">
                        <b>Karma rating</b>
                    </div>
                    <b>{{$karma}}</b>
                </div>
                <!-- END SIDEBAR USER TITLE -->
            </div>
        </div>

        <!--Content-->
        <div class="col-md-9">
            <div class="profile-content">
                <h3>Comments</h3>
                <hr>

                <ol>
                @foreach($comments as $comment)
                        <div class="row">
                            <div class="col-md-8">
                                <li><a href="#" data-toggle="collapse" data-target="#comment{{$comment->id}}">{{$comment->created_at->toDayDateTimeString()}}</a></li>
                                <div id="comment{{$comment->id}}" class="collapse">
                                    <div class="thread_thumb">
                                        <div class="panel panel-default">
                                             {{$comment->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                </ol>


                <h3>Threads</h3><hr>

                <ol>
                @foreach($threads as $thread)
                        <div class="row">
                            <div class="col-md-8">
                                <li><a href="#" data-toggle="collapse" data-target="#thread{{$thread->id}}">{{$thread->created_at->toDayDateTimeString()}}</a></li>
                                <div id="thread{{$thread->id}}" class="collapse">
                                    <div class="thread_thumb">
                                        <div class="panel panel-default">
                                            {{$thread->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                </ol>


                <h3>Stats</h3><hr>
                <canvas id="myChart" width="50" height="50"></canvas>

                <h3>Tags</h3><hr>
                <canvas id="tagChart" width="50" height="50"></canvas>

            </div>
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