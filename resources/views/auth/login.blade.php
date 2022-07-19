@extends('template.default', ['navbar' => false])

@section('title', 'Login')

@section('content')
	<section>
		@include('partial.sidenav', ['text' => 'Ainda não faz parte do nosso time! Registre-se agora!'])

		<div class="main">
			<div class="col-md-6 col-sm-12">
				<form class="login-form" action="{{ route('auth.login') }}" method="POST">
					@include('partial.error')
					@csrf
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
						<div id="emailHelp" class="form-text">Ainda não possui cadastro? Clique abaixo e inscreva-se!</div>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Senha</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<button type="submit" class="btn btn-black">Entrar</button>
					<a class="btn btn-outline-black" href="{{ route('register.page') }}">Cadastre-se</a>
				</form>
			</div>
		</div>
	</section>
@endsection
