@extends('template.default', ['navbar' => false])

@section('title', 'Login')

@section('content')
	<section>
		<div class="sidenav">
			<div class="login-main-text">
				<h2>Faça seu login</h2>
				<p>Ainda não faz parte do nosso time! Registre-se agora!</p>
			</div>
			<img class="img" src="./assets/logo.png" alt="profile Pic" height="200" width="200">
		</div>
		<div class="main">
			<div class="col-md-6 col-sm-12">
				<form class="login-form" action="" method="POST">
					@csrf
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" placeholder="Email@email.com" name="email" required>
					</div>
					<div class="form-group">
						<label>Senha</label>
						<input type="password" class="form-control" placeholder="********" name="password" required>
					</div>
					<button type="submit" class="btn btn-black">Acesse</button>
					<a class="btn btn-black" href="{{ route('register.page') }}">Cadastre-se</a>
				</form>
			</div>
		</div>
	</section>
@endsection
