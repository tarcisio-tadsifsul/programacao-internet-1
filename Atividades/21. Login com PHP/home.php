<?php

session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
  header("Location: index.php");
  exit();
}

$email = $_SESSION['email_usuario'];
$usuario = 'n/a';

if (preg_match('/^([^@]+)/', $email, $matches)) {
  $usuario = $matches[1];
}

echo "<h1>Sistema XYZ</h1>";
echo "<p>Bem vindo(a) á sua área restrita, " . $usuario . "!</p>";
echo "<a href='logout.php'>LOGOUT</a>";
