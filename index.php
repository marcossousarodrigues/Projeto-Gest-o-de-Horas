<?php

require './vendor/autoload.php';

use app\controllers\Controller;

use app\models\Sql;

$controller = new Controller();

$controller::home();

?>

