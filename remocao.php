<?php

require_once 'init.php';

    if (!isset($_GET['id']) && !isset($_POST['id'])) {
        header('Location: index.php');
    exit;
    }

    $id = isset($_POST['id'])
        ?  $_POST['id']
        :  $_GET['id'];

if (!isset($_SESSION['eventos'][$id])) {
    header('Location: index.php');
    exit;
}

$evento = $_SESSION['eventos'][$id];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        unset($_SESSION['eventos'][$id]);

        header('Location: index.php');
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
</head>

<body>

    <h1>Remover Evento</h1>

    <h2>
        <?= htmlspecialchars($evento['titulo']) ?>
    </h2>

    <p>
        <p>Descrição</p>
        <?= htmlspecialchars($evento['descricao']) ?>
    </p>

    <p>
        <p>Área:</p>
        <?= htmlspecialchars($evento['area']) ?>
    </p>

    <p>
        <p>Data:</p>
        <?= htmlspecialchars($evento['data']) ?>
    </p>

    <p>
        <p>Horário:</p>
        <?= htmlspecialchars($evento['inicio']) ?>
        às
        <?= htmlspecialchars($evento['fim']) ?>
    </p>

    <p>
        <p>Local:</p>
        <?= htmlspecialchars($evento['local']) ?>
    </p>

    <p>
        <p>Responsável:</p>
        <?= htmlspecialchars($evento['responsavel']) ?>
    </p>

    <form method="POST">

        <input
            type="hidden"
            name="id"
            value="<?= $id ?>"
        >

        <button type="submit">
            Confirmar remoção
        </button>

        <a href="index.php">
            Cancelar
        </a>

    </form>

</body>

</html>