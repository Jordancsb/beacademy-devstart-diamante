@extends('template.default', ['navbar' => false])

@section('title', 'Login')

@section('content')
	<section>
		@include('partial.sidenav')

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
