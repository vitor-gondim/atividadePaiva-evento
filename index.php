<?php

require_once 'init.php';

require_once 'filtro.php';

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

    <form method="GET">

        <p>
            <label for="busca">Buscar por título:</label>
            <br>
            <input type="text" id="busca" name="busca">
        </p>

        <p>
            <label for="area">Área:</label>
            <br>
            <select id="area" name="area">
                <option><?= $todasAreas ?></option>
                <?php foreach ($areas as $area): ?>
                    <option <?php if ($area == $areaFiltro): ?>selected<?php endif; ?>><?= $area ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="data">Data:</label>
            <br>
            <input type="date" id="data" name="data">
        </p>

        <button type="submit">Filtrar</button>

        <a href="index.php">Limpar filtros</a>

    </form>

    <?php if (empty($eventos)): ?>

        <p>Nenhum evento encontrado.</p>

    <?php else: ?>

        <?php foreach ($eventos as $evento): ?>



            <h2>
                <?= ($evento['titulo']) ?>
            </h2>

            <p>
                <strong>Data:</strong>
                <?= ($evento['data']) ?>
            </p>

            <p>
                <strong>Horário:</strong>
                <?= ($evento['inicio']) ?>
                às
                <?= ($evento['fim']) ?>
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