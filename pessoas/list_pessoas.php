<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas</title>

    <link rel="stylesheet" href="../css/pessoas/list_pessoas.css">
</head>

<body>

<header>
    <h2>Sistema Imobiliário</h2>
</header>

<div class="main">
    <div class="box">

        <h2>Lista de Pessoas</h2>

        <div class="acoes">
            <a href="create_pessoa.php">Cadastrar Pessoa</a>
            <a href="../imoveis/list_imoveis.php">Ver Imóveis</a>
            <a href="../logout.php">Sair</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM pessoas");

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nome']}</td>";
                echo "<td>{$row['cpf']}</td>";
                echo "<td>
                        <a href='edit_pessoa.php?id={$row['id']}'>Editar</a> |
                        <a href='delete_pessoa.php?id={$row['id']}'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>

    </div>
</div>

<footer>
    <p></p>
</footer>

</body>
</html>