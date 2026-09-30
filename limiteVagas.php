<?php

require_once 'init.php';

$idEvento = $_GET['id'] ?? null;

$mensagem = '';

if ($idEvento === null || !isset($_SESSION['eventos'][$idEvento])) {

    $mensagem = "Evento não encontrado.";

} else {

    $evento = &$_SESSION['eventos'][$idEvento];

    $totalInscritos = 0;

    if (isset($_SESSION['inscricoes'])) {

        foreach ($_SESSION['inscricoes'] as $inscricao) {

            if ($inscricao['evento_id'] == $idEvento) {
                $totalInscritos++;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $novasVagas = $_POST['vagas'] ?? '';

        if (!filter_var($novasVagas, FILTER_VALIDATE_INT) || $novasVagas <= 0) {

            $mensagem = "Erro: A capacidade deve ser um número maior que zero.";

        } elseif ($novasVagas < $totalInscritos) {

            $mensagem = "Erro: Já existem $totalInscritos inscritos. A capacidade não pode ser menor que o número de inscritos.";

        } else {

            $evento['vagas'] = (int)$novasVagas;

            $mensagem = "Capacidade do evento atualizada com sucesso!";
        }
    }

    $vagasDisponiveis = $evento['vagas'] - $totalInscritos;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Vagas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <main class="container">

        <h1>Edição de Evento</h1>

        <?php if (isset($evento)): ?>

            <h2><?= $evento['titulo'] ?></h2>

            <p>
                Capacidade total atual:
                <strong><?= $evento['vagas'] ?></strong>
            </p>

            <p>
                Pessoas já inscritas:
                <strong><?= $totalInscritos ?></strong>
            </p>

            <p>
                Vagas disponíveis:
                <strong><?= $vagasDisponiveis ?></strong>
            </p>

            <form method="POST" class="formulario">

                <div>
                    <label for="vagas">Nova capacidade total:</label>

                    <input
                        type="number"
                        name="vagas"
                        id="vagas"
                        value="<?= $evento['vagas'] ?>"
                        min="1"
                        required
                    >
                </div>

                <button type="submit" class="btn-salvar">
                    Atualizar Vagas
                </button>

            </form>

        <?php endif; ?>

        <?php

        if (!empty($mensagem)) {
            echo "<p>$mensagem</p>";
        }

        ?>

    </main>

</body>

</html>
