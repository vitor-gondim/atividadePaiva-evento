<?php

require_once 'init.php';

if (!isset($_GET['id'])) {
header('Location: index.php');
exit;
}

$id = (int) $_GET['id'];

if (!isset($_SESSION['eventos'][$id])) {
header('Location: index.php');
exit;
}

$evento = $_SESSION['eventos'][$id];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detalhes do Evento</title>
</head>

<body>

<h1>Detalhes do Evento</h1>

<p>
<strong>ID:</strong>
<?= $evento['id'] ?>
</p>

<p>
<strong>Título:</strong>
<?= htmlspecialchars($evento['titulo']) ?>
</p>

<p>
<strong>Descrição:</strong>
<?= htmlspecialchars($evento['descricao']) ?>
</p>

<p>
<strong>Área:</strong>
<?= htmlspecialchars($evento['area']) ?>
</p>

<p>
<strong>Data:</strong>
<?= htmlspecialchars($evento['data']) ?>
</p>

<p>
<strong>Início:</strong>
<?= htmlspecialchars($evento['inicio']) ?>
</p>

<p>
<strong>Fim:</strong>
<?= htmlspecialchars($evento['fim']) ?>
</p>

<p>
<strong>Local:</strong>
<?= htmlspecialchars($evento['local']) ?>
</p>

<p>
<strong>Responsável:</strong>
<?= htmlspecialchars($evento['responsavel']) ?>
</p>

<p>
    <strong>Status:</strong>
    <?= $evento['status'] ?? 'ativo' ?>
</p>
<p>
<a href="index.php">Voltar</a>
</p>

<p>
<a href="edicao.php?id=<?= $evento['id'] ?>">
Editar evento
</a>
</p>

<p>
<a href="remocao.php?id=<?= $evento['id'] ?>">
Remover evento
</a>
</p>
<p>
    <a href="inscricoes.php?id=<?= $evento['id'] ?>">
        Inscrição
    </a>
</p>

<p>
    <form method="POST" action="status.php">
        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
        <button type="submit" name="cancelar">Cancelar evento</button>
    </form>
</p>

<p>
    <form method="POST" action="status.php">
        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
        <button type="submit" name="reativar">Reativar evento</button>
    </form>
</p>
</body>

</html>

