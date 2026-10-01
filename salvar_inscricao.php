<?php

require_once 'init.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$evento = $_POST['evento'];
$limiteVagas = $_SESSION['eventos'][$evento]['limiteVagas'];

if (
    !isset($_SESSION['eventos'][$evento]) ||
    $_SESSION['eventos'][$evento]['status'] != 'ativo'
) {
    exit('A inscrição não pode ser realizada porque este evento está inativo.');
}

$limiteVagas = $_SESSION['eventos'][$evento]['limiteVagas'];

if (!isset($_SESSION['inscricoes'])) {
    $_SESSION['inscricoes'] = [];
}

if (count($_SESSION['inscricoes']) >= $limiteVagas) {
    exit('O evento selecionado não tem vagas disponíveis.');
}

foreach ($_SESSION['inscricoes'] as $inscricao) {

    if (
        $inscricao['email'] == $email &&
        $inscricao['evento'] == $evento
    ) {

        exit('Este e-mail já está inscrito neste evento.');
    }
}

$_SESSION['inscricoes'][] = [
    'nome' => $nome,
    'email' => $email,
    'evento' => $evento
];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Inscrição</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h1>Inscrição realizada com sucesso!</h1>

    <hr>

    <p>
        Nome: <?= $nome ?>
    </p>

    <p>
        E-mail: <?= $email ?>
    </p>

    <br>

    <a href="inscricao.php">
        Voltar
    </a>

    <br><br>

    <a href="listar_inscritos.php">
        Ver inscritos
    </a>

</body>

</html>