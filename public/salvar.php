<?php
require_once "../classes/ClienteRepository.php";

$repo = new ClienteRepository();
$cliente = new Cliente();

$cliente->nome = $_POST['nome'];
$cliente->email = $_POST['email'];
$cliente->telefone = $_POST['telefone'];

if (!empty($_POST['id'])) {
    $cliente->id = $_POST['id'];
    $repo->atualizar($cliente);
} else {
    $repo->inserir($cliente);
}

header("Location: index.php");