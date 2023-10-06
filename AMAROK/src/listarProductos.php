<?php
include_once "conexion.php";
$sentencia = $base_de_datos->query('select producCod, producNom, producSto, producPre FROM producto WHERE producDis=TRUE AND producAct=TRUE ORDER BY producNom');
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="crud-text">PRODUCTOS</h1><br>
		<a class="btn-agregar"  href="formAgregarProducto.php ">Agregar ➕</a>
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>CÓDIGO</th>
						<th>PRODUCTO</th>
						<th>STOCK</th>
						<th>PRECIO</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($productos as $produc)
					{
						?>
						<tr>
							<td><?php echo $produc->produccod ?></td>
							<td><?php echo $produc->producnom ?></td>
							<td><?php echo $produc->producsto ?></td>
							<td><?php echo $produc->producpre ?></td>
							<td><a class="btn btn-warning" href="<?php echo "formEditarProducto.php?produccod=" . $produc->produccod?>">Editar 📝</a></td>
							<td><a class="btn btn-danger"  href="<?php echo "eliminarProducto.php?produccod=" . $produc->produccod?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>