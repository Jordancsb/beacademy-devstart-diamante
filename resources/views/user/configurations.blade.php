@extends('template.default')

@section('title', 'Configurações')

@section('content')
	<section class="container">
		<div class="mt-3">
			<h1>Configurações de usuário</h1>
			@include('partial.error')
		</div>

		<div class="accordion mt-3" id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingOne">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
						aria-expanded="true" aria-controls="collapseOne">
						<strong>
							Minhas Informações
						</strong>
					</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
					data-bs-parent="#accordionExample">
					<form class="accordion-body" action="{{ route('users.update.self') }}" method="POST">
						@csrf
						@method('PUT')

						<div class="form-floating mb-2">
							<input required name="first_name" type="text" class="form-control" id="firstNameInput"
								placeholder="{{ Auth::user()->first_name }}" value="{{ Auth::user()->first_name }}">
							<label for="firstNameInput">Nome*</label>
						</div>

						<div class="form-floating mb-2">
							<input required name="last_name" type="text" class="form-control" id="lastNameInput"
								value="{{ Auth::user()->last_name }}" placeholder="{{ Auth::user()->last_name }}">
							<label for="lastNameInput">Sobrenome*</label>
						</div>

						<div class="form-floating mb-2">
							<input required name="email" type="email" class="form-control" id="emailInput"
								value="{{ Auth::user()->email }}" placeholder="{{ Auth::user()->email }}">
							<label for="emailInput">Contato*</label>
						</div>

						<div class="form-floating mb-2">
							<input required name="cpf" pattern="[0-9]+" size="11" maxlength="11" type="text" class="form-control"
								id="cpfInput" value="{{ Auth::user()->cpf }}" placeholder="{{ Auth::user()->cpf }}">
							<label for="cpfInput">CPF*</label>
						</div>

						<div class="form-floating mb-2">
							<input required name="phone" type="text" pattern="[0-9]+" size="13" maxlength="13" class="form-control"
								id="phoneInput" value="{{ Auth::user()->phone }}" placeholder="{{ Auth::user()->phone }}">
							<label for="phoneInput">Contato*</label>
						</div>

						<div class="form-floating mb-4">
							<input required name="birth_date" type="date" class="form-control" id="birthDateInput"
								value="{{ Auth::user()->birth_date->format('Y-m-d') }}">
							<label for="birthDateInput">Data de nascimento*</label>
						</div>

						<div class="form-floating mb-2">
							<input name="password" type="password" class="form-control" id="passwordInput" minlength="6" maxlength="12">
							<label for="passwordInput">Nova Senha</label>
						</div>

						<div class="form-floating mb-2">
							<input name="currentPassword" type="password" class="form-control" id="currentPasswordInput" minlength="6"
								maxlength="12">
							<label for="currentPasswordInput">Senha atual</label>
						</div>

						<button class="btn btn-md btn-outline-primary" type="submit">Atualizar</button>
					</form>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingTwo">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
						aria-expanded="false" aria-controls="collapseTwo">
						<strong>
							Meus Endereços
						</strong>
					</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
					data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<button class="btn btn-md btn-outline-success mb-3" data-bs-toggle="modal"
							data-bs-target="#newAddressFormModal">Adicionar</button>

						<div class="row">
							@foreach (Auth::user()->addresses()->get() as $address)
								<div class="card" style="width: 18rem;">
									<div class="card-body">
										<h5 class="card-title">{{ $address->postcode }}</h5>
										<h6 class="card-subtitle mb-2 text-muted">{{ $address->city }}, {{ $address->state }},
											{{ $address->country }}</h6>
										<p class="card-text">
											{{ $address->neighborhood }}, {{ $address->street }}, Nº {{ $address->number }}
										</p>
										<button class="card-link btn btn-sm btn-outline-danger"
											onclick="document.getElementById('deleteAddressForm').action = '{{ route('addresses.delete', $address->id) }}'; document.getElementById('deleteAddressForm').submit()">
											Apagar
										</button>
										<a href="{{ route('address.edit', $address->id) }}"
											class="card-link btn btn-sm btn-outline-primary">Editar</a>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<form action="{{ route('addresses.create') }}" method="POST" class="modal fade" id="newAddressFormModal"
		tabindex="-1" aria-labelledby="newAddressFormModalLabel" aria-hidden="true">
		@csrf

		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newAddressFormModalLabel">Informações do endereço</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-floating mb-2">
						<input required name="postcode" type="text" pattern="[0-9]+" minlength="8" maxlength="8"
							class="form-control" id="postcodeInput" placeholder="00000000">
						<label for="postcodeInput">CEP*</label>
					</div>

					<div class="form-floating mb-2">
						<input required name="country" type="text" class="form-control" id="countryInput" placeholder="País*">
						<label for="countryInput">País*</label>
					</div>

					<div class="form-floating mb-2">
						<input required name="state" type="text" class="form-control" id="stateInput" placeholder="Estado*">
						<label for="stateInput">Estado*</label>
					</div>

					<div class="form-floating mb-2">
						<input required name="city" type="text" class="form-control" id="cityInput" placeholder="Cidade*">
						<label for="cityInput">Cidade*</label>
					</div>

					<div class="form-floating mb-2">
						<input required name="neighborhood" type="text" class="form-control" id="neighborhoodInput"
							placeholder="Bairro*">
						<label for="neighborhoodInput">Bairro*</label>
					</div>

					<div class="form-floating mb-2">
						<input required name="street" type="text" class="form-control" id="streetInput" placeholder="Rua">
						<label for="streetInput">Rua*</label>
					</div>

					<div class="form-floating mb-2">
						<input required name="number" type="text" class="form-control" id="numberInput" placeholder="Número*">
						<label for="numberInput">Número*</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary">Finalizar</button>
				</div>
			</div>
		</div>
	</form>

	<form id="deleteAddressForm" method="POST">
		@csrf
		@method('DELETE')
	</form>
@endsection
