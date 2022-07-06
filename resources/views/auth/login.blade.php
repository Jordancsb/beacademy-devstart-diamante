<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ ('/css/app.css') }}" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>Login</title>
</head>
<body>
<div class="sidenav">
         <div class="login-main-text">
            <h2>Faça seu login</h2>
            <p>Ainda não faz parte do nosso time! Registre-se agora!</p>
         </div>
         <img class="img" src="{{URL::asset('/assets/logo.png')}}" alt="profile Pic" height="200" width="200">
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="{{ route('auth.check')}}" method="post">
                  @csrf
                  <div class="form-group">
                     <label>Usuário/Email</label>
                     <input type="text" class="form-control" placeholder="Usuário" id="email" value="{{ old('email')}}">
                  </div>
                  <div class="form-group">
                     <label>Senha</label>
                     <input type="password" class="form-control" placeholder="Senha" id="password" value="{{ old('password')}}">
                  </div>
                  <button type="submit" class="btn btn-black"><a class="btn-black" href="/">Acesse</a></button>
                  <button type="submit" class="btn btn-black"><a class="btn-black" href="/register">Cadastre-se</a></button>
               </form>
            </div>
         </div>
      </div>
</body>
</html>