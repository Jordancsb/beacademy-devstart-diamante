@extends('template.default')

@section('title', 'Editar Endereço')

@section('content')
	<section class="container">
		<div class="mt-3">
			<h1>Editar endereço</h1>
			@include('partial.error')
		</div>

		<form action="{{ route('addresses.update', $address->id) }}" method="post">
			@csrf
			@method('PUT')
			<div class="form-floating mb-2">
				<input value="{{ $address->postcode }}" required name="postcode" type="text" pattern="[0-9]+" minlength="8"
					maxlength="8" class="form-control" id="postcodeInput" placeholder="00000000">
				<label for="postcodeInput">CEP*</label>
			</div>

			<div class="form-floating mb-2">
				<input value="{{ $address->country }}" required name="country" type="text" class="form-control" id="countryInput"
					placeholder="País*">
				<label for="countryInput">País*</label>
			</div>

			<div class="form-floating mb-2">
				<input value="{{ $address->state }}" required name="state" type="text" class="form-control" id="stateInput"
					placeholder="Estado*">
				<label for="stateInput">Estado*</label>
			</div>

			<div class="form-floating mb-2">
				<input value="{{ $address->city }}" required name="city" type="text" class="form-control" id="cityInput"
					placeholder="Cidade*">
				<label for="cityInput">Cidade*</label>
			</div>

			<div class="form-floating mb-2">
				<input value="{{ $address->neighborhood }}" required name="neighborhood" type="text" class="form-control"
					id="neighborhoodInput" placeholder="Bairro*">
				<label for="neighborhoodInput">Bairro*</label>
			</div>

			<div class="form-floating mb-2">
				<input value="{{ $address->street }}" required name="street" type="text" class="form-control" id="streetInput"
					placeholder="Rua">
				<label for="streetInput">Rua*</label>
			</div>

			<div class="form-floating mb-2">
				<input value="{{ $address->number }}" required name="number" type="text" class="form-control" id="numberInput"
					placeholder="Número*">
				<label for="numberInput">Número*</label>
			</div>

			<a href="{{ url()->previous() }}" class="btn btn-md btn-outline-dark">Voltar</a>
			<button type="submit" class="btn btn-md btn-primary">Atualizar</button>
		</form>
	</section>
@endsection
