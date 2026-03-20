<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";

if (isset($_POST['cadastrar'])) {
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];
    $pessoa_id = $_POST['pessoa_id'];

    $sql = "INSERT INTO imoveis 
    (logradouro, numero, bairro, complemento, pessoa_id)
    VALUES ('$logradouro','$numero','$bairro','$complemento','$pessoa_id')";

    if ($conn->query($sql)) {
        header("Location: list_imoveis.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastrar Imóvel</title>
<link rel="stylesheet" href="../css/imoveis/create_imovel.css">
</head>
<body>

<header><h2>Sistema Imobiliário</h2></header>

<div class="main">
<div class="box">

<h2>Cadastrar Imóvel</h2>

<form method="post">

<div class="campo">
<label>Logradouro</label>
<input type="text" name="logradouro" required>
</div>

<div class="campo">
<label>Número</label>
<input type="text" name="numero" required>
</div>

<div class="campo">
<label>Bairro</label>
<input type="text" name="bairro" required>
</div>

<div class="campo">
<label>Complemento</label>
<input type="text" name="complemento">
</div>

<div class="campo">
<label>ID da Pessoa</label>
<input type="number" name="pessoa_id" required>
</div>

<input type="submit" name="cadastrar" value="Cadastrar">

</form>

<a href="list_imoveis.php">Voltar</a>

</div>
</div>

<footer class="footer">
    <p>Sistema Imobiliário - Imóvel<p>
</footer>

</body>
</html>