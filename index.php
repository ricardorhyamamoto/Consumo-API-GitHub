<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
  <title>Consumo da API GitHub</title>
</head>
<body>
  <div class="text-center">
    <form action="github.php" method="get" class="form-signin">
      <h2 class="h3 mb-3 font-weight-normal">Buscador de Usuários do Github</h2>
      <label for="user">Nome de Usuário</label>
      <input type="user" id="user" name="user" class="form-control" placeholder="Digite o usuário" required autofocus>
      <div class="mb-3"></div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Buscar</button>
    </form>
  </div>
</body>
</html>