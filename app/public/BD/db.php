<?php
$host = 'localhost';
$db = 'postgres';
$user = 'postgres';
$pass = 'unigran';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    var_dump('conexao bem sucedida');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>