@extends('admin.layouts.app')

@section('title')
    Login
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="">
                <h3>Login</h3>
                <form method="POST" action="{{ url('/login') }}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="input-field col m6 offset-m3 s12">
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
                            <label for="email"
                                   data-error={{$errors->has('email')?$errors->first('email'):''}}>Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6 offset-m3 s12">
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field center">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection