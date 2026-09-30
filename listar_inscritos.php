<?php

require_once 'init.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$evento = $_POST['evento'];

if (!isset($_SESSION['inscricoes'])) {
    $_SESSION['inscricoes'] = [];
}

foreach ($_SESSION['inscricoes'] as $inscricao) {

    if ($inscricao['email'] == $email && $inscricao['evento'] == $evento) {

        exit('Este e-mail já está inscrito neste evento.');

    }

}

$_SESSION['inscricoes'][] = [
    'nome' => $nome,
    'email' => $email,
    'evento' => $evento
];

echo 'Inscrição realizada com sucesso!';

echo '<br><br>';

echo '<a href="inscricao.php">Voltar</a>';

foreach ($_SESSION['inscricoes'] as $inscricao) {

    echo '<p>Nome: ' . $inscricao['nome'] . '</p>';
    echo '<p>E-mail: ' . $inscricao['email'] . '</p>';

    if (isset($_SESSION['eventos'][$inscricao['evento']])) {
        echo '<p>Evento: ' .
            $_SESSION['eventos'][$inscricao['evento']]['titulo'] .
            '</p>';
    } else {
        echo '<p>Evento: Não informado</p>';
    }

    echo '<hr>';
}



