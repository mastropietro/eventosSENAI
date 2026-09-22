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
<head> </head>
<body>
    <h1><?php echo $nomeSite; ?> - Edição</h1>
   <?php require_once "nav.php"; ?> 

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
        <label>Eventos</label>
        <input type="text" name="titulo" value="<?= $eventoAtual['titulo'] ?>">
        <p>
        
        <p>
        <label>area</label>
        <input type="text" name="area" value="<?= $eventoAtual['area'] ?>">
        <p>

        <p>
        <label>data</label>
        <input type="date" name="data" value="<?= $eventoAtual['data'] ?>">
        <p>

        <p>
        <label>inicio</label>
        <input type="time" name="inicio" value="<?= $eventoAtual['inicio'] ?>">
        <p>

        <p>
        <label>fim</label>
        <input type="time" name="fim" value="<?= $eventoAtual['fim'] ?>">
        <p>

        <p>
        <label>local</label>
        <input type="text" name="local" value="<?= $eventoAtual['local'] ?>">
        <p>

        <p>
        <label>responsavel</label>
        <input type="text" name="responsavel" value="<?= $eventoAtual['responsavel'] ?>">
        <p>

        <button type="submit">enviar</button>
        </form>
    <?php endif ?>

</body>
</html>