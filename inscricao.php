<?php
require_once 'init.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Inscrição</title>
</head>

<body>

    <h1>Eventos SENAI</h1>

    <?php require_once 'nav.php'; ?>

    <hr>

    <h2>Formulário de Inscrição</h2>

    <form action="salvar_inscricao.php" method="POST">

        <label>Nome:</label>
        <br>

        <input type="text" name="nome" required>

        <br><br>

        <label>E-mail:</label>
        <br>

        <input type="email" name="email" required>

        <br><br>

        <label>Selecione o evento:</label>
        <br>

        <select name="evento" required>

            <option value="">Selecione um evento</option>

            <?php foreach ($_SESSION['eventos'] as $id => $evento) { ?>

                <?php if ($evento['status'] == 'Ativo') { ?>

                    <option value="<?= $id ?>">
                        <?= $evento['titulo'] ?>
                    </option>

                <?php } ?>

            <?php } ?>
        </select>

        <br><br>

        <button type="submit">
            Inscrever
        </button>

    </form>

</body>

</html>