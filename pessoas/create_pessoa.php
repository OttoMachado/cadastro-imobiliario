<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO pessoas (nome, cpf, usuario, senha)
            VALUES ('$nome', '$cpf', '$usuario', '$senha')";

    if ($conn->query($sql) === TRUE) {
        header("Location: list_pessoas.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Pessoa</title>

    <link rel="stylesheet" href="../css/pessoas/create_pessoa.css">
</head>

<body>

<header>
    <h2>Sistema Imobiliário</h2>
</header>

<div class="main">
    <div class="box">

        <h2>Cadastrar Pessoa</h2>

        <form method="post">

            <div class="campo">
                <label>Nome</label>
                <input type="text" name="nome" required>
            </div>

            <div class="campo">
                <label>CPF</label>
                <input type="text" name="cpf" required>
            </div>

            <div class="campo">
                <label>Usuário</label>
                <input type="text" name="usuario" required>
            </div>

            <div class="campo">
                <label>Senha</label>
                <input type="password" name="senha" required>
            </div>

            <input type="submit" name="cadastrar" value="Cadastrar">

        </form>

        <br>
        <a href="list_pessoas.php">Voltar</a>

    </div>
</div>

<footer>
</footer>

</body>
</html>