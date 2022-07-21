@extends('template.default')

@section('title', 'Loja')

@section('content')
	<section class="container justify-content-center mt-5">
		<form action="{{ route('product.store') }}" method="GET">
			@csrf
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Pesquisar..."
					aria-describedby="searchAddon" name="search">
				<button class="btn btn-outline-dark" type="submit" id="searchAddon">Pesquisar</button>
			</div>
		</form>


		<div class="row row-cols-1 row-cols-md-3 g-4">
			@foreach ($products as $product)
				<div class="col-md-6">
					<div class="card mb-3 h-100">
						<div class="row ">
							<div class="col-md-4">
								<img src="{{ $product->image_url }} " class="card-img-top" alt="...">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title">{{ $product->name }}</h5>
									<p class="card-text">{{ $product->description }}</p>

									<div class="row">
										<div class="col">
											<p class="card-text"><strong>Tamanho: </strong>
												<span class="badge rounded-pill bg-secondary">{{ $product->size }}</span>
											</p>
										</div>
										<div class="col">
											<p class="card-text"><strong>R$</strong> {{ $product->cost_price }}</p>
										</div>
									</div>

									<form action="{{ route('product.cart', $product->id) }}" method="post" class="mt-3 mb-0">
										@csrf
										<button type="submit" class="btn btn-outline-dark">Carrinho</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>


	</section>
@endsection
