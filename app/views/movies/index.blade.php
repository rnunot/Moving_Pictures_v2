@extends('layouts.master')
@section('breadcrumbs')
                <li><a href="#">Home</a></li>
                <li class="active">Movies</li>
@stop
        
@section('content')
            <div class="row">
                @foreach ($movies as $movie)
                    <div class="col-md-4 col-movie" style="">
                        <img class="img-responsive center-block" src="{{ $movie->image }}" />
                        <h6 class="text-center">{{ $movie->title }}</h6>
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
    	