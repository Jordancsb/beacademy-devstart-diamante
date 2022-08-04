{{-- {{ dd($order) }} --}}

@extends('template.default')
@section('title', 'Visualizar Pedido')
@section('content')
	<div class="container">
		<h1 class="mb-3">Pedido Nº {{ $order->id }}</h1>

		<form action="{{ route('orders.delete', $order->id) }}" method="post">
			@method('DELETE')
			@csrf

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="orderUserFullNameSpan"><strong>Cliente</strong></span>
				<input aria-describedby="orderUserFullNameSpan" readonly type="text" class="form-control" id="orderUserFullNameInput"
					value="{{ $order->user->full_name }}">
			</div>

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="orderProductNameSpan"><strong>Produto</strong></span>
				<input aria-describedby="orderProductNameSpan" readonly type="text" class="form-control"
					id="orderProductNameInput" value="{{ $order->product->name }}">
			</div>

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="orderProductQuantitySpan"><strong>Quantidade</strong></span>
				<input aria-describedby="orderProductQuantitySpan" readonly type="number" class="form-control"
					id="orderProductQuantityInput" value="{{ $order->product_quantity }}">
			</div>

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="orderProductTransactionIdSpan"><strong>Código</strong></span>
				<input aria-describedby="orderProductTransactionIdSpan" readonly type="text" class="form-control"
					id="orderProductQuantityInput" value="{{ $order->transaction_id }}">
			</div>

			<div class="input-group flex-nowrap mb-2">
				<span class="input-group-text" id="orderStatusSpan"><strong>Status</strong></span>
				<input aria-describedby="orderStatusSpan" readonly type="text" class="form-control" id="orderStatusInput"
					value="{{ $order->status }}">
			</div>

			<div class="input-group flex-nowrap mb-3">
				<span class="input-group-text" id="orderUpdatedAtSpan"><strong>Ultima atualização</strong></span>
				<input aria-describedby="orderUpdatedAtSpan" readonly type="datetime" class="form-control" id="orderUpdatedAtInput"
					value="{{ $order->updated_at->format('Y-m-d H:i') }}">
			</div>

			<a href="{{ url()->previous() }}" class="btn btn-outline-dark">Voltar</a>
			<button type="submit" class="btn btn-danger">Cancelar Pedido</button>
		</form>
	</div>
@endsection
