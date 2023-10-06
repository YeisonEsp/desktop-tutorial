<?php
$clien=2;
?>
<?php
include_once "conexion.php";

$sentencia = $base_de_datos->query('select cl.clientDoc, c.ciudadNom, cl.clientNom, cl.clientDir, cl.clientTel, 
									cl.clientEma, cl.clientPun, cl.clientAct FROM ciudad c JOIN cliente cl ON c.ciudadId=cl.idCiudad WHERE cl.clientAct=true ORDER BY cl.clientnom');
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<?php include_once "encabezado.php" ?>
<br>
<div class="row">
	<div class="col-12">
		<h1 class="crud-text">CLIENTES</h1><br>
		<a class="btn-agregar"  href="formAgregarCliente.php">Agregar ➕</a>
        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        <button class="btn-busc btn btn-outline-success" type="submit">Search</button>
		<a id="btnInactivos" class="btn-agregar"  href="#">Listar Inactivos </a>
		<input type="hidden" name="usercliente" value="<?php echo $cli; ?>">
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>DOCUMENTO</th>
						<th>CIUDAD</th>
						<th>NOMBRE</th>
						<th>DIRECCIÓN</th>
						<th>TELÉFONO</th>
						<th>EMAIL</th>
						<th>PUNTOS</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($clientes as $client)
					{
						
						?>
						<tr>
							<td><?php echo $client->clientdoc ?></td>
							<td><?php echo $client->ciudadnom ?></td>
							<td><?php echo $client->clientnom ?></td>
							<td><?php echo $client->clientdir ?></td>
							<td><?php echo $client->clienttel ?></td>
							<td><?php echo $client->clientema ?></td>
							<td><?php echo $client->clientpun ?></td>
							<td><a class="btn btn-warning" href="<?php echo "formEditarCliente.php?clientdoc=" . $client->clientdoc . "&usercliente=" .$clien?>">Editar 📝</a></td>
							<td><a class="btn btn-danger"  href="<?php echo "eliminarCliente.php?clientdoc=" . $client->clientdoc?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>