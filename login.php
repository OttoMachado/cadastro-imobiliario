<?php
session_start();
include "db.php";

if (isset($_SESSION['logado'])) {
    header("Location: pessoas/list_pessoas.php");
    exit;
}

if (isset($_POST['entrar'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $res = $conn->query("SELECT * FROM pessoas WHERE usuario='$usuario' AND senha='$senha' LIMIT 1");

    if ($res->num_rows > 0) {
        $_SESSION['logado'] = true;
        header("Location: pessoas/list_pessoas.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

<header>
    <h2>Sistema Imobiliário</h2>
</header>

<div class="main">
    <div class="box">

        <h2>Login</h2>

        <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>

        <form method="post">

            <div class="campo">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>

            <div class="campo">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <input type="submit" name="entrar" value="Entrar">

        </form>

    </div>
</div>

<footer class="footer">
    <p>Sistema Imobiliário - Pessoa<p>
</footer>

</body>
</html>