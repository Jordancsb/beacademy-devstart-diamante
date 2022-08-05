<h1>Agradecemos a sua compra!</h1>

<h2>Código: {{ $transactionId }}</h2>

<h3>Itens comprados:</h3>

<ul>
	@foreach ($orders as $order)
		<li>{{ $order->product->name }} - {{ $order->product_quantity }}</li>
	@endforeach
</ul>

<p>
	<strong>Total:</strong>
	R$ {{ $amount }}
</p>

<p>Por favor, não responder este email. Agradecemos a preferência.</p>
