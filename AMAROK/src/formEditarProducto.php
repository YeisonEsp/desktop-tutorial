<?php

if (!isset($_GET["produccod"]))
{
	echo "No existe el Producto a editar";
	exit();
}

include_once 'encabezado.php';

$produccod = $_GET["produccod"];

include_once 'conexion.php';

$sentencia = $base_de_datos->prepare("SELECT produccod, producnom, producsto, producpre, producdis FROM producto WHERE produccod = ?;");
$sentencia->execute([$produccod]);
$productos = $sentencia->fetchObject();
if (!$productos)
{
    echo "¡No existe algún Producto con ese código!";
    exit();
}

?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="tlo">Editar</h1>
		<form action="editarProducto.php" method="POST">					
			<input type="hidden" name="produccod" value="<?php echo $productos->produccod; ?>">
			<div class="form-group">
				<label for="producnom">Nombre del Producto</label>
				<input value="<?php echo $productos->producnom; ?>" required name="producnom" type="text" minlength="10" maxlength="50" id="producnom" placeholder="Actualizar Nombre Producto" class="form-control">
			</div>

			<div class="form-group">
				<label for="producsto">Stock del Producto</label>
				<input value="<?php echo $productos->producsto; ?>" required name="producsto" type="number" min="1" max="999" id="producsto" placeholder="Actualizar Stock Producto" class="form-control">
			</div>

			<div class="form-group">
				<label for="producpre">Precio del Producto</label>
				<input value="<?php echo $productos->producpre; ?>" required name="producpre" type="number" min="100" max="9999999" id="producpre" placeholder="Actualizar Precio Producto" class="form-control">
			</div>			
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listarProductos.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>