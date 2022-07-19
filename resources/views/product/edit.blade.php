@extends('template.default')
@section('title', 'Edição de Produtos')
@section('content')
	<div class="container">
		<h1>Edição do Produto</h1>
		<form action="{{ route('products.update', $product->id) }}" method="post">
			@method('PUT')
			@csrf
			<div class="mb-3">
				<label for="name" class="form-label">Nome</label>
				<input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Descrição</label>
				<textarea type="text" class="form-control" id="description" name="description">{{ $product->description }}</textarea>
			</div>
			<div class="mb-3">
				<label for="image_url" class="form-label">Imagem</label>
				<input type="text" class="form-control" id="image_url" name="image_url" value="{{ $product->image_url }}">
			</div>
			<div class="mb-3">
				<label for="size" class="form-label">Tamanho</label>
				<input type="number" class="form-control" id="size" name="size" value="{{ $product->size }}">
			</div>
			<div class="mb-3">
				<label for="quantity" class="form-label">Quantidade</label>
				<input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
			</div>
			<div class="mb-3">
				<label for="cost_price" class="form-label">Preço de Custo</label>
				<input type="number" class="form-control" id="cost_price" name="cost_price" value="{{ $product->cost_price }}">
			</div>
			<div class="mb-3">
				<label for="sale_price" class="form-label">Preço de Venda</label>
				<input type="number" class="form-control" id="sale_price" name="sale_price" value="{{ $product->sale_price }}">
			</div>
			<a href="{{ url()->previous() }}" class="btn btn-outline-dark">Voltar</a>
			<button type="submit" class="btn btn-dark">Atualizar</button>
		</form>
	</div>
@endsection
