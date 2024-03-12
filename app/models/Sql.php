<?php

namespace app\models;

use app\models\Connection;

class Sql
{
    static function create($dataParam)
    {
        $connect = Connection::connect();


        $sql = "INSERT INTO tb_gestao_horas (projeto, data, hora_inicio, hora_saida)  VALUES (:projeto, :data, :hora_inicio, :hora_saida)";

        $stmt = $connect->prepare($sql);
        $stmt->bindValue(":projeto", $dataParam['projeto']);
        $stmt->bindValue(":data", $dataParam['data']);
        $stmt->bindValue(":hora_inicio", $dataParam['hora_inicio']);
        $stmt->bindValue(":hora_saida", $dataParam['hora_saida']);

        $stmt->execute();
    }

    static function read()
    {   
        $connect = Connection::connect();
        $sql = "SELECT * FROM tb_gestao_horas";
        $stmt = $connect->prepare($sql);

        $stmt->execute();

        $query = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $query;
    }
}


?>