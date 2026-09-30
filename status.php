<?php

require_once 'init.php';

$id = (int) $_POST['id'];

$evento = &$_SESSION['eventos'][$id];

if (isset($_POST['cancelar'])) {

    $evento['status'] = 'cancelado';

}

if (isset($_POST['reativar'])) {

    $totalInscritos = 0;

    foreach ($_SESSION['inscricoes'] as $inscricao) {

        if ($inscricao['evento_id'] == $id) {
            $totalInscritos++;
        }
    }

    if ($totalInscritos < $evento['vagas']) {

        $evento['status'] = 'ativo';

    }
}

header('Location: detalhes.php?id=' . $id);
exit;