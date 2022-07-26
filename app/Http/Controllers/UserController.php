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

	public function getAdminListPage()
	{
		$users = $this->user->all();

		return view('user.details', compact('users'));
	}

	public function getUserEditPage($id)
	{
		if (!$user = $this->user->find($id))
			return redirect()->back();

		return view('user.edit', compact('user'));
	}

	function checkout()
	{
		return view('auth.checkout');
	}

	public function postLoginAuth(UserLoginFormRequest $req)
	{
		$credentials = $req->only('email', 'password');

		if (Auth::attempt($credentials))
			return redirect()->intended(route('product.store'));

		return redirect()->back();
	}

	public function postNewUser(Request $req)
	{
		$data = $req->only(
			'first_name',
			'last_name',
			'email',
			'phone',
			'cpf',
			'birth_date',
			'cep',
			'address'
		);

		$data['password'] = bcrypt($req->password);

		$this->user->create($data);

		return redirect()->route('login');
	}

	public function getLogout()
	{
		Auth::logout();

		return redirect()->route('product.store');
	}

	public function updateUser(Request $req, $id)
	{
		$user = $this->user->findOrFail($id);

		$data = $req->only('first_name', 'last_name', 'email', 'phone', 'cpf', 'birth_date', 'cep', 'address');
		$data['admin'] = (bool)$req->admin ?? false;

		if ($req->password)
			$data['password'] = bcrypt($req->password);

		$user->update($data);

		return redirect()->route('user.details');
	}

	public function deleteUser($id)
	{
		$user = $this->user->findOrFail($id);

		$user->delete();

		return Auth::user()->id == $id ? redirect()->route('logout') : redirect()->route('user.details');
	}
}
