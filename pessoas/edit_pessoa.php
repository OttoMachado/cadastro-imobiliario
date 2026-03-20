<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM pessoas WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['atualizar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "UPDATE pessoas 
            SET nome='$nome', cpf='$cpf', usuario='$usuario', senha='$senha'
            WHERE id=$id";

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
    <title>Editar Pessoa</title>

    <link rel="stylesheet" href="../css/pessoas/edit_pessoa.css">
</head>

<body>

<header>
    <h2>Sistema Imobiliário</h2>
</header>

<div class="main">
    <div class="box">

        <h2>Editar Pessoa</h2>

        <form method="post">

            <div class="campo">
                <label>Nome</label>
                <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
            </div>

            <div class="campo">
                <label>CPF</label>
                <input type="text" name="cpf" value="<?php echo $row['cpf']; ?>" required>
            </div>

            <div class="campo">
                <label>Usuário</label>
                <input type="text" name="usuario" value="<?php echo $row['usuario']; ?>" required>
            </div>

            <div class="campo">
                <label>Senha</label>
                <input type="text" name="senha" value="<?php echo $row['senha']; ?>" required>
            </div>

            <input type="submit" name="atualizar" value="Atualizar">

        </form>

        <br>
        <a href="list_pessoas.php">Voltar</a>

    </div>
</div>

<footer>
</footer>

</body>
</html>