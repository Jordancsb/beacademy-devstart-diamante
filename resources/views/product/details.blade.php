@extends('template.default')
@section('title', 'Cadastro de Produtos')
@section('content')
	<div class="container mt-2">
		<h1>Gerenciar Produtos</h1>
		<a href="{{ route('product.new') }}" class="btn btn-dark mb-3">Novo</a>

		@include('partial.message.flash')

		<table class="table table-dark table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Produto</th>
					<th scope="col">Tamanho</th>
					<th scope="col">Estoque</th>
					<th scope="col">Preço de Venda</th>
					<th scope="col">Custo</th>
					<th scope="col">Opções</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
					<tr>
						<th>{{ $product->id }}</th>
						<td>{{ $product->name }}</td>
						<td>{{ $product->size }}</td>
						<td>{{ $product->quantity }}</td>
						<td>R$ {{ $product->sale_price }}</td>
						<td>R$ {{ $product->cost_price }}</td>
						<td>
							<form action="{{ route('products.delete', $product->id) }}" method="POST">
								@method('DELETE')
								@csrf
								<a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline-warning btn-sm">Editar</a>
								<button type="submit" class="btn btn-outline-danger btn-sm">Deletar</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
