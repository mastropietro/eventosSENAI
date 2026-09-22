<?php
require_once ('init.php');


$_SESSION['eventos'][] = $_POST;

if (isset($_SESSION['eventos'])) {
    header('location: index.php');
    exit;
} else {
    print 'Erro ao adicionar eventos.';
}