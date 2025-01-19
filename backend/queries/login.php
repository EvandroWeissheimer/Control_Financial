<?php
require_once(__DIR__ . '/../config_db/db_connection.php');

// Estabelece a conexão com o banco de dados
$connect = getConnection();

// Dados enviados via POST
$email = $_POST["email"];
$senha = $_POST["senha"];

// Prepara o SQL para buscar o usuário
$stmt = $connect->prepare('SELECT * FROM usuarios WHERE email = :email');
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($senha, $user['senha'])) {
    echo 'success';
} else {
    echo 'Email ou senha inválidos.';
}
?>