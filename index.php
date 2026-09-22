<?php

require_once 'init.php';

$eventos = $_SESSION['eventos'];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Eventos SENAI</title>
</head>

<body>

<h1>Eventos do SENAI</h1>

<p>
<a href="cadastro.php">Cadastrar novo evento</a>
</p>

<?php if (empty($eventos)): ?>

<p>Nenhum evento cadastrado.</p>

<?php else: ?>

<?php foreach ($eventos as $evento): ?>



<h2>
<?= htmlspecialchars($evento['titulo']) ?>
</h2>

<p>
<strong>Data:</strong>
<?= htmlspecialchars($evento['data']) ?>
</p>

<p>
<strong>Horário:</strong>
<?= htmlspecialchars($evento['inicio']) ?>
às
<?= htmlspecialchars($evento['fim']) ?>
</p>

<p>
<a href="detalhes.php?id=<?= $evento['id'] ?>">
Ver detalhes
</a>

|

<a href="edicao.php?id=<?= $evento['id'] ?>">
Editar
</a>

|

<a href="remocao.php?id=<?= $evento['id'] ?>">
Remover
</a>
</p>

<?php endforeach; ?>

<?php endif; ?>

</body>

</html>
