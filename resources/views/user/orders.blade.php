@extends('template.default')
@section('title', 'Seus Pedidos')
@section('content')
	<div class="container mt-2">
		<h1>Seus Pedidos</h1>

		<table class="table table-dark table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th scope="col">Produto</th>
					<th scope="col">Quantidade</th>
					<th scope="col">Status</th>
					<th scope="col">Atualização</th>
					<th scope="col">Data</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order)
					<tr>
						<td>
							<a class="link-light" href="{{ route('product.edit', $order->product->id) }}" target="_blank">
								{{ $order->product->name }}
							</a>
						</td>
						<td>{{ $order->product_quantity }}</td>
						<td>{{ $order->status }}</td>
						<td>{{ $order->updated_at->format('d/m/Y H:i:s') }}</td>
						<td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
