<?php
    require_once "init.php";

    $id = null;
    $eventoAtual = null;

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
        $id = $_GET['id'];
        $eventoAtual = $_SESSION['eventos'][$id];
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Eventos SENAI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Eventos SENAI</h1>
   <?php require_once "nav.php"; ?>
   <hr>
    <h1>Formulário de Edição de Eventos</h1>

    <ul>
        <?php foreach($_SESSION['eventos'] as $chaveEvento => $evento): ?>
            <li>
                <a href="edicao.php?id=<?= $chaveEvento ?>">
                    <?= $evento['titulo'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if($id == null): ?>
        <p>Selecione um dos eventos acima</p>
    <?php else: ?>
         <form action="processaFormEdicao.php" method="POST">
            <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
        
        <p>
        <label>Eventos:</label>
        <input type="text" name="titulo" value="<?= $eventoAtual['titulo'] ?>">
        <p>
        
        <p>
        <label>Área:</label>
        <input type="text" name="area" value="<?= $eventoAtual['area'] ?>">
        <p>

        <p>
        <label>Data:</label>
        <input type="date" name="data" value="<?= $eventoAtual['data'] ?>">
        <p>

        <p>
        <label>Início:</label>
        <input type="time" name="inicio" value="<?= $eventoAtual['inicio'] ?>">
        <p>

        <p>
        <label>Fim:</label>
        <input type="time" name="fim" value="<?= $eventoAtual['fim'] ?>">
        <p>

        <p>
        <label>Local:</label>
        <input type="text" name="local" value="<?= $eventoAtual['local'] ?>">
        <p>

        <p>
        <label>Responsável:</label>
        <input type="text" name="responsavel" value="<?= $eventoAtual['responsavel'] ?>">
        <p>

        <button type="submit">Enviar</button>
        </form>
    <?php endif ?>

</body>
</html>