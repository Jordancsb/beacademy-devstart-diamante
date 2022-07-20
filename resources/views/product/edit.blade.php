@extends('template.default')
@section('title', 'Edição de Produtos')
@section('content')
	<div class="container">
		<h1>Edição do Produto</h1>
		<form action="{{ route('products.update', $product->id) }}" method="post">
			@method('PUT')
			@csrf
			<div class="row mb-2">
				<div class="form-group col-sm-6">
					<label for="name">Nome</label>
					<input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
				</div>

				<div class="form-group col-sm-6">
					<label for="image_url">URL Imagem</label>
					<input type="text" name="image_url" id="image_url" class="form-control" value="{{ $product->image_url }}"
						required>
				</div>
			</div>

			<div class="form-group mb-2">
				<label for="description">Descrição</label>
				<textarea type="text" class="form-control" name="description" id="description" required>{{ $product->description }}</textarea>
			</div>

			<div class="row mb-3">
				<div class="form-group col-sm-3">
					<label for="size">Tamanho</label>
					<input type="number" name="size" id="size" class="form-control" value="{{ $product->size }}" required>
				</div>

				<div class="form-group col-sm-3">
					<label for="quantity">Quantidade</label>
					<input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}"
						required>
				</div>

				<div class="form-group col-sm-3">
					<label for="sale_price">Preço de Venda</label>
					<input type="number" name="sale_price" id="sale_price" class="form-control" value="{{ $product->sale_price }}"
						required step="0.01">
				</div>

				<div class="form-group col-sm-3">
					<label for="cost_price">Preço de Custo</label>
					<input type="number" name="cost_price" id="cost_price" class="form-control" value="{{ $product->cost_price }}"
						required step="0.01">
				</div>
			</div>
			<a href="{{ url()->previous() }}" class="btn btn-outline-dark">Voltar</a>
			<button type="submit" class="btn btn-dark">Atualizar</button>
		</form>
	</div>
@endsection
