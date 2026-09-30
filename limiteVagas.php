<?php
$limiteVagas = $_POST['limiteVagas'];
if (filter_var($limiteVagas, FILTER_VALIDATE_INT) === false || $limiteVagas <= 0) {
    echo "O limite de vagas deve ser um número inteiro positivo.";
    exit;
}
echo "Limite de vagas válido: " . $limiteVagas;
?>