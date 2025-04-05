<?php
$servername = "localhost";
$username = "root"; // Altere para o seu nome de usuário do MySQL
$password = ""; // Altere para a sua senha do MySQL
$dbname = "gerenciador_estoque"; // Altere para o nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
