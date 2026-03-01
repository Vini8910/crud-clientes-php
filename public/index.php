<?php
require_once "../classes/ClienteRepository.php";

$repo = new ClienteRepository();
$clientes = $repo->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Clientes - PHP</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- CARD CADASTRO -->
    <div class="card shadow mb-5">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Cadastro de Cliente</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="salvar.php" id="formCliente" novalidate>

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                    <div class="invalid-feedback">
                        Por favor, informe o nome.
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <div class="invalid-feedback">
                        Informe um email válido.
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">
                    Salvar Cliente
                </button>

            </form>

        </div>
    </div>

    <!-- CARD LISTAGEM -->
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Lista de Clientes</h4>
        </div>

        <div class="card-body">

            <?php if(count($clientes) == 0): ?>
                <div class="alert alert-info">
                    Nenhum cliente cadastrado.
                </div>
            <?php endif; ?>

            <?php if(count($clientes) > 0): ?>

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th width="120">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($clientes as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= $c['nome'] ?></td>
                            <td><?= $c['email'] ?></td>
                            <td><?= $c['telefone'] ?></td>
                            <td>
                                <a href="excluir.php?id=<?= $c['id'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Deseja realmente excluir este cliente?')">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

            <?php endif; ?>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Validação Bootstrap -->
<script>
(() => {
    'use strict';
    const form = document.getElementById('formCliente');

    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
})();
</script>

</body>
</html>