<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@2023-05-08
=========================================================================================
Este archivo lista todos los datos de la tabla, obteniendo a los mismos como un arreglo
=========================================================================================
*/
?>
<?php
include_once "conexion.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('select m.mensajdoc, m.mensajRol, m.mensajNom, m.mensajDir, m.mensajTel, m.mensajEma, m.mensajDis, m.mensajAct FROM mensajero m ORDER BY m.mensajNom');
$mensajeros = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<br>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1 class="crud-text">MENSAJEROS</h1><br>
		<a class="btn-agregar"  href="formAgregarMensajero.php">Agregar ➕</a>
		<br><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>DOCUMENTO</th>
						<th>ROL</th>
						<th>NOMBRE</th>
						<th>DIRECCIÓN</th>
                        <th>TELÉFONO</th>
                        <th>EMAIL</th>
						<th>DISPONIBLE</th>
						<th>ACTIVO</th>
						<th>EDITAR</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($mensajeros as $mens)
					{
						if($mens->mensajdis){
                            $mens->mensajdis='SI';
                        }else{
                            $mens->mensajdis='NO';
                        }
                        if($mens->mensajact){
                            $mens->mensajact='SI';
                        }else{
                            $mens->mensajact='NO';
                        }
						?>
						<tr>
							<td><?php echo $mens->mensajdoc ?></td>
							<td><?php echo $mens->mensajrol ?></td>
							<td><?php echo $mens->mensajnom ?></td>
							<td><?php echo $mens->mensajdir ?></td>
                            <td><?php echo $mens->mensajtel ?></td>
                            <td><?php echo $mens->mensajema ?></td>
							<td><?php echo $mens->mensajdis ?></td>
                            <td><?php echo $mens->mensajact ?></td>
							<td><a class="btn btn-warning" href="<?php echo "formEditarMensajero.php?mensajdoc=" . $mens->mensajdoc?>">Editar 📝</a></td>
							<td><a class="btn btn-danger"  href="<?php echo "eliminarMensajero.php?mensajdoc=" . $mens->mensajdoc?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>