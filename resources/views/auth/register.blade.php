@extends('template.default', ['navbar' => false])

@section('title', 'Cadastro')

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
				<div class="register-form">
					<form>
						<div class="form-group">
							<label>Nome Completo</label>
							<input type="text" class="form-control" placeholder="Nome Completo">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" placeholder="E-mail">
						</div>
						<div class="form-group">
							<label>Telefone</label>
							<input type="tel" class="form-control" placeholder="Telefone" size="13" maxlength="13">
						</div>
						<div class="form-group">
							<label>CPF</label>
							<input type="text" class="form-control" placeholder="CPF" size="11" maxlength="11">
						</div>
						<div class="form-group">
							<label>Data de Nascimento</label>
							<input type="date" class="form-control" placeholder="Data de Nascimento">
						</div>
						<div class="form-group">
							<label>Endereço</label>
							<input type="text" class="form-control" placeholder="Endereço">
						</div>
						<div class="form-group">
							<label>CEP</label>
							<input class="form-control" type="" size="8" maxlength="8">
						</div>
						<button type="submit" class="btn btn-black">Cadastrar</button>
						<button type="submit" class="btn btn-balck">Cancelar</button>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection
