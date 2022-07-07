@extends('template.default', ['navbar' => false])

@section('title', 'Cadastro')

@section('content')
	<section>
		@include('partial.sidenav')

		<div class="main">
			<div class="col-md-6 col-sm-12">
				<form method="POST" class="register-form">
					@csrf
					<div class="form-group">
						<label for="first-name">Nome</label>
						<input required type="text" class="form-control" placeholder="Nome" id="first-name"
							   name="first_name">
					</div>
					<div class="form-group">
						<label for="last-name">Sobrenome</label>
						<input required type="text" class="form-control" placeholder="Sobrenome" id="last-name"
							   name="last_name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input required type="email" class="form-control" placeholder="email@email.com" id="email"
							   name="email">
					</div>
					<div class="form-group">
						<label for="phone">Telefone</label>
						<input required type="text" class="form-control" placeholder="(00) 0 0000-0000"
							   pattern="[0-9]"
							   size="13"
							   maxlength="13" id="phone" name="phone">
					</div>
					<div class="form-group">
						<label for="cpf">CPF</label>
						<input required type="text" class="form-control" placeholder="000.000.000-00"
							   pattern="[0-9]"
							   size="11" maxlength="11" id="cpf" name="cpf">
					</div>
					<div class="form-group">
						<label for="birth-date">Data de Nascimento</label>
						<input required type="date" class="form-control" placeholder="00/00/0000" id="birth-date"
							   name="birth_date">
					</div>
					<div class="form-group">
						<label for="cep">CEP</label>
						<input required type="text" class="form-control" placeholder="00000-000" pattern="[0-9]"
							   size="8"
							   maxlength="8" id="cep"
							   name="cep">
					</div>
					<div class="form-group">
						<label for="address">Endereço</label>
						<input required type="text" class="form-control" placeholder="Endereço" id="address"
							   name="address">
					</div>
					<button type="submit" class="btn btn-black">Cadastrar</button>
					<a class="btn btn-black" href="{{ route('login.page') }}">Voltar</a>
				</form>
			</div>
		</div>
	</section>
@endsection
