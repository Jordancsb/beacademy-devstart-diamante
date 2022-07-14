@extends('template.default')
@section('title', 'Cadastro de Produtos')
@section('content')
    <section class="container-fluid mt-4">
        <div class="card-produtos">
            @foreach($products as $product)

            <div class="card mr-3 mt-4 gap-4" style="width: 18rem;">

                <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"> <small>{{ $product->description }}</small> </p>
                    <p> <strong>Tamanho </strong> <span>{{ $product->size }}</span> </p>
                    <p> <strong>Quantidade </strong> <span>{{ $product->quantity }}</span> </p>
                    <p><strong>R$ </strong>{{ $product->cost_price }}</p>
                    <h3><strong>R$ </strong>{{ $product->sale_price }}</h3>
                    <!-- <form action="{{ route('product.card', $product->id) }}" method="post">
                        <button type="submit" class="btn btn-dark" style="width: 100%;"> Carrinho </button>
                    </form> -->
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('product.delete', $product->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection