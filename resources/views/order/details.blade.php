@extends('template.default')
@section('title', 'Gerenciar Pedidos')
@section('content')
	<div class="container mt-2">
		<h1>Gerenciar Pedidos</h1>

		<table class="table table-dark table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Usuário</th>
					<th scope="col">Produto</th>
					<th scope="col">Quantidade</th>
					<th scope="col">Status</th>
					<th scope="col">Atualização</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order)
					<tr>
						<th>{{ $order->id }}</th>
						<td>
							<a class="link-light" href="{{ route('user.edit', $order->user->id) }}" target="_blank">
								{{ $order->user->full_name }}
							</a>
						</td>
						<td>
							<a class="link-light" href="{{ route('product.edit', $order->product->id) }}" target="_blank">
								{{ $order->product->name }}
							</a>
						</td>
						<td>{{ $order->product_quantity }}</td>
						<td>{{ $order->status }}</td>
						<td>{{ $order->updated_at->format('d/m/Y H:i:s') }}</td>
						<td>
							<form action="{{ route('orders.delete', $order->id) }}" method="POST">
								@method('DELETE')
								@csrf
								<a href="{{ route('order.edit', $order->id) }}" class="btn btn-outline-warning btn-sm mb-1">Editar</a>
								<button type="submit" class="btn btn-outline-danger btn-sm">Deletar</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
