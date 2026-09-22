
<?php

require_once 'init.php';

$erros = [];

$titulo = '';
$descricao = '';
$area = '';
$data = '';
$inicio = '';
$fim = '';
$local = '';
$responsavel = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$titulo = trim($_POST['titulo'] ?? '');
$descricao = trim($_POST['descricao'] ?? '');
$area = trim($_POST['area'] ?? '');
$data = trim($_POST['data'] ?? '');
$inicio = trim($_POST['inicio'] ?? '');
$fim = trim($_POST['fim'] ?? '');
$local = trim($_POST['local'] ?? '');
$responsavel = trim($_POST['responsavel'] ?? '');

if ($titulo === '') {
$erros[] = 'O título é obrigatório.';
}

if ($descricao === '') {
$erros[] = 'A descrição é obrigatória.';
}

if ($area === '') {
$erros[] = 'A área é obrigatória.';
}

if ($data === '') {
$erros[] = 'A data é obrigatória.';
}

if ($inicio === '') {
$erros[] = 'O horário de início é obrigatório.';
}

if ($fim === '') {
$erros[] = 'O horário de fim é obrigatório.';
}

if ($local === '') {
$erros[] = 'O local é obrigatório.';
}

if ($responsavel === '') {
$erros[] = 'O responsável é obrigatório.';
}

if ($inicio !== '' && $fim !== '' && $fim <= $inicio) {
$erros[] = 'O horário final deve ser maior que o horário inicial.';
}

if (empty($erros)) {

$id = $_SESSION['proximo_id'];

$_SESSION['eventos'][$id] = [
'id' => $id,
'titulo' => $titulo,
'descricao' => $descricao,
'area' => $area,
'data' => $data,
'inicio' => $inicio,
'fim' => $fim,
'local' => $local,
'responsavel' => $responsavel
];

$_SESSION['proximo_id']++;

header('Location: index.php');
exit;
}
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastrar Evento</title>
</head>

<body>

<h1>Cadastrar Evento</h1>

<?php if (!empty($erros)): ?>

<ul>

<?php foreach ($erros as $erro): ?>

<li>
<?= htmlspecialchars($erro) ?>
</li>

<?php endforeach; ?>

</ul>

<?php endif; ?>

<form method="POST">

<p>
<label for="titulo">Título:</label>
<br>
<input
type="text"
id="titulo"
name="titulo"
value="<?= htmlspecialchars($titulo) ?>"
required
>
</p>

<p>
<label for="descricao">Descrição:</label>
<br>
<textarea
id="descricao"
name="descricao"
required
><?= htmlspecialchars($descricao) ?></textarea>
</p>

<p>
<label for="area">Área:</label>
<br>
<input
type="text"
id="area"
name="area"
value="<?= htmlspecialchars($area) ?>"
required
>
</p>

<p>
<label for="data">Data:</label>
<br>
<input
type="date"
id="data"
name="data"
value="<?= htmlspecialchars($data) ?>"
required
>
</p>

<p>
<label for="inicio">Horário de início:</label>
<br>
<input
type="time"
id="inicio"
name="inicio"
value="<?= htmlspecialchars($inicio) ?>"
required
>
</p>

<p>
<label for="fim">Horário de fim:</label>
<br>
<input
type="time"
id="fim"
name="fim"
value="<?= htmlspecialchars($fim) ?>"
required
>
</p>

<p>
<label for="local">Local:</label>
<br>
<input
type="text"
id="local"
name="local"
value="<?= htmlspecialchars($local) ?>"
required
>
</p>

<p>
<label for="responsavel">Responsável:</label>
<br>
<input
type="text"
id="responsavel"
name="responsavel"
value="<?= htmlspecialchars($responsavel) ?>"
required
>
</p>

<button type="submit">
Cadastrar evento
</button>

</form>

<p>
<a href="index.php">Cancelar</a>
</p>

</body>

</html>