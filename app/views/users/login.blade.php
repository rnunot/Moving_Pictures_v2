@extends('layouts.master')

@section('extra_css')
    <!-- Ionicons -->
    {{ HTML::style("admin/css/ionicons.min.css") }}
    <!-- font Awesome -->
    {{ HTML::style("admin/css/font-awesome.min.css") }}
@stop

@section('breadcrumbs')
<li>home</li>
<li>Login</li>
@stop

@section('content')
    <div clas="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="col-xs-4 text-right"><h1>Login</h1></div><div class="clearfix"></div>
        <div class="v-spacer-20"></div>
        <form class="form-horizontal" method="POST" action="{{{ URL::route('users.login') }}}" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
            <div class="form-group">
                <label class="col-sm-4 control-label" for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
                <div class="col-sm-8">
                    <input class="form-control" tabindex="4" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                <div class="col-sm-8">
                    <input class="form-control" tabindex="5" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8">
                @if (Session::get('error'))
                    <div class="text-red"><i class="fa fa-ban"></i> {{{ Session::get('error') }}}</div>
                @endif

                @if (Session::get('notice'))
                    <div class="alert">{{{ Session::get('notice') }}}</div>
                @endif
            </div>
            <div class="checkbox col-sm-offset-4 col-sm-8">
                <label for="remember2" class="checkbox-inline">
                    <input tabindex="6" type="checkbox" name="remember" id="remember2" value="1">
                    {{{ Lang::get('confide::confide.login.remember') }}}
                </label>
            </div>
            <div class="clearfix"></div>
            <div class="v-spacer-20"></div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button tabindex="7" type="submit" class="btn btn-black btn-login">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                    <div class="v-spacer-20"></div>
                    <p class="">
                        Don't have an account? <a href="{{{ URL::route('users.register') }}}" class="navbar-link">Register here</a><br>
                        <a href="{{{ URL::route('users.forgot_password') }}}" class="navbar-link">Forgot your password?</a>
                    </p>
                </div>
            </div>
        </form>
        <div class="v-spacer-40"></div>
        <!-- <div class="margin text-center">
            <span>Sign in using social networks</span>
            <br/>
            <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
            <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
            <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
        </div> -->

      </div>
      <div class="clearfix"></div>
    </div>
@stop