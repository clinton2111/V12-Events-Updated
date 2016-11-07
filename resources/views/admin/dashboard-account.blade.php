@extends('admin.layouts.app')
@section('title')
    Dashboard - Account Settings
@endsection
@section('content')
    <div class="container">
        <h4> Account Settings</h4>

        <div>
            <h5>Change Password</h5>
            <form action="" method="post">

                <input type="hidden" id='_token' value="{{csrf_token()}}">
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input id="new_password" type="password" class="validate" name="password" required>
                        <label for="password">New Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <input id="password_confirmation" type="password" class="validate" name="password_confirmation"
                               required>
                        <label for="password_confirmation">Retype Password</label>
                    </div>
                </div>
                <div class="">
                    <button class="btn btn-primary" id="ajaxUpdatePassword">
                        Update Password
                    </button>
                </div>
            </form>
        </div>

        <br>
        <hr>
        <br>
        <div>
            <h5>Change Avatar</h5>
            <form action="{{ route('user.update_avatar') }}" enctype="multipart/form-data" method="post">

                <div class="">
                    {{--<label for="avatar">Update Profile Image</label>--}}
                    <input type="file" name="avatar">
                </div>
                <br>
                {{csrf_field()}}
                <div class="">
                    <input type="submit" class="btn btn-sm btn-primary" value="Update Avatar">
                </div>

            </form>
        </div>
    </div>

    <script>
        var URL = '{{route('user.update_password')}}';
    </script>
@endsection