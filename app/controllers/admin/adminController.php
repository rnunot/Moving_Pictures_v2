<?php

namespace admin;

use View, Config, User, Datatables, Auth, Session, Redirect;

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */

	public function display($page='index')
	{
    $data = array(
      "page_title"   => $page
      );

		return View::make('admin.'.$page, $data);
	}

  //should be removed
  public function login()
  {
    $data = array();
    return View::make('admin.login', $data);

  }

  public function get_users_table()
  {
    $users = User::select(['id', 'first_name', 'last_name', 'birthdate', 'sex', 'username', 'email', 'created_at']);
    return Datatables::of($users)
                        ->add_column('operations','<a href="{{ URL::Route(\'admin.impersonate\',$id) }}"><i class="fa fa-sign-in"></i></a>')
                        ->make();
  }

  public function impersonate($id)
  {
    $original_id = Auth::user()->id;
    Auth::loginUsingId($id);
    Session::put('impersonated', true);
    Session::put('original_user', $original_id);
    return Redirect::intended('/');
  }

  public function deImpersonate($id)
  {
    Auth::loginUsingId($id);
    Session::put('impersonated', false);
    Session::put('original_user', '');
    return Redirect::intended('/');
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