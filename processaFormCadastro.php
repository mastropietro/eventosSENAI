<?php

require_once('init.php');

if (isset($_SESSION['eventos'])) {

    $novoEvento = [
        'id' => $_SESSION['proximo_id'],
        'titulo' => $_POST['titulo'],
        'descricao' => $_POST['descricao'],
        'area' => $_POST['area'],
        'data' => $_POST['data'],
        'inicio' => $_POST['inicio'],
        'fim' => $_POST['fim'],
        'local' => $_POST['local'],
        'responsavel' => $_POST['responsavel'],
        'limiteVagas' => $_POST['limiteVagas'],
        'status' => 'ativo'
    ];

    $_SESSION['eventos'][] = $novoEvento;

    $_SESSION['proximo_id']++;

    header('Location: index.php');
    exit;

} else {

    print 'Erro ao adicionar eventos.';
}