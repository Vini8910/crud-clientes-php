<?php

class Conexao {

    public static function conectar() {

        $host = "localhost";
        $dbname = "crud_clientes"; // <- antigo nome
        $usuario = "root";
        $senha = "";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $usuario, $senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}