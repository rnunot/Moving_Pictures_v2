@extends('layouts.master')

@section('content')
  <div class="profile-header-img"></div>


  <div class="row">

    <div class="col-md-12">
      <div class="profile-user-details">

        <img class="user-photo" src="https://s.gravatar.com/avatar/0021cf49f081de4e8e39df6adff2c98a?s=150" class="" alt="User Image" />

        <h2 class="user-name">{{{ Auth::User()->first_name.' '.Auth::User()->last_name }}}</h2>

      </div>
    </div>

  </div>

  <div class="clearfix"></div>

@stop