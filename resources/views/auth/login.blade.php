@extends('template.default', ['navbar' => false])

@section('title', 'Login')

@section('content')
    <section>
        @include('partial.sidenav')

        <div class="main">
            <div class="col-md-6 col-sm-12">
                <form class="login-form" action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Email@email.com" id="email" name="email"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" placeholder="********" id="password" name="password"
                               required>
                    </div>
                    <button type="submit" class="btn btn-black">Acesse</button>
                    <a class="btn btn-black" href="{{ route('register.page') }}">Cadastre-se</a>
                </form>
            </div>
        </div>
    </section>
@endsection
