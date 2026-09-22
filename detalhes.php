<?php

require_once('init.php');

$eventoId = $_GET['eventoId'];
$evento = $_SESSION['eventos'][$eventoId];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Eventos SENAI</h1>
    <?php require_once 'nav.php'; ?>
    <hr>
    <h2><?php echo $evento['titulo']; ?></h2>
    <h3><?php echo $evento['descricao']; ?></h3>
    <p><strong><em>Área: </em></strong><?php echo $evento['area']; ?></p>
    <p><strong><em>Data: </em></strong><?php echo $evento['data']; ?></p>
    <p><strong><em>Início: </em></strong><?php echo $evento['inicio']; ?></p>
    <p><strong><em>Fim: </em></strong><?php echo $evento['fim']; ?></p>
    <p><strong><em>Local do Evento: </em></strong><?php echo $evento['local']; ?></p>
    <p><strong><em>Responsável: </em></strong><?php echo $evento['responsavel']; ?></p>
</body>

</html>