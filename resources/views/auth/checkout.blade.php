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
         <img class='img' src="{{URL('/assets/logo.png')}}" alt="profile Pic" height="200" width="200">
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="register-form">
               <form>
                  <div class="form-group">
                     <label for="image">Imagem do Produto</label>
                     <input type="file" id="image" name="image" class="form-control-file">
                  </div>
                  <div class="form-group">
                     <label>Nome do Produto</label>
                     <input type="email" class="form-control" placeholder="Nome do Produto">
                  </div>
                  <div class="form-group">
                     <label>Descrição</label>
                     <textarea 
                     cols="40" 
                     type="text" 
                     class="form-control" 
                     placeholder="Descrição do Produto">
                     </textarea>
                  </div>
                  <div class="form-group">
                     <label>Preço de Custo</label>
                     <input type="value" class="form-control" placeholder="00.00">
                  </div>
                  <div class="form-group">
                     <label>Preço de Venda</label>
                     <input type="value" class="form-control" placeholder="00.00">
                  </div>
                  <div class="form-group">
                     <label>Categoria</label>
                  </div>
                  <div class="form-group">
                     <select>
                     <option value="Sapatos">Calçados</option>
                     <option value="Roupas">Roupas</option>
                     <option value="Acessórios">Acessórios</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Quantidade</label>
                     <input cols="10" type="number" class="form-control" placeholder="Quantidade">
                  </div>
                  <button type="submit" class="btn btn-black">Salvar</button>
                  <button type="submit" class="btn btn-black">Limpar</button>
               </form>
            </div>
         </div>
      </div>
</body>
</html>