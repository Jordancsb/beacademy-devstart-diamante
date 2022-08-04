<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="https://github.com/Jordancsb/beacademy-devstart-diamante" target="_blank">Diamante</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav mx-auto">
				@if (Auth::check())
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ route('product.store') }}">Loja</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="{{ route('cart.index') }}">Carrinho</a>
					</li>

					@if (Auth::user()->admin)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								Gerenciar
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="{{ route('product.details') }}">Produtos</a></li>
								<li><a class="dropdown-item" href="{{ route('user.details') }}">Usuários</a></li>
								<li><a class="dropdown-item" href="{{ route('order.details') }}">Pedidos</a></li>
							</ul>
						</li>
					@endif

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							{{ Auth::user()->first_name }}
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="{{ route('user.configurations') }}">Configurações</a></li>
							<li><a class="dropdown-item" href="{{ route('user.orders') }}">Pedidos</a></li>
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
