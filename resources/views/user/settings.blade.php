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
                <span class="close">x</span>
                Change Email <input> <button class="btn btn-danger">Submit</button>
            </div>

        </div>  <br>
        Admin Privileges: display <br>

        Created Date: display <br>

        Photo: Display photo <br>
        Upload button | Delete button <br>

        Delete User: Yes No <br>


    </div>



@endsection


@section('scripts')
    <script src="/js/settings.js"></script>
@endsection