<?php
require_once 'init.php';

$evento = isset($_SESSION['eventos']) ? $_SESSION['eventos'] : [];

$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar']) && isset($_POST['id'])) {
    $delId = $_POST['id'];
    if (isset($_SESSION['eventos'][$delId])) {
        unset($_SESSION['eventos'][$delId]);
    }
    header('Location: remocao.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Remover evento</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Eventos SENAI</h1>
    <?php require_once 'nav.php' ?>
    <hr>
    <h1>Formulários de Remoção de Eventos</h1>

    <p>Tem certeza que deseja remover o evento abaixo?</p>
    <ul>
        <?php foreach ($_SESSION['eventos'] as $chaveEvento => $eventoItem): ?>
            <li>
                <a href="remocao.php?id=<?= $chaveEvento ?>">
                    <?= $eventoItem['titulo'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if ($id === ""): ?>
        <p>Selecione um dos eventos acima</p>
    <?php else: ?>
        <?php if (isset($evento[$id])): ?>
            <h2>Evento selecionado</h2>
            <p>Título: <?= htmlspecialchars($evento[$id]['titulo']) ?></p>
            <p>Descrição: <?= htmlspecialchars($evento[$id]['descricao'] ?? '') ?></p>
            <p>Área: <?= htmlspecialchars($evento[$id]['area'] ?? '') ?></p>
            <p>Data: <?= htmlspecialchars($evento[$id]['data'] ?? '') ?></p>
            <p>Início: <?= htmlspecialchars($evento[$id]['inicio'] ?? '') ?></p>
            <p>Fim: <?= htmlspecialchars($evento[$id]['fim'] ?? '') ?></p>
            <p>Local do Evento: <?= htmlspecialchars($evento[$id]['local'] ?? '') ?></p>
            <p>Responsável: <?= htmlspecialchars($evento[$id]['responsavel'] ?? '') ?></p>

            <form method="POST" action="remocao.php">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                <button type="submit" name="confirmar" value="1">Confirmar remoção</button>
            </form>
        <?php else: ?>
            <p>Evento inválido. Selecione outro.</p>
        <?php endif; ?>
    <?php endif; ?>
    <form action="processaFormRemocao.php" method="POST">
        <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
        <p><a href="index.php">Cancelar</a></p>
</body>

</html>