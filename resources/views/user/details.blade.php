@extends('template.default')
@section('title', 'Gerenciar Usuários')
@section('content')
	<div class="container mt-2">
		<h1>Gerenciar Usuários</h1>

		@include('message.flash-message')
		
		<table class="table table-dark table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nome</th>
					<th scope="col">Email</th>
					<th scope="col">Contato</th>
					<th scope="col">Nascimento</th>
					<th scope="col">CEP</th>
					<th scope="col">Endereço</th>
					<th scope="col">CPF</th>
					<th scope="col">Tipo</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<th>{{ $user->id }}</th>
						<td>{{ $user->full_name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->phone }}</td>
						<td>{{ $user->formatted_birth_date }}</td>
						<td>{{ $user->cep }}</td>
						<td>{{ $user->address }}</td>
						<td>{{ $user->cpf }}</td>
						<td>{{ $user->admin ? 'Admin' : 'Comum' }}</td>
						<td>
							<form action="{{ route('users.delete', $user->id) }}" method="POST">
								@method('DELETE')
								@csrf
								<a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-warning btn-sm mb-1">Editar</a>
								<button type="submit" class="btn btn-outline-danger btn-sm">Deletar</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
