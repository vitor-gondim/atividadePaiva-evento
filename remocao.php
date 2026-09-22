<?php
require_once 'init.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $id = isset($_POST['id']) ? $_POST['id']: 0;
     $acao = $_POST['acao'];

    if ($acao === 'confirmar' && isset($_SESSION['eventos'][$id])) {
        unset($_SESSION['eventos'][$id]);
    }

    header('Location: index.php');
    exit;
}

$evento = $_SESSION['eventos'][$id] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Eventos - Remoção</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Remover evento</h1>
    <nav>
        <a href="index.php"> Voltar para a listagem</a>
    </nav>

    <?php if (!$evento): ?>
        <p>Evento não encontrado (ID inexistente).</p>
    <?php else: ?>
        <p>Tem certeza que deseja remover o evento abaixo?</p>

        <p><?= htmlspecialchars($evento['titulo']) ?></p>
        <p><?= htmlspecialchars($evento['data']) ?></p>
        <p><?= htmlspecialchars($evento['inicio']) ?></p>
        <p><?= htmlspecialchars($evento['fim']) ?></p>
        <p><?= htmlspecialchars($evento['local']) ?></p>

        <form method="post" action="remocao.php">
            <input type="hidden" name="id" value="<?= $evento['id'] ?>">
            <button type="submit" name="acao" value="confirmar">Confirmar remoção</button>
            <button type="submit" name="acao" value="cancelar">Cancelar</button>
        </form>
    <?php endif; ?>
</body>
</html>