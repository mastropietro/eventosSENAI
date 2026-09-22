<?php

require_once('init.php');

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
    <?php
    require_once 'nav.php';
    echo '<hr>';
    foreach ($_SESSION['eventos'] as $chaveEvento => $evento) {
        echo '<h3>' . $evento['titulo'] . '</h3>';
        echo '<p>Evento de ' . $evento['titulo'] . '.</p>';
        echo '<p><a href="detalhes.php?eventoId=' . $chaveEvento . '">Saiba Mais...</a></p>';
        echo '<hr>';
    } ?>
</body>

</html>