<?php

namespace admin;

use View, Config, User, Datatables, Auth, Session, Redirect, URL;

class AdminController extends \BaseController {

	/**
	 * Display required page.
	 * GET /admin_panel
	 *
	 * @return Response
	 */

	public function display($page='dashboard')
	{
    $breadcrumbs = '<li><a href="'.URL::route('admin.display', 'dashboard').'"><i class="fa fa-dashboard"></i> Home</a></li>';

    if ($page != 'index')
      $breadcrumbs.= '<li class="active">'.$page.' </li>';

    $data = array(
      "page_title"   => $page,
      "breadcrumbs"  => $breadcrumbs
      );

    if ($page=='dashboard') {
      $data['n_users'] = User::all()->count();
    }

		return View::make('admin.'.$page, $data);
	}

  //should be removed
  public function login()
  {
    $data = array();
    return View::make('admin.login', $data);

  }

  /**
   * Generate users dataTable.
   * GET /admin/get_users_table
   *
   * @return Response
   */
  public function get_users_table()
  {
    $users = User::select(['id', 'first_name', 'last_name', 'birthdate', 'sex', 'username', 'email', 'created_at', 'confirmed']);
    return Datatables::of($users)
                        ->add_column('operations',function ($row) {
                          $td_html = '<span class="operations">';

                          if ( Auth::User()->id != $row->id )
                            $td_html.= '<a title="impersonate" class="impersonate" href="'.URL::Route('admin.impersonate',$row->id).'"><i class="fa fa-sign-in"></i></a>';

                          $td_html.= '<a title="edit" class="js-edit text-yellow" href="#"><i class="fa fa-edit"></i></a>
                          <a title="delete" class="text-red" href="#"><i class="fa fa-times"></i></a>
                          </span>';
                          return $td_html;
                        })
                        ->edit_column('birthdate', function ($row) {
                          return date('d-m-Y', strtotime($row->birthdate));
                        })
                        ->edit_column('confirmed', function ($row) {
                          return '<div class="display-none"><form><input type="text" name="confirmed" value="'.$row->confirmed.'"></form></div><div><span>'.$row->confirmed.'</span></div>';
                        })
                        ->make();
  }

  /**
   * Starts impersonating user, redirects to home page.
   * GET /admin/impersonate
   *
   * @return Response
   */
  public function impersonate($id)
  {
    $original_id = Auth::user()->id;
    Auth::loginUsingId($id);
    Session::put('impersonated', true);
    Session::put('original_user', $original_id);
    return Redirect::route('home');
  }

  /**
   * Stop impersonating user, redirects to users page.
   * GET /admin/deImpersonate
   *
   * @return Response
   */
  public function deImpersonate($id)
  {
    Auth::loginUsingId($id);
    Session::put('impersonated', false);
    Session::put('original_user', '');
    return Redirect::route('admin.display','users');
  }

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}