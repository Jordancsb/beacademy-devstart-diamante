<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="./css/app.css" rel="stylesheet">
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
		<img class='img' src="./assets/logo.png" alt="profile Pic" height="200" width="200">
	</div>
	<div class="main">
		<div class="col-md-6 col-sm-12">
			<div class="register-form">
				<form>
					<div class="form-group">
						<label for="image">Imagem do Produto</label>
						<input type="file" id="image" name="image" class="form-control-file">
					</div>
					<div class="form-group">
						<label>Nome do Produto</label>
						<input type="email" class="form-control" placeholder="Nome do Produto">
					</div>
					<div class="form-group">
						<label>Descrição</label>
						<textarea cols="40" type="text" class="form-control" placeholder="Descrição do Produto">
                     </textarea>
					</div>
					<div class="form-group">
						<label>Preço de Custo</label>
						<input type="value" class="form-control" placeholder="00.00">
					</div>
					<div class="form-group">
						<label>Preço de Venda</label>
						<input type="value" class="form-control" placeholder="00.00">
					</div>
					<div class="form-group">
						<label>Categoria</label>
					</div>
					<div class="form-group">
						<select>
							<option value="Sapatos">Calçados</option>
							<option value="Roupas">Roupas</option>
							<option value="Acessórios">Acessórios</option>
						</select>
					</div>
					<div class="form-group">
						<label>Quantidade</label>
						<input cols="10" type="number" class="form-control" placeholder="Quantidade">
					</div>
					<button type="submit" class="btn btn-black">Salvar</button>
					<button type="submit" class="btn btn-black">Limpar</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	 integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
	 integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
	 integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
