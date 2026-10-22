<?php

$email_valido = "user_teste@x.com";
$senha_valida = "12345";

function retornaLogin()
{
  header("Location: index.php");
  exit();
}

if (isset($_POST['user-email']) && isset($_POST['senha'])) {

  if (!empty($_POST['user-email']) && !empty($_POST['senha'])) {
    $email = $_POST['user-email'];
    $senha = $_POST['senha'];

    $dados_validos = ($email_valido === $email) && ($senha_valida === $senha);

    if ($dados_validos) {

      session_start();
      $_SESSION['logado'] = true;
      $_SESSION['email_usuario'] = $email;

      header("Location: home.php");
      exit();
    } else {
      echo "<p style='color:red'>Dados Inválidos!</p>";
      echo "<a style='display:block' href='index.php'>Voltar</a>";
    }
  } else {
    retornaLogin();
  }
} else {
  retornaLogin();
}
