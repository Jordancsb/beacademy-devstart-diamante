<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Diamante</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				@if (Auth::check())
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ route('product.store') }}">Loja</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Carrinho</a>
					</li>
					@if (Auth::user()->admin)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								Gerenciar
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="{{ route('product.new') }}">Cadastrar Produto</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
							</ul>
						</li>
					@endif
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Perfil
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Configurações</a></li>
							<li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
						</ul>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ route('login') }}">Entrar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register.page') }}">Cadastrar</a>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>
