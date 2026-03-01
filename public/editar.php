<?php
require_once "../classes/ClienteRepository.php";

$repo = new ClienteRepository();

// Verifica se o ID foi passado
if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Busca o cliente pelo ID
$cliente = $repo->buscarPorId($_GET['id']);

if(!$cliente) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Editar Cliente</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="salvar.php" id="formEditar" novalidate>

                <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" 
                           value="<?= htmlspecialchars($cliente['nome']) ?>" required>
                    <div class="invalid-feedback">
                        Informe o nome.
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" 
                           value="<?= htmlspecialchars($cliente['email']) ?>" required>
                    <div class="invalid-feedback">
                        Informe um email válido.
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" 
                           value="<?= htmlspecialchars($cliente['telefone']) ?>">
                </div>

                <button type="submit" class="btn btn-success">Atualizar Cliente</button>
                <a href="index.php" class="btn btn-secondary">Voltar</a>

            </form>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Validação Bootstrap -->
<script>
(() => {
    'use strict';
    const form = document.getElementById('formEditar');

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