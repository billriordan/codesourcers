@extends('main')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/settings.css">
@endsection



@section('content')

    <div class="contentBox">

        Username: <b>{{$user->name}}</b>
    <!-- Trigger/Open The Modal -->
        <button id="myBtn">Change username</button>

        <!-- The Modal -->
        <div id="usernameModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">x</span>
                New Username: <input> <button class="btn btn-danger">Submit</button>
            </div>

        </div>  <br>


        Email: <b>{{$user->email}}</b>     <!-- Trigger/Open The Modal -->
        <button id="myBtn2">Change email</button>

        <!-- The Modal -->
        <div id="emailModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" id="close2">x</span>
                Change Email <input> <button class="btn btn-danger">Submit</button>
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


        Delete User: Yes No <br>


    </div>



@endsection


@section('scripts')
    <script src="/js/settings.js"></script>
@endsection