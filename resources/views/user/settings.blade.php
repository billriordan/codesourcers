@extends('main')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/settings.css">
@endsection



@section('content')

<div class="title m-b-md">
    <h1>Settings Page<h1>
</div>
	
    <div class="panel panel-default contentBox">

        Username: <b>{{$user->name}}</b>
		<!-- Trigger/Open The Modal -->
        <button id="myBtn" class="btn btn-success">Change username</button>

        <!-- The Modal -->
        <div id="usernameModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">x</span>

               {{ Form::open(array('route' => array('user.updateUser', $user->id), 'method'=> 'post'))}}
                        <label class="col-md-4 control-label">Username</label>
                        {{ Form::text('username') }}

                        {{Form::submit('Change Username')}}
                {{Form::close()}}
            </div>

        </div>  <br>


        Email: <b>{{$user->email}}</b>     <!-- Trigger/Open The Modal -->
        <button id="myBtn2" class="btn btn-success">Change email</button>

        <!-- The Modal -->
        <div id="emailModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" id="close2">x</span>


                {{ Form::open(array('route' => array('user.updateEmail', $user->id), 'method'=> 'post'))}}
                <label class="col-md-4 control-label">Email</label>
                {{ Form::text('email') }}

                {{Form::submit('Change Email')}}
                {{Form::close()}}

            </div>

        </div>  <br>

        Created Date: {{ $user->created_at }}<br>

        Photo: <img src=" {{asset('uploads/' . $user->photo_id)}}">
        <button class="btn btn-danger" onclick="window.location='{{url("user/" . $user->id . "/deletePhoto" )}}' ">Delete Photo</button>

        {{ Form::open(array('route' => array('user.uploadImage',$user->id),'method'=>'post', 'files'=>true)) }}
        <div class="control-group">
            <div class="controls">
                {{ Form::file('image') }}
                {!!$errors->first('image')!!}
                @if(Session::has('error'))
                    <p class="errors">{!! Session::get('error') !!}</p>
                @endif
                {{ Form::submit('Submit file') }}
                {{ Form::close() }}
                </div>


        </div>
        {{ Form::open(['url' => 'user/' . $user->id , 'method' => 'delete']) }}
        {{ Form::submit('Delete User', ['class' => 'btn btn-danger']) }}
        {{ Form::close() }}

    </div>



@endsection


@section('scripts')
    <script src="/js/settings.js"></script>
@endsection
