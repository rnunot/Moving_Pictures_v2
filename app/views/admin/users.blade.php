@extends('layouts.admin')

@section('extra_css')
          {{ HTML::style('admin/css/datatables/dataTables.bootstrap.css') }}
@stop

@section('breadcrumbs')
          {{ $breadcrumbs }}
@stop

@section('page_title')
          Users
@stop

@section('small_title')
          Management Page
@stop

@section('content')
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Users</h3>
              </div>
              <div class="box-body table-responsive">
                <table id="users-table" class="table table-bordered table-striped dataTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Birthday</th>
                      <th>Sex</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Created at</th>
                      <th>Confirmed</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
@stop

@section('extra_js')
          {{ HTML::script('//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}
          {{ HTML::script('//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js') }}
          <script>
          $(document).ready( function () {
            $('#users-table').dataTable( {
                serverSide: true,
                ajax: {
                  url: "{{ URL::route('admin.get_users_table') }}",
                  type: "POST",
                },
                "columnDefs": [
                  {
                    "targets": -2,
                    "class": 'js-confirmed-column'
                  },
                  {
                    "targets": -1,
                    "sortable": false
                  }
                ],

            });

            $('#users-table').on('draw.dt', function() {
              $('.js-edit').click(function(e) {
                e.preventDefault();

                $(this).parents('tr').find('.js-confirmed-column').find('div').toggle();

                if ( $(this).hasClass('text-yellow') ) {
                  $(this).removeClass('text-yellow').addClass('text-green').find('i').removeClass('fa-edit').addClass('fa-check');
                }
                else {
                  var val = $(this).parents('tr').find('.js-confirmed-column input').val();
                  if (val === '1' || val === '0') {
                    $(this).parents('tr').find('.js-confirmed-column span').html(val);
                  }
                  else {
                    $(this).parents('tr').find('.js-confirmed-column input').val($(this).parents('tr').find('.js-confirmed-column span').html());
                  }

                  $(this).removeClass('text-green').addClass('text-yellow').find('i').removeClass('fa-check').addClass('fa-edit');
                }

              });
            });

          });
          </script>
@stop