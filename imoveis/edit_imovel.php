<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";

$id = $_GET['id'];

$res = $conn->query("SELECT * FROM imoveis WHERE id=$id");
$row = $res->fetch_assoc();

if (isset($_POST['atualizar'])) {

    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];
    $pessoa_id = $_POST['pessoa_id'];

    $sql = "UPDATE imoveis SET
        logradouro='$logradouro',
        numero='$numero',
        bairro='$bairro',
        complemento='$complemento',
        pessoa_id='$pessoa_id'
        WHERE id=$id";

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
<title>Editar Imóvel</title>
<link rel="stylesheet" href="../css/imoveis/create_imovel.css">
</head>
<body>

<header><h2>Sistema Imobiliário</h2></header>

<div class="main">
<div class="box">

<h2>Editar Imóvel</h2>

<form method="post">

<div class="campo">
<label>Logradouro</label>
<input type="text" name="logradouro" value="<?php echo $row['logradouro']; ?>">
</div>

<div class="campo">
<label>Número</label>
<input type="text" name="numero" value="<?php echo $row['numero']; ?>">
</div>

<div class="campo">
<label>Bairro</label>
<input type="text" name="bairro" value="<?php echo $row['bairro']; ?>">
</div>

<div class="campo">
<label>Complemento</label>
<input type="text" name="complemento" value="<?php echo $row['complemento']; ?>">
</div>

<div class="campo">
<label>ID da Pessoa</label>
<input type="number" name="pessoa_id" value="<?php echo $row['pessoa_id']; ?>">
</div>

<input type="submit" name="atualizar" value="Atualizar">

</form>

<a href="list_imoveis.php">Voltar</a>

</div>
</div>

<footer class="footer">
    <p>Sistema Imobiliário - Imóvel<p>
</footer>

</body>
</html>