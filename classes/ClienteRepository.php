<?php
require_once "../config/conexao.php";
require_once "Cliente.php";

class ClienteRepository {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::conectar();
    }

    // CREATE
    public function inserir(Cliente $cliente) {

        $sql = "INSERT INTO clientes (nome, email, telefone)
                VALUES (:nome, :email, :telefone)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nome", $cliente->nome);
        $stmt->bindValue(":email", $cliente->email);
        $stmt->bindValue(":telefone", $cliente->telefone);

        return $stmt->execute();
    }

    // READ
    public function listar() {

        $sql = "SELECT * FROM clientes ORDER BY id DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {

        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function atualizar(Cliente $cliente) {

        $sql = "UPDATE clientes
                SET nome = :nome,
                    email = :email,
                    telefone = :telefone
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nome", $cliente->nome);
        $stmt->bindValue(":email", $cliente->email);
        $stmt->bindValue(":telefone", $cliente->telefone);
        $stmt->bindValue(":id", $cliente->id);

        return $stmt->execute();
    }

    // DELETE
    public function excluir($id) {

        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);

        return $stmt->execute();
    }
}