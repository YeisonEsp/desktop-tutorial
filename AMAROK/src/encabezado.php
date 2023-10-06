<!doctype html>
<html lang="es">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Ejemplo de Conexión y SP">
    <meta name="author" content="ADSO 2023">
    <title>SISTEMA | Yeison Espinosa y Miguel Rodriguez</title>
    <!-- Cargar el CSS de Boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Cargar estilos propios -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style_menu.css" rel="stylesheet">
    <link href="../css/styles-tabla.css" rel="stylesheet">
    <link rel="icon" href="../images/Pagina/casa-puerta-relleno-bs.svg">
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    if($_SESSION['username']!='admin'){
        header("location: login.php");
    }
?>


<div class="div-menu">
    <ul>
        <a  class="enlace">
			<img src="../images/Pagina/amarok.ico" alt="Logo de la casa de la amarok" class="enc-ico logo">
		</a>
        <li class="cs"><a href="salir.php">Cerrar Sesión</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn ges">Gestiones <i class="bi bi-arrow-down-short"></i></a>
            <div class="dropdown-content ges">
                <a href="listarClientes.php">Clientes</a>
                <a href="listarProductos.php">Productos</a>
                <a href="listarDepartamentos.php">Departamentos</a>
                <a href="listarCiudades.php">Ciudades</a>
                <a href="listarEmpresas.php">Empresas<br>Transporte</a>
                <a href="listarProveedores.php">Proveedores</a>
                <a href="listarParametros.php">Parámetros</a>
                <a href="listarTiposPagos.php">Tipos Pagos</a>
                <a href="listarMensajeros.php">Mensajeros</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn ven">Ventas <i class="bi bi-arrow-down-short"></i></a>
            <div class="dropdown-content ven">
                <a href="listarVentas.php">Listar</a>
                <a href="agregarVenta.php">Agregar</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn ped">Pedidos Proveedores <i class="bi bi-arrow-down-short"></i></a>
            <div class="dropdown-content ped">
                <a href="listarPedidos.php">Listar</a>
                <a href="#">Agregar</a>
            </div>
        </li>
        <li><a href="listarEnviosLocales.php">Envíos Locales</a></li>
        <li><a href="listarEnviosNacionales.php">Envíos Nacionales</a></li>
    </ul>
</div>
<a class="arrow-back" href="encabezado.php">
    <i class="bi bi-arrow-left-circle"></i>
</a>
    <main role="main" class="container">