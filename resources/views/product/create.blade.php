@extends('template.default')

@section('title', 'Cadastro de Produtos')

@section('content')
	<section class="container d-flex mt-4 ">
		<form action="{{ route('products.create') }}" class="form-cadastro-produto" method="POST">
			@csrf
			<div class="form-group">
				<label for="name">Nome Completo</label>
				<input type="text" class="form-control" name="name" id="name" required>
			</div>
			<div class="form-group">
				<label for="description">Descrição</label>
				<input type="text" class="form-control" name="description" id="description" required>
			</div>
			<div class="form-group">
				<label for="image_url">URL Imagem</label>
				<input type="text" name="image_url" id="image_url" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="size">Tamanho</label>
				<input type="number" name="size" id="size" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="quantity">Quantidade</label>
				<input type="number" name="quantity" id="quantity" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="sale_price">Preço de Venda</label>
				<input type="number" name="sale_price" id="sale_price" class="form-control" required step="0.01">
			</div>
			<div class="form-group">
				<label for="cost_price">Preço de Custo</label>
				<input type="number" name="cost_price" id="cost_price" class="form-control" required step="0.01">
			</div>
			<button type="submit" class="btn btn-black">Cadastrar</button>
			<button type="submit" class="btn btn-black">Cancelar</button>
		</form>
	</section>
@endsection
