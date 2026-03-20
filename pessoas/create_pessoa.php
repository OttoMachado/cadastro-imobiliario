<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}
include "../db.php";

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $datanasc = $_POST['datanasc'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $conn->query("INSERT INTO pessoas (nome, cpf, datanasc, sexo, telefone, email) VALUES ('$nome', '$cpf', '$datanasc', '$sexo', '$telefone', '$email')");
    header("Location: list_pessoas.php");
    exit;
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

<header class="header">
    <h1>Sistema Imobiliário</h1>
</header>

<div class="main">
    <div class="box">
        <h2>Cadastrar Pessoa</h2>

        <form method="post">
            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>CPF:</label>
            <input type="text" name="cpf" required>

            <label>Data de Nascimento:</label>
            <input type="date" name="datanasc" required>

            <label>Sexo:</label>
            <select name="sexo" required>
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>

            <label>Telefone:</label>
            <input type="text" name="telefone" required>

            <label>E-mail:</label>
            <input type="email" name="email" required>

            <input type="submit" name="salvar" value="Salvar">
        </form>

        <a href="list_pessoas.php" class="voltar">Voltar</a>
    </div>
</div>

<footer class="footer">
    <p>Sistema Imobiliário - Pessoa<p>
</footer>

</body>
</html>