<?php

session_start();

if (isset($_SESSION['logado']) === true) {
  header("Refresh: 3; url=home.php");

  echo "<p>Você já está logado!</p>";
  echo "<p>Redirecionando para Área restrita...</p>";

  exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="caixa">
      <h1 class="titulo">Sistema XYZ Login</h1>
      <form action="processa_login.php" id="formulario" method="post">
        <div class="campo">
          <label for="user-email">Usuário</label>
          <input class="input" type="text" name="user-email" id="user-email" placeholder="meu@email" autocomplete="username" require>
        </div>
        <div class="campo">
          <label for="senha">Senha</label>
          <input class="input" type="password" name="senha" id="senha" placeholder="*******" autocomplete="current-password" require>
        </div>
        <div class="campo">
          <!-- <input class="enviar" type="submit" value="Acessar"> -->
          <button class="enviar" type="submit">Acessar</button>
        </div>
      </form>
    </div>
  </div>
  <script src="script.js" defer></script>
</body>

</html>