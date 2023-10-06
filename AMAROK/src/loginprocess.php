<?php
    if (!isset($_POST["use"])  ||
    !isset($_POST["con"]))
    {
    exit();
    }
    session_start();
    $user = $_POST['use'];
    $passw = md5($_POST['con']);
    IF($user=='admin'){
        require 'conexion.php';
        include_once 'existePassword.php';
        $sentencia = $base_de_datos->query("select * from parametros where admincon= '$passw'");
        $num_rows = $sentencia -> fetchColumn();
        if($num_rows==0){
            echo "<script>
            alert('Usuario y/o Contraseña incorrectos!');
            window.location = 'login.php';
            </script>";
        }else{
            $_SESSION['username'] = $user;
            header("location: encabezado.php");
        }
    }else{
        require 'conexion_cliente.php';
        $sentencia = $base_de_datos->query("select clientCon from cliente where clientDoc= '$user' AND clientCon= '$passw'");
        $num_rows = $sentencia -> fetchColumn();
        if($num_rows==0){
            echo "<script>
            alert('Usuario y/o Contraseña incorrectos!');
            window.location = 'login.php';
            </script>";
        }else{
            $_SESSION['username'] = $user;
            header("location: encabezado-cliente.php");
        }
    }
?>