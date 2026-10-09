<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro</h1>

    <div><a href="/">voltar</a></div>

    <form action="processar-cadastro.php">
        <div class="campo">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div class="campo">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>