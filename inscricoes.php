<?php

require_once 'init.php';

$idEvento = $_GET['id'] ?? null;

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';

$mensagem = '';

if ($idEvento === null || !isset($_SESSION['eventos'][$idEvento])) {

    $mensagem = "Evento não encontrado.";

} else {

    $evento = $_SESSION['eventos'][$idEvento];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (empty($nome) || empty($email)) {

            $mensagem = "Preencha todos os campos.";

        } elseif ($evento['status'] != 'aberto') {

            $mensagem = "Este evento não está aberto para inscrições.";

        } else {

            $totalInscritos = 0;
            $emailDuplicado = false;

            foreach ($_SESSION['inscricoes'] as $inscricao) {

                if ($inscricao['evento_id'] == $idEvento) {

                    $totalInscritos++;

                    if ($inscricao['email'] == $email) {

                        $emailDuplicado = true;
                    }
                }
            }

            if ($emailDuplicado) {

                $mensagem = "Este e-mail já está inscrito neste evento.";

            } elseif ($totalInscritos >= $evento['vagas']) {

                $mensagem = "As vagas deste evento estão esgotadas.";

            } else {

                $_SESSION['inscricoes'][] = [
                    'nome' => $nome,
                    'email' => $email,
                    'evento_id' => $idEvento
                ];

                $mensagem = "Inscrição realizada com sucesso.";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscrição</title>

</head>

<body style="background-color: black; color: aliceblue">

    <h1 style="
        border: 3px solid;
        width: fit-content;
        border-radius: 15px;
        padding: 5px;">
        Inscrição no evento
    </h1>

    <hr>

    <?php if (isset($evento)): ?>

        <h2><?= $evento['titulo'] ?></h2>

        <p>Data: <?= $evento['data'] ?></p>

        <p>Local: <?= $evento['local'] ?></p>

        <p>Vagas: <?= $evento['vagas'] ?></p>

        <p>Status: <?= $evento['status'] ?></p>

        <h1 style="
            border: 3px solid;
            width: fit-content;
            border-radius: 15px;
            padding: 5px;">
            Formulário
        </h1>

        <form method="POST" style="
            border: 1px solid;
            width: fit-content;
            background-color: darkslategrey;
            padding: 15px;">

            <label>Nome:</label>

            <input type="text" name="nome">

            <br><hr>

            <label>E-mail:</label>

            <input type="email" name="email">

            <br><hr>

            <button type="submit">Inscrever</button>

        </form>

    <?php endif; ?>

    <?php

    if (!empty($mensagem)) {
        echo "<p>$mensagem</p>";
    }

    ?>

</body>

</html>