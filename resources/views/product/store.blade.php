@extends('template.default')

@section('title', 'Loja')

@section('content')
    <section class="container justify-content-center mt-5">
        <div class=" mt-2 mb-5">
            <form action="{{ route('product.store') }}" method="GET">
                <div class="input-group">
                    <input type="search" class="form-control rounded" name="search" />
                    <button type="submit" class="btn btn-outline-dark">Pesquisar</button>
                </div>
            </form>
        </div>
        <div class="row gy-3">
            @foreach ($products as $product)
            <div class="col-md-6 mb-3">
                <div class="card mb-3 h-100" style="max-width: 540px;">
                    <div class="row ">
                        <div class="col-md-4">
                            <img src="{{ $product->image_url }} " class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $product->name }} </h5>
                                <p class="card-text overflow-hidden">
                                    {{ $product->description }} </p>
                                <div class="card-text">
                                    <div class="row">
                                        <div class="col">
                                            <b> <strong>Tamanho: </strong> <span
                                                    class="badge rounded-pill bg-info text-dark"> {{ $product->size }}
                                                </span>
                                            </b>
                                        </div>
                                        <div class="col">
                                            <b> <strong style="color: red"> R$
                                                </strong> <span style="color: green"> {{ $product->cost_price }}</span>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('product.cart', $product->id) }}" method="post" class="mt-3 mb-0">
                                    <button type="submit" class="btn btn-outline-dark " style="width: 100%;"> Carrinho
                                    </button>
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
