<!DOCTYPE html>
<html>

    <head>
    	<title>home</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap -->
        {{ HTML::style("css/bootstrap.min.css") }}
        {{-- HTML::style("bootflat/css/bootflat.min.css") --}}
        {{-- AdminLTE styles --}}
        {{-- HTML::style("admin/css/AdminLTE.css") --}}
        <!-- Extra page css -->
        @yield('extra_css')
        <!-- site styles -->
        {{ HTML::style("css/main.css") }}
    </head>
    <body class="">
        <div class="navbar navbar-main navbar-dark navbar-fixed-top" role="navigation">
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
                                        <form method="POST" action="{{{ URL::route('users.do_login') }}}" accept-charset="UTF-8">
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
                                            <div class="form-group">
                                                <button tabindex="3" type="submit" class="btn btn-black btn-login">Sign in</button>
                                            </div>
                                        </form>
                                        <p class="dropdown-login-text text-left">Don't have an account? <a href="{{{ URL::route('users.register') }}}" class="navbar-link">Register here</a><br>
                                            <a href="{{{ URL::route('users.forgot_password') }}}" class="navbar-link">Forgot your password?</a>
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
            <!--<ol class="breadcrumb small">
                @yield('breadcrumbs')
            </ol>-->
        </div>
        <div class="body">


            @if (Auth::check() and Session::get('impersonated'))
                <div class="">
                    You are impersonating {{{ Auth::user()->first_name }}}. <a href="{{{ URL::route('admin.de_impersonate', Session::get('original_user')) }}}">Go back</a>
                </div>
            @endif


            @yield('pre_content')
            <div class='container'>
                <div class="main-container">
                    @yield('content')
                </div>
            </div>
        </div>
        <footer class="footer-main">
            <div class="container">
                <div class="v-spacer-20"></div>
                <div class="row margin-0">
                    <div class="col-sm-3">
                        <span class="brand">Moving Pictures v2<span>
                    </div>
                    <div class="col-sm-3">
                        <ul class="">
                            <li class="group-title">Group 1</li>
                            <li><a href="#">bigger link 1</a></li>
                            <li><a href="#">bigger than bigger link 2</a></li>
                            <li><a href="#">smaller than bigger link 3</a></li>
                            <li><a href="#">normal link 4</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <ul class="">
                            <li class="group-title">Group 2</li>
                            <li><a href="#">bigger link 1</a></li>
                            <li><a href="#">bigger than bigger link 2</a></li>
                            <li><a href="#">smaller than bigger link 3</a></li>
                            <li><a href="#">normal link 4</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <ul class="">
                            <li class="group-title">Group 3</li>
                            <li><a href="#">bigger link 1</a></li>
                            <li><a href="#">bigger than bigger link 2</a></li>
                            <li><a href="#">smaller than bigger link 3</a></li>
                            <li><a href="#">normal link 4</a></li>
                        </ul>
                    </div>
                </div>
                <div class="v-spacer-30"></div>
                <div class="col-xs-12">
                    <div class="text-center">
                        &copy;Copyright {{date('Y',strtotime('now'))}}. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- jQuery fallback -->
        <script>
        if (!window.jQuery) {
            document.write('<script src="js/jquery.min.js"><\/script>');
        }
        </script>
        {{ HTML::script('js/bootstrap.min.js') }}
        <!-- Extra js -->
        @yield('extra_js')
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