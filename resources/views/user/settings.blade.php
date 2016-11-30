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

                <form class="form-horizontal" role="form" method="POST" action="{{ route('user.store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <label class="col-md-4 control-label">Username</label>
                        {{ Form::text('username') }}

                        <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>

        </div>  <br>


        Email: <b>{{$user->email}}</b>     <!-- Trigger/Open The Modal -->
        <button id="myBtn2" class="btn btn-success">Change email</button>

        <!-- The Modal -->
        <div id="emailModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" id="close2">x</span>


                <form class="form-horizontal" role="form" method="POST" action="{{ route('user.store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label class="col-md-4 control-label">Email</label>
                    {{ Form::text('email') }}

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>



            </div>

        </div>  <br>
        Admin Privileges: display <br>

        Created Date: display <br>

        Photo: Display photo <br>

        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form enctype="multipart/form-data" action="__URL__" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field (3MB) -->
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <!-- Name of input element determines name in $_FILES array -->
            <input name="userfile" type="file" />
            <input type="submit" value="Send File" />
        </form>


        <button class="btn btn-danger">Delete User</button>



    </div>



@endsection


@section('scripts')
    <script src="/js/settings.js"></script>
@endsection