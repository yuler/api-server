<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \App\User::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user = $request->only('name','email','password');
		$v = \Validator::make($request->all(), [
	        'email' => 'required|unique:users',
			'name' => 'required',
			'password' => 'required',
	    ]);
		
	    if ($v->fails())
	    {
	        return response($v->errors(),500);
	    }
		
		$user['password'] = bcrypt($user['password']);
		\App\User::create($user);
		return response('Create user success.',201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return \App\User::findOrFail($id);
	}

	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$user = \App\User::find($id);
		if($request->has('name')) $user->name = $request->input('name');
		if($request->has('eamil')) $user->eamil = $request->input('eamil');
		if($request->has('password')) $user->password = bcrypt($request->input('password'));
		$user->save();
		return response('Update user success.',200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\User::find($id)->delete();
		return response('Delete user success.',200);
	}

}
