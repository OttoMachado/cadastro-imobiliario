<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}
include "../db.php";

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM pessoas WHERE id=$id");
$pessoa = $res->fetch_assoc();

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $datanasc = $_POST['datanasc'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $conn->query("UPDATE pessoas SET 
        nome='$nome', 
        cpf='$cpf', 
        datanasc='$datanasc', 
        sexo='$sexo', 
        telefone='$telefone', 
        email='$email' 
        WHERE id=$id");

    header("Location: list_pessoas.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Pessoa</title>
<link rel="stylesheet" href="../css/pessoas/create_pessoa.css">
</head>
<body>

<header class="header">
    <h1>Sistema Imobiliário</h1>
</header>

<div class="main">
    <div class="box">
        <h2>Editar Pessoa</h2>

        <form method="post">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $pessoa['nome']; ?>" required>

            <label>CPF:</label>
            <input type="text" name="cpf" value="<?php echo $pessoa['cpf']; ?>" required>

            <label>Data de Nascimento:</label>
            <input type="date" name="datanasc" value="<?php echo isset($pessoa['datanasc']) ? $pessoa['datanasc'] : ''; ?>" required>

            <label>Sexo:</label>
            <select name="sexo" required>
                <option value="">Selecione</option>
                <option value="Masculino" <?php if(isset($pessoa['sexo']) && $pessoa['sexo']=='Masculino') echo "selected"; ?>>Masculino</option>
                <option value="Feminino" <?php if(isset($pessoa['sexo']) && $pessoa['sexo']=='Feminino') echo "selected"; ?>>Feminino</option>
            </select>

            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?php echo isset($pessoa['telefone']) ? $pessoa['telefone'] : ''; ?>" required>

            <label>E-mail:</label>
            <input type="email" name="email" value="<?php echo isset($pessoa['email']) ? $pessoa['email'] : ''; ?>" required>

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