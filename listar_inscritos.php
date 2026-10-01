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
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Inscritos</h1>

<?php require_once 'nav.php'; ?>

<hr>

<?php foreach ($_SESSION['eventos'] as $id => $evento) { ?>

    <h2>
        <?= $evento['titulo'] ?>
    </h2>

    <?php

    $encontrou = false;

    foreach ($_SESSION['inscricoes'] as $inscricao) {

        if ($inscricao['evento'] == $id) {

            $encontrou = true;

    ?>

            <p>
                <strong>Nome:</strong>
                <?= $inscricao['nome'] ?>

                <br>

                <strong>E-mail:</strong>
                <?= $inscricao['email'] ?>
            </p>

    <?php

        }

    }

    if (!$encontrou) {

        echo '<p>Nenhuma pessoa inscrita neste evento.</p>';

    }

    ?>

    <hr>

<?php } ?>

</body>

</html>