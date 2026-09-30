<?php

require_once('init.php');

$eventos = $_SESSION['eventos'] ?? [];

$areas = array_unique(array_column($eventos, 'area'));
sort($areas);


$busca = trim($_GET['busca'] ?? '');
$area  = $_GET['area'] ?? '';
$data  = $_GET['data'] ?? '';

$resultado = array_filter($eventos, function ($evento) use ($busca, $area, $data) {
    if ($busca !== '' && stripos($evento['titulo'], $busca) === false) return false;
    if ($area  !== '' && $evento['area'] !== $area) return false;
    if ($data  !== '' && $evento['data'] !== $data) return false;
    return true;
});

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Eventos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Eventos SENAI</h1>
    <?php
    require_once 'nav.php';
    echo '<hr>';
    ?>

    <form method="GET" action="buscar.php">
        <input type="text" name="busca" placeholder="Buscar pelo título"
            value="<?= htmlspecialchars($busca) ?>">

        <select name="area">
            <option value="">Todas as áreas</option>
            <?php foreach ($areas as $a): ?>
                <option value="<?= htmlspecialchars($a) ?>" <?= ($area === $a) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($a) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="date" name="data" value="<?= htmlspecialchars($data) ?>">

        <button type="submit">Filtrar</button>
        <button type="button"><a href="buscar.php">Limpar</a></button>
    </form>

    <hr>

    <?php
    if (empty($resultado)) {
        echo '<p>Nenhum evento encontrado.</p>';
    } else {
        foreach ($resultado as $chaveEvento => $evento) {
            echo '<h3>' . htmlspecialchars($evento['titulo']) . '</h3>';
            echo '<p>Evento de ' . htmlspecialchars($evento['titulo']) . '.</p>';
            echo '<p><a href="detalhes.php?eventoId=' . urlencode($chaveEvento) . '">Saiba Mais...</a></p>';
            echo '<hr>';
        }
    }
    ?>
</body>

</html>
