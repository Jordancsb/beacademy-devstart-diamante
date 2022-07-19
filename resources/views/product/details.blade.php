@extends('template.default')
@section('title', 'Cadastro de Produtos')
@section('content')
    <div class="container mt-2">
        <a href="{{ route('product.new') }}" class="btn btn-primary">Novo Produto</a>
        <table class="table table-dark table-hover table-bordered table-striped mt-2">
            <thead class="text-center">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Tamanho</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Preço de Venda</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection