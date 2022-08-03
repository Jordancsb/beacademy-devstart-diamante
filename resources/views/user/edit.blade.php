@extends('template.default')
@section('title', 'Edição de Usuário')
@section('content')
	<div class="container">
		<h1>Edição do Usuário</h1>

		<form action="{{ route('users.update', $user->id) }}" method="post">
			@method('PUT')
			@csrf

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text">Nome Completo</span>
				<input required type="text" class="form-control" placeholder="Nome" value="{{ $user->first_name }}" name="first_name">
				<input required type="text" class="form-control" placeholder="Sobrenome" value="{{ $user->last_name }}"
					name="last_name">
			</div>

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="email">Email</span>
				<input aria-describedby="email" required type="email" class="form-control" placeholder="seu@email.com"
					id="email" value="{{ $user->email }}" name="email">
			</div>

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="password">Senha</span>
				<input aria-describedby="password" type="password" class="form-control" placeholder="********" id="password"
					name="password">
			</div>

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="phone">Telefone</span>
				<input aria-describedby="phone" required type="text" class="form-control" placeholder="(00) 0 0000-0000"
					pattern="[0-9]+" size="13" maxlength="13" id="phone" value="{{ $user->phone }}" name="phone">
			</div>

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="cpf">CPF</span>
				<input aria-describedby="cpf" required type="text" class="form-control" placeholder="000.000.000-00"
					pattern="[0-9]+" size="11" maxlength="11" id="cpf" value="{{ $user->cpf }}" name="cpf">
			</div>

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="birth-date">Data de Nascimento</span>
				<input aria-describedby="birth-date" required type="date" class="form-control" placeholder="00/00/0000"
					id="birth-date" value="{{ $user->birth_date->format('Y-m-d') }}" name="birth_date">
			</div>

			<div class="form-check mb-3">
				<input class="form-check-input" type="checkbox" value="1" id="admin" name="admin"
					{{ (bool) $user->admin ? 'checked' : '' }}>
				<label class="form-check-label" for="admin">
					Administrador
				</label>
			</div>

			<a href="{{ url()->previous() }}" class="btn btn-outline-dark">Voltar</a>
			<button type="submit" class="btn btn-dark">Atualizar</button>
		</form>
	</div>
@endsection
