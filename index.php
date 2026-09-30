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

<body style="background-color: black; color:aliceblue">

<h1 style="
        background-color:cadetblue;
        border: 3px solid;
        width: fit-content;
        border-radius: 15px;
        padding: 5px;">Eventos do SENAI
</h1>
    <hr> 
    <div style="border: 3px solid;
         width: fit-content;
         border-radius: 10px;
         padding: 5px;
         background-color:darkgray;"> 
    
<p>
<a href="cadastro.php">Cadastrar novo evento</a>
</p>
</div>
<?php if (empty($eventos)): ?>

<p>Nenhum evento cadastrado.</p>

<?php else: ?>

<?php foreach ($eventos as $evento): ?>



<h2  style="
        background-color:cadetblue;
        border: 3px solid;
        width: fit-content;
        border-radius: 15px;
        padding: 5px;">
    


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
<div style="                            
         border: 3px solid;
         width: fit-content;
         border-radius: 10px;
         padding: 5px;
         background-color:darkgray;">

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
</div>
<?php endforeach; ?>

<?php endif; ?>

</body>

</html>
