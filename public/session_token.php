<?php
session_start([
    'cookie_lifetime' => 86400, // Tempo de vida do cookie em segundos (1 dia)
    'gc_maxlifetime' => 1440    // Tempo de vida da sessão em segundos (24 minutos)
]);

// Função para gerar um token de sessão seguro
function generateSessionToken() {
    return bin2hex(random_bytes(32));
}

// Armazenar o token de sessão seguro na sessão
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = generateSessionToken();
}

// Exemplo de uso do token de sessão seguro
$sessionToken = $_SESSION['token'];
?>