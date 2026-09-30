<?php

require_once 'init.php';

$id = (int) $_POST['id'];

if (isset($_POST['cancelar'])) {

    $_SESSION['eventos'][$id]['status'] = 'cancelado';

}

if (isset($_POST['reativar'])) {

    $totalInscritos = 0;

    if (isset($_SESSION['inscricoes'])) {

        foreach ($_SESSION['inscricoes'] as $inscricao) {

            if ($inscricao['evento_id'] == $id) {
                $totalInscritos++;
            }
        }
    }

    if ($totalInscritos < $_SESSION['eventos'][$id]['vagas']) {

        $_SESSION['eventos'][$id]['status'] = 'ativo';

    }
}

header('Location: detalhes.php?id=' . $id);
exit;