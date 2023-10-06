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
    <link href="../css/styles_productos.css" rel="stylesheet">
    <link href="../css/styles-carrito.css" rel="stylesheet">
    <link rel="icon" href="../images/Pagina/casa-puerta-relleno-bs.svg">
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['username'])){
            header("location: login.php");
        }
        if($_SESSION['username'] == 'admin'){
            header("location: login.php");
        }
    ?>
<div class="div-menu">
    <ul>
        <a  class="enlace">
            <img src="../images/Pagina/amarok.ico" alt="Logo de la casa de la amarok" class="enc-ico logo">
        </a>
        <li class="cs"><a href="salir.php">Cerrar Sesión</a></li>
        <li class="cs"><a href="<?php echo "perfil-cliente.php?clientdoc=" . $_SESSION['username']?>">Perfil</a></li>
        <li class="cs"><a href="compras-cliente.php">Mis Compras</a></li>
        <li id="lg-car"><a href="carrito-compras.php">
            <i class="bi bi-cart-plus-fill"></i>
            </a>
        </li>
        <li class="categorias"><a href="productos.php">Productos</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn ges">Categorias<i class="bi bi-arrow-down-short"></i></a>
            <div class="dropdown-content ges">
                <a href="productos.php">Aceites</a>
                <a href="productos.php">Frenos</a>
                <a href="productos.php">Motores</a>
                <a href="productos.php">Suspension</a>
                <a href="productos.php">Llantas</a>
            </div>
        </li>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn-buscar btn btn-outline-success" type="submit">Search</button>
        </form>
    </ul>
    </div>
    <a class="arrow-back" href="encabezado-cliente.php"><i class="bi bi-arrow-left-circle"></i></a>
    <main role="main" class="container">