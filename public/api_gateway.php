<?php
session_start();

// Verifica a ação solicitada
$action = $_POST['action'] ?? '';

// Verifica o token de sessão para ações que requerem autenticação
if (in_array($action, ['register', 'login'])) {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die('Token de sessão inválido');
    }
}

switch ($action) {
    case 'register':
        require_once(__DIR__ . '/../backend/queries/register.php');
        break;
    case 'login':
        require_once(__DIR__ . '/../backend/queries/login.php');
        break;
    // Adicione outros casos conforme necessário
    default:
        echo 'Ação inválida.';
        break;
}
?>