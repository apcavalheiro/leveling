<?php

define('DB_HOST', "db");
define('DB_USER', "root");
define('DB_PASSWORD', "root");
define('DB_NAME', "leveling_db");
define('DB_DRIVER', "mysql");
define('TITLE', "Nivelamento DEV-I");

function dd($dump)
{
    var_dump($dump);
    die();
}

function dataToMoeda($valor)
{
    number_format($valor, 2, ',', '.');
    return $valor;
}