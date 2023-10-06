<?php

    $sentencia = $base_de_datos->query("select adminCon from parametros where empreNit='123'");
    $locos = $sentencia -> fetchColumn();

    IF($locos==NULL){
        echo "<script>
            alert('ESTAMOS CRAZY!');
            window.location = './login.php';
            </script>";
    }
?>