<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
	public function __construct(private User $user)
	{
	}

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
		$credentials = $req->only('email', 'password');

		if (Auth::attempt($credentials))
			return redirect()->intended('/login');

		return redirect()->back();
	}

	public function postNewUser(Request $req)
	{
		$data = $req->all();

		$this->create($data);
	}

	public function getLogout()
	{
		Auth::logout();

		return redirect()->route('login.page');
	}
}
