<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}

include "../db.php";

$id = $_GET['id'];

$conn->query("DELETE FROM imoveis WHERE id=$id");

header("Location: list_imoveis.php");
exit;