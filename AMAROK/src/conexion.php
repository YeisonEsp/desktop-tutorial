<?php

$password        = "Yeison01*";
$usuario            = "yespinosa";
$nombreBaseDeDatos  = "db_amarok";
#Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$server = "127.0.0.1";
$puerto = "5433";
try
{
    $base_de_datos = new PDO("pgsql:host=$server;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $password);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*    echo "Me Conecté"; */
}

catch (Exception $e)
{
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}