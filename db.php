<?php
$conn = new mysqli("localhost", "root", "", "cadastro_imobiliario");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>