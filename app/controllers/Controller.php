<?php

namespace app\controllers;
use app\models\Sql;
use app\functions\Functions;

class Controller{

    static function home(){
        $data = Sql::read();
        $function = new Functions();

        require './app/views/home.php';
    }

    static function create($data)
    {
        Sql::create($data);
    }

    static function update()
    {
        echo "update";
    }
    static function read()
    {
       var_dump(Sql::read());
    }

    static function delete()
    {
        echo "delete";
    }
}

?>