@extends('layouts.admin')

@section('page_title')
  Dashboard
@stop

@section('breadcrumbs')
{{ $breadcrumbs }}
@stop

@section('small_tittle')
{{{ $small_title or "" }}}
@stop

@section('content')

        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        {{{ $n_users }}}
                    </h3>
                    <p>
                        User Registrations
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ URL::route('admin.display','users') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
        </div>
      </div>
@stop