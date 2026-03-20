<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";

$filter = '';
if (isset($_GET['filtro']) && $_GET['filtro'] != '') {
    $filtro = $conn->real_escape_string($_GET['filtro']);
    $filter = "WHERE nome LIKE '%$filtro%' OR cpf LIKE '%$filtro%'";
}

$res = $conn->query("SELECT id AS pessoa_id, nome, cpf, datanasc, sexo, telefone, email FROM pessoas $filter");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lista de Pessoas</title>
<link rel="stylesheet" href="../css/pessoas/list_pessoas.css">
</head>
<body>

<header class="header">
    <h1>Sistema Imobiliário</h1>
</header>

<div class="main">
    <div class="box">

        <h2>Lista de Pessoas</h2>

        <div class="acoes">
            <a href="create_pessoa.php">Cadastrar</a>
            <a href="../imoveis/list_imoveis.php">Imóveis</a>
            <a href="../logout.php">Sair</a>
        </div>

        <div class="busca-container">
            <form method="get" class="busca">
                <label>Buscar por Nome ou CPF:</label>
                <input type="text" name="filtro" value="<?php echo isset($_GET['filtro']) ? $_GET['filtro'] : ''; ?>">
                <input type="submit" value="Buscar">
            </form>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data Nasc</th>
                <th>Sexo</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>

            <?php
            while ($row = $res->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['pessoa_id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['cpf']}</td>
                    <td>".(isset($row['datanasc']) ? $row['datanasc'] : '')."</td>
                    <td>".(isset($row['sexo']) ? $row['sexo'] : '')."</td>
                    <td>".(isset($row['telefone']) ? $row['telefone'] : '')."</td>
                    <td>".(isset($row['email']) ? $row['email'] : '')."</td>
                    <td>
                        <a href='edit_pessoa.php?id={$row['pessoa_id']}'>Editar</a> |
                        <a href='delete_pessoa.php?id={$row['pessoa_id']}'>Excluir</a>
                    </td>
                </tr>";
            }
            ?>
        </table>

    </div>
</div>

<footer class="footer">
    <p>Sistema Imobiliário - Pessoa<p>
</footer>

</body>
</html>