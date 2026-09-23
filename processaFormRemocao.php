<?php
    require_once "init.php";

    $id = null;
    $eventoAtual = null;

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
        $id = $_GET['id'];
        $eventoAtual = $_SESSION['eventos'][$id] ?? null;
    }
?>
