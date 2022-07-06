<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Login</title>
</head>

<body>
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

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>

</html>
