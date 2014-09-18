<!DOCTYPE html>
<html>

    <head>
    	<title>home</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        {{ HTML::style("css/bootstrap.min.css") }}
        {{ HTML::style("admin/css/AdminLTE.css") }}
        {{ HTML::style("css/main.css") }}
    </head>
    <body class="">
        <div class="navbar navbar-main navbar-dark navbar-static-top" role="navigation">
            <div class="navbar-inner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ URL::route('home') }}">Moving Pictures v2</a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        @if(!Auth::check())
                        <div class="dropdown">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#" id="dLabel" role="button" data-target="#" class="navbar-link" data-toggle="dropdown">Sign in <span class="caret"></span></a>
                                    <div class="dropdown-menu dropdown-login" role="menu" aria-labelledby="dLabel">
                                        <form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                                            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                                            <div class="form-group">
                                                <label for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
                                                <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                                            </div>
                                            <div class="form-group">
                                            <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                                            <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                                            </div>
                                            <div class="checkbox">
                                                <label for="remember" class="checkbox-inline">
                                                    <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                                                    {{{ Lang::get('confide::confide.login.remember') }}}
                                                </label>
                                            </div>
                                            @if (Session::get('error'))
                                                <div class="alert alert-error">{{{ Session::get('error') }}}</div>
                                            @endif

                                            @if (Session::get('notice'))
                                                <div class="alert">{{{ Session::get('notice') }}}</div>
                                            @endif
                                            <div class="form-group">
                                                <button tabindex="3" type="submit" class="btn btn-custom">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                                            </div>
                                        </form>
                                        <!--
                                        {{ Form::open(array('role' => 'form')) }}
                                            <div class="form-group">
                                                {{ Form::label('email','Username or email') }}
                                                {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'username or email')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('password','Password') }}
                                                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'password')) }}
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                    {{ Form::checkbox('remember', 'yes', false) }} Remember me
                                                </label>
                                            </div>
                                            {{ Form::button('Sign in', array('type' => 'submit', 'class' => 'btn btn-custom')) }}
                                        {{Form::close()}} -->
                                        <p class="dropdown-login-text small text-left">Don't have an account? <a href="{{{ URL::route('users.register') }}}" class="navbar-link">Register here</a><br>
                                            <a href="#" class="navbar-link">Forgot your password?</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @else
                        <ul class="navbar-right nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>{{{ Auth::user()->first_name.' '.Auth::user()->last_name }}} <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header bg-black">
                                        <img src="https://s.gravatar.com/avatar/0021cf49f081de4e8e39df6adff2c98a?s=80" class="img-circle" alt="User Image" />
                                        <p>
                                            {{{ Auth::user()->first_name.' '.Auth::user()->last_name }}}
                                            <small>Member since {{{ date('M. Y',strtotime(Auth::user()->created_at)) }}}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>

                                        @if(Auth::user()->hasRole('Admin'))
                                            <div class="pull-left">
                                                <a href="{{ URL::route('admin') }}" class="btn btn-default btn-flat btn-backoffice">Back Office</a>
                                            </div>
                                        @endif

                                        <div class="pull-right">
                                            <a href="{{ URL::route('users.logout') }}" class="btn btn-default btn-flat btn-sign-out">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                        <!-- <form class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-custom" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                        </form> --><!-- /search -->
                        <ul class="nav navbar-nav navbar-left">
                            <?php if(!isset($active_nav)) $active_nav='' ?>
                            <li @if($active_nav=='movies') {{ 'class="active"' }} @endif ><a href="{{ URL::route('movies') }}">Movies</a></li>
                            <li><a href="#">Series</a></li>
                            <li><a href="#">Users</a></li>
                        </ul>
                    </div>
                </div><!-- /container -->
            </div><!-- /navbar-inner -->
        </div>
        <div class="container hidden-xs">
            <ol class="breadcrumb small">
                @yield('breadcrumbs')
            </ol>
        </div>
        <div class='container'>
            <div class="main-container">
                @yield('content')
            </div>
        </div>

        <div class="footer-main footer-dark">
            <div class="container">
                <div class="row">

                    <p>add text</p>
                </div>
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>

            function setBtnMargin() {
                o1 = $('.btn-backoffice').offset();
                o2 = $('.btn-sign-out').offset();
                margin=Math.round((o2.left-o1.left-$('.btn-backoffice').outerWidth())/2)
                $('.btn-backoffice').css('margin-left',margin+'px');
                return margin;
            }

            $('.dropdown-toggle').dropdown();
            $('.dropdown').on('shown.bs.dropdown', function(){
                if($('.btn-backoffice').css('margin-left')==='0px') {
                    setBtnMargin();
                }
            });
            $('.dropdown-menu').click(function (e) {
                e.stopPropagation();
            });
        </script>
    </body>
</html>