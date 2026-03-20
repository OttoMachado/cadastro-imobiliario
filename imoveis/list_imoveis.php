<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: list_imoveis.php");
    exit;
}

include "../db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Imóveis</title>
    <link rel="stylesheet" href="../css/imoveis/list_imoveis.css">
</head>
<body>

<header><h2>Sistema Imobiliário</h2></header>

<div class="main">
<div class="box">

<h2>Lista de Imóveis</h2>

<div class="acoes">
    <a href="create_imovel.php">Cadastrar</a>
    <a href="../pessoas/list_pessoas.php">Pessoas</a>
    <a href="../logout.php">Sair</a>
</div>

<table>
<tr>
    <th>ID</th>
    <th>Logradouro</th>
    <th>Número</th>
    <th>Bairro</th>
    <th>Complemento</th>
    <th>Pessoa</th>
    <th>Ações</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM imoveis");

while ($row = $res->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['logradouro']}</td>
        <td>{$row['numero']}</td>
        <td>{$row['bairro']}</td>
        <td>{$row['complemento']}</td>
        <td>{$row['pessoa_id']}</td>
        <td>
            <a href='edit_imovel.php?id={$row['id']}'>Editar</a> |
            <a href='delete_imovel.php?id={$row['id']}'>Excluir</a>
        </td>
    </tr>";
}
?>

</table>

</div>
</div>

<footer>
</footer>

</body>
</html>