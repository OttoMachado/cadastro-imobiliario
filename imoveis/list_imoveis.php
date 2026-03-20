<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";

$filter = '';
if (isset($_GET['logradouro']) && $_GET['logradouro'] != '') {
    $logradouro = $conn->real_escape_string($_GET['logradouro']);
    $filter = "WHERE logradouro LIKE '%$logradouro%'";
}

$res = $conn->query("SELECT * FROM imoveis $filter");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lista de Imóveis</title>
<link rel="stylesheet" href="../css/imoveis/list_imoveis.css">
</head>
<body>

<header class="header">
    <h1>Sistema Imobiliário</h1>
</header>

<div class="main">
    <div class="box">

        <h2>Lista de Imóveis</h2>

        <div class="acoes">
            <a href="create_imovel.php">Cadastrar</a>
            <a href="../pessoas/list_pessoas.php">Pessoas</a>
            <a href="../logout.php">Sair</a>
        </div>

    <div class="busca-container">
        <form method="get" class="busca">
            <label>Buscar por Logradouro:</label>
            <input type="text" name="logradouro" value="<?php echo isset($_GET['logradouro']) ? $_GET['logradouro'] : ''; ?>">
            <input type="submit" value="Buscar">
        </form>
    </div>
        <table>
            <tr>
                <th>Inscrição Municipal</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Complemento</th>
                <th>Contribuinte</th>
                <th>Ações</th>
            </tr>

            <?php
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

<footer class="footer">
    <p>Sistema Imobiliário - Imóvel<p>
</footer>

</body>
</html>