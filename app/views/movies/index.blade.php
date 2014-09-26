@extends('layouts.master')

@section('extra_css')
    <!-- Ionicons -->
    {{ HTML::style("admin/css/ionicons.min.css") }}
    <!-- font Awesome -->
    {{ HTML::style("admin/css/font-awesome.min.css") }}
@stop

@section('breadcrumbs')
                <li><a href="#">Home</a></li>
                <li class="active">Movies</li>
@stop

@section('pre_content')
    <div class="jumbotron teste">
        <div class="container">
            <div class="v-spacer-100"></div>
            <div class="col-md-12">
              <h3 clas="text-white">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
              </h3>
            </div>
        </div>
    </div>
@stop

@section('content')
            <div class="row">
                @foreach ($movies as $movie)
                    <div class="col-md-4 col-movie" style="">
                        <img class="img-responsive center-block" src="{{ $movie->image }}" />
                        <h6 class="text-center">{{ $movie->title }}</h6>
                        <div class="rating-stars text-center text-yellow">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>
                            {{ $movie->imdb_link }}<br>
                            {{ $movie->director }}<br>
                            {{ $movie->duration }}<br>
                            {{ $movie->genre }}<br>
                        </p>
                    </div>
                @endforeach
    	</div>
@stop
