<!DOCTYPE html>
<html>

    <head>
    	<title>home</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link media="all" type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link media="all" type="text/css" rel="stylesheet" href="css/main.css">
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
                        <a class="navbar-brand" href="#">Moving Pictures v2</a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <div class="dropdown">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#" id="dLabel" role="button" data-target="#" class="navbar-link" data-toggle="dropdown">Sign in <span class="caret"></span></a>
                                    <div class="dropdown-menu dropdown-login" role="menu" aria-labelledby="dLabel">
                                        {{ Form::open(array('role' => 'form')) }}
                                            <div class="form-group">
                                                {{ Form::label('username-field','Username or email') }}
                                                {{ Form::text('username-field', '', array('class' => 'form-control', 'placeholder' => 'username')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('password-field','Password') }}
                                                {{ Form::password('password-field', array('class' => 'form-control', 'placeholder' => 'password')) }}
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox-inline">
                                                    {{ Form::checkbox('remember', 'yes', false) }} Remember me
                                                </label>
                                            </div>
                                            {{ Form::button('Sign in', array('type' => 'submit', 'class' => 'btn btn-custom')) }}
                                        {{Form::close()}}
                                        <p class="dropdown-login-text small text-left">Don't have an account? <a href="" class="navbar-link">Register here</a><br>
                                            <a href="#" class="navbar-link">Forgot your password?</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <form class="navbar-form navbar-right" role="search">
                            <!-- <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-custom" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div> --> <!-- /search -->
                        </form>
                        <ul class="nav navbar-nav navbar-left">
                            <li class="active"><a href="#">Movies</a></li>
                            <li><a href="#">Series</a></li>
                            <li><a href="#">Users</a></li>
                        </ul>
                    </div>
                </div><!-- /container -->
            </div><!-- /navbar-inner -->
        </div>
        <div class="container">
            <ol class="breadcrumb small">
                @yield('breadcrumbs')
            </ol>
        </div>
        <div class='container main-container dark'>
            @yield('content')
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
            $('.dropdown-toggle').dropdown();
            $('.dropdown-menu').click(function (e) {
                e.stopPropagation();
            });
        </script>
    </body>
</html>