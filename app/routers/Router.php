<?php

    require '../../vendor/autoload.php';

    use app\controllers\Controller;


    if (isset($_POST["data"]))
    {
        $data = $_POST["data"];
        $horaInicio = $_POST["hora-inicio"];
        $horaSaida = $_POST["hora-saida"];
    
        $dataParam = [
            "data" => $data,
            "hora_inicio" => "$data $horaInicio",
            "hora_saida" => "$data $horaSaida",
        ];

        Controller::create($dataParam);

        header("Location: ./../../index.php");

    }
?>