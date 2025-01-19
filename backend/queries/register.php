<?php
require_once(__DIR__ . '/../config_db/db_connection.php');

// Estabelece a conexão com o banco de dados
$connect = getConnection();

// Dados enviados via POST
$data = [
    'nome' => $_POST["nome"],
    'email' => $_POST["email"],
    'senha' => password_hash($_POST["senha"], PASSWORD_DEFAULT) // Criptografar a senha
];

// Prepara o SQL para inserir no banco
$stmt = $connect->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');

try {
    // Inicia a transação
    $connect->beginTransaction();
    // Executa a consulta
    $stmt->execute($data);
    // Confirma a transação
    $connect->commit();
    echo 'Registro salvo com sucesso!';
} catch (Exception $e) {
    // Reverte a transação em caso de erro
    $connect->rollback();
    echo 'Erro ao salvar registro: ' . $e->getMessage();
}
?>