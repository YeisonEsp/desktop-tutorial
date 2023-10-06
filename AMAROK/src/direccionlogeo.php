<?php
    if(session_destroy()){
        header("location: login.php");
    }else{
        if($_SESSION['username']=='admin'){
            header("location: encabezado.php");
        }else{
            header("location: encabezado-cliente.php");
        }
    }
?>