@extends('template.default')

@section('title', 'Cadastro de Produtos')

@section('content')
	<section class="container mt-4">
		<h1>Novo Produto</h1>

		<form action="{{ route('products.create') }}" method="POST" class="col col-sm-10">
			@csrf
			<div class="form-group mb-2">
				<label for="name">Nome</label>
				<input type="text" class="form-control" name="name" id="name" required>
			</div>
			<div class="form-group mb-2">
				<label for="description">Descrição</label>
				<input type="text" class="form-control" name="description" id="description" required>
			</div>
			<div class="form-group mb-2">
				<label for="image_url">URL Imagem</label>
				<input type="text" name="image_url" id="image_url" class="form-control" required>
			</div>
			<div class="form-group mb-2">
				<label for="size">Tamanho</label>
				<input type="number" name="size" id="size" class="form-control" required>
			</div>
			<div class="form-group mb-2">
				<label for="quantity">Quantidade</label>
				<input type="number" name="quantity" id="quantity" class="form-control" required>
			</div>
			<div class="row mb-2">
				<div class="form-group col-sm-6">
					<label for="sale_price">Preço de Venda</label>
					<input type="number" name="sale_price" id="sale_price" class="form-control" required step="0.01">
				</div>
				<div class="form-group col-sm-6">
					<label for="cost_price">Preço de Custo</label>
					<input type="number" name="cost_price" id="cost_price" class="form-control" required step="0.01">
				</div>
			</div>
			<button type="submit" class="btn btn-outline-dark">Cancelar</button>
			<button type="submit" class="btn btn-dark">Cadastrar</button>
		</form>
	</section>
@endsection
