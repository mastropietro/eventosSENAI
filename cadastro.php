<?php
require_once 'init.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<link rel="stylesheet" href="style.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario de eventos</title>
</head>

<body>
    <h1>Eventos SENAI</h1>
    <?php require_once 'nav.php'; ?>
    <hr>
    <h1>Formulário de Cadastro de Eventos</h1>
    <form action="processaFormCadastro.php" method="POST">
        <label for="nome">Título do Evento</label>
        <input type="text" id="titulo" name="titulo" placeholder="Escreva o titulo do evento" required>
        <br>

        <label for="area">Área do Evento</label>
        <input type="text" id="area" name="area" placeholder="Escreva a area do evento" required>
        <br>

        <label for="descricao">Descrição do Evento</label>
        <input type="text" id="descricao" name="descricao" placeholder="Escreva a descrição do evento" required>
        <br>

        <label for="data">Data do Evento</label>
        <input type="text" id="data" name="data" placeholder="Escreva a data do evento" required>
        <br>

        <label for="inicio">Início do Evento</label>
        <input type="text" id="inicio" name="inicio" placeholder="Escreva o início do evento" required>
        <br>

        <label for="fim">Fim do Evento</label>
        <input type="text" id="fim" name="fim" placeholder="Escreva o fim do evento" required>
        <br>

         <label for="local">Local do Evento</label>
        <input type="text" id="local" name="local" placeholder="Escreva o local do evento" required>
        <br>

         <label for="responsavel">Responsável do Evento</label>
        <input type="text" id="responsavel" name="responsavel" placeholder="Escreva o responsável do evento" required>
        <br>
        <button type="submit">enviar</button>
    </form>

</body>

</html>