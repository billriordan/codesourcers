@extends('main')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/settings.css">
@endsection



@section('content')

    <div class="contentBox">

        <h3>Settings Page</h3> <hr>
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
        Admin Privileges: display <br>

        Created Date: display <br>

        Photo: Display photo <br>

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
        <button class="btn btn-danger">Delete User</button>



    </div>



@endsection


@section('scripts')
    <script src="/js/settings.js"></script>
@endsection