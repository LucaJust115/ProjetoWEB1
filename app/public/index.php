<?php
require_once '../config/db.php';
require_once '../controllers/AeronaveController.php';
require_once '../controllers/OrdemServicoController.php';
require_once '../Router.php';

header("Content-type: application/json; charset=UTF-8");

$router = new Router();

$aeronaveController = new AeronaveController($pdo);
$ordemServicoController = new OrdemServicoController($pdo);

$router->add('GET', '/aeronaves', [$aeronaveController, 'list']);
$router->add('GET', '/aeronaves/{id}', [$aeronaveController, 'getById']);
$router->add('POST', '/aeronaves', [$aeronaveController, 'create']);
$router->add('DELETE', '/aeronaves/{id}', [$aeronaveController, 'delete']);
$router->add('PUT', '/aeronaves/{id}', [$aeronaveController, 'update']);

$router->add('GET', '/ordens-servico', [$ordemServicoController, 'list']);
$router->add('GET', '/ordens-servico/{id}', [$ordemServicoController, 'getById']);
$router->add('POST', '/ordens-servico', [$ordemServicoController, 'create']);
$router->add('DELETE', '/ordens-servico/{id}', [$ordemServicoController, 'delete']);
$router->add('PUT', '/ordens-servico/{id}', [$ordemServicoController, 'update']);

$requestedPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pathItems = explode("/", $requestedPath);
$requestedPath = "/" . $pathItems[3] . ($pathItems[4] ? "/" . $pathItems[4] : "");

$router->dispatch($requestedPath);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API de Aeronaves e Ordens de Serviço</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .form-group {
            margin-bottom: 10px;
        }
        input, button {
            padding: 8px;
            width: 100%;
            margin-top: 5px;
        }
        .form-container {
            margin-bottom: 30px;
        }
    </style>
</head>
</html>
