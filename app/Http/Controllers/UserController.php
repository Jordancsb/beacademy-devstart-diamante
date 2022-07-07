<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginFormRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
	function getLoginPage()
	{
		return view('auth.login');
	}

	function getRegisterPage()
	{
		return view('auth.register');
	}

	function checkout()
	{
		return view('auth.checkout');
	}

	public function postLoginAuth(UserLoginFormRequest $req)
	{
		$queryParams = $req->only('email', 'password');

		$user = User::where('email', $queryParams['email'])->get()[0] ?? null;

		if ($user && password_verify($queryParams['password'], $user->password))
			dd('authenticated');

		dd('not authenticated');
	}

	public function postNewUser(Request $req)
	{
		$data = $req->all();

		User::create($data);
	}
}
