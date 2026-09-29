<?php

require_once 'init.php';

if (!isset($_SESSION['inscricoes'])) {
    $_SESSION['inscricoes'] = [];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Inscritos</title>
</head>

<body>

<h1>Inscritos</h1>

<?php require_once 'nav.php'; ?>

<hr>

<?php foreach ($_SESSION['eventos'] as $id => $evento) { ?>

    <h2><?= $evento['titulo'] ?></h2>

    <?php foreach ($_SESSION['inscricoes'] as $inscricao) { ?>

        <?php if ($inscricao['evento'] == $id) { ?>

            <p>
                Nome: <?= $inscricao['nome'] ?>
                <br>
                E-mail: <?= $inscricao['email'] ?>
            </p>

        <?php } ?>

    <?php } ?>

    <hr>

<?php } ?>

</body>

</html>