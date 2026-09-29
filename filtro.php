<?php
require_once 'init.php';


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca e Filtro</title>
</head>
<body>
    <form method="POST">
        <label for="busca-titulo">Buscar pelo Titulo: </label>
        <input type="text" id="busca-titulo" name="busca-titulo" required>
        <button>Enviar</button>
        <br>
        <h3>Filtros</h3>
        <label for="data-min">Data Minima: </label>
        <input type="data-min" id="data-min" name="data-min">
        <label for="data-max">Data Maxima</label>
        <input for="data-max" id="data-max" name="data-max">
        <br>
        <label for="Area">Area: </label>
        <input type="text" id="area" name="area">
        <button>Enviar</button>
    </form>
<?php
if (isset($_POST['busca-titulo'])){
    $busca = $_POST['busca-titulo'];
    
    foreach($busca as $_SESSION['eventos']['*']['titulo']){
    
    }
    
    
}


?>


</body>
</html>
