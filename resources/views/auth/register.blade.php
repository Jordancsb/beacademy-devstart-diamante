@extends('template.default', ['navbar' => false])

@section('title', 'Cadastro')

@section('content')
	<section>
		@include('partial.sidenav', ['text' => 'Bom te ver aqui! Seja muito bem-vindo!'])

		<div class="main">
			<div class="col-md-8 col-sm-12">

				<form method="POST" class="register-form" action="{{ route('users.create') }}">
					<h1 class="mb-3">Preencha os dados</h1>
					@include('partial.error')
					@csrf

					<div class="input-group flex-nowrap mb-2">
						<span class="input-group-text">Nome Completo</span>
						<input required type="text" class="form-control" placeholder="Nome" name="first_name" maxlength="50">
						<input required type="text" class="form-control" placeholder="Sobrenome" name="last_name" maxlength="50">
					</div>

					<div class="input-group flex-nowrap mb-2">
						<span class="input-group-text" id="email">Email</span>
						<input aria-describedby="email" required type="email" class="form-control" placeholder="seu@email.com"
							id="email" name="email">
					</div>

					<div class="input-group flex-nowrap mb-2">
						<span class="input-group-text" id="password">Senha</span>
						<input aria-describedby="password" required type="password" class="form-control" placeholder="********"
							id="password" name="password" minlength="6" maxlength="12">
					</div>

					<div class="input-group flex-nowrap mb-2">
						<span class="input-group-text" id="phone">Telefone</span>
						<input aria-describedby="phone" required type="text" class="form-control" placeholder="(00) 0 0000-0000"
							pattern="[0-9]+" size="13" maxlength="13" id="phone" name="phone">
					</div>

					<div class="input-group flex-nowrap mb-2">
						<span class="input-group-text" id="cpf">CPF</span>
						<input aria-describedby="cpf" required type="text" class="form-control" placeholder="000.000.000-00"
							pattern="[0-9]+" size="11" maxlength="11" id="cpf" name="cpf">
					</div>

					<div class="input-group flex-nowrap mb-2">
						<span class="input-group-text" id="birth-date">Data de Nascimento</span>
						<input aria-describedby="birth-date" required type="date" class="form-control" placeholder="00/00/0000"
							id="birth-date" name="birth_date">
					</div>

					<a class="btn btn-outline-dark" href="{{ route('login') }}">Entrar</a>
					<button type="submit" class="btn btn-dark">Cadastrar</button>
				</form>
			</div>
		</div>
	</section>
@endsection
