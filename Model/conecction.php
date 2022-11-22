<?php
$password = "";
$user = "root";
$name_bd = "db_cafeteria";

try{
    $bd = new PDO(
        'mysql:host=localhost;
        dbname='.$name_bd,
        $user,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
}catch (Exception $e){
    echo "¡ERROR! Problema con la conexión a la Base de Datos: ".$e->getMessage();
}

?>