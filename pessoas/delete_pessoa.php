<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: list_pessoas.php");
    exit;
}

include "../db.php";

$id = $_GET['id'];

$conn->query("DELETE FROM pessoas WHERE id=$id");

header("Location: list_pessoas.php");
?>