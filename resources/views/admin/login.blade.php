<?php $bodyclass = 'login-page'; ?>
@extends('layouts.app')

@section('content')
<div class="login-box ">
    
    <div class="login-logo">
        <a href="{{ asset("/bower_components/admin-lte/index2.html") }}"><b>Admin</b>Pannel</a>
    </div>
    <!-- /.login-logo -->
    
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ url('/admin') }}" method="post">
        <!-- <form name="loginForm" id="loginForm" action="" method=""> -->
            @include('message/response-message')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>
        <!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="{{url('register')}}" class="text-center" id="registerNewMember">Register a new membership</a>
    </div>
    <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

@endsection

<script>
// $('#loginForm').on('click', function (e) {
//     e.preventdefault();
//     debeugger();
//     console.log("clicked on form");
//     // var formData = $("#loginForm").serialize();
// })
// var response = {!! session()->get('response') !!}
// console.log(response)
</script>