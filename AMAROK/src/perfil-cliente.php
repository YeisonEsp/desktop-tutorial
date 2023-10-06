<?php
include_once 'encabezado-cliente.php';

if (!isset($_GET["clientdoc"]))
{
	echo "No existe el Cliente";
	exit();
}

$clientdoc = $_GET["clientdoc"];

if($clientdoc != $_SESSION['username']){
	header("Location: encabezado-cliente.php");
}

include_once 'conexion_cliente.php';

$sentencia = $base_de_datos->prepare("SELECT clientdoc, clientnom, idCiudad, c.ciudadnom, d.departnom, clientdir, clienttel, clientema FROM cliente JOIN ciudad c ON idCiudad = c.ciudadId JOIN departamento d ON idDepart = d.departId WHERE clientdoc = ?;");
$sentencia->execute([$clientdoc]);
$clientes = $sentencia->fetchObject();

$cli = 1;

if (!$clientes)
{
    #No existe
    echo "¡No existe algún Cliente con ese documento!";
    exit();
}
?>

<div class="row">
	<div class="col-12">
		<h1 class="tlo">Mi Perfil</h1><br>
		<div>
			<input type="hidden" name="usercliente" value="<?php echo $cli; ?>">
			<input type="hidden" name="clientdoc" value="<?php echo $clientes->clientdoc; ?>">
			<div class="form-group">
				<label for="clientnom">Nombre:</label>
				<input value="<?php echo $clientes->clientnom; ?>" required name="clientnom" type="text" minlength="10" maxlength="50" disabled="true" id="clientnom" placeholder="Nombre del Cliente" class="form-control">
			</div>
			<div class="form-group form-select-ciu">
				<label for="ciudadnom">Ciudad</label> 
				<select disabled="true" name="ciudadnom" type="text" class="select-ciudad" id="ciudadnom">
					<?php
					$sentencia2 = $base_de_datos->prepare('SELECT c.ciudadid, c.ciudadnom, d.departnom FROM ciudad c JOIN departamento d ON c.iddepart = d.departid WHERE ciudadid <> ? ORDER BY d.departNom ;');
					$sentencia2->execute([$ciudadCli]);
					$ciudades = $sentencia2->fetchAll(PDO::FETCH_OBJ);
					?>
					<option class="optselected" value="<?php echo $clientes ->idciudad ?>"><?php echo $clientes ->departnom ?> , <?php echo $clientes ->ciudadnom ?></option>
					<?php foreach($ciudades as $ciud)
					{
						?>
						
						<option value="<?php echo $ciud ->ciudadid ?>"><?php echo $ciud->departnom ?> , <?php echo $ciud->ciudadnom ?></option>
					<?php
					} ?>
				</select>
			</div>
			<div class="form-group">
				<label for="clientdir">Dirección:</label>
				<input value="<?php echo $clientes->clientdir; ?>" required name="clientdir" type="text" minlength="15" disabled="true" id="clientdir" placeholder="Dirección del Cliente" class="form-control">
			</div>
			<div class="form-group">
				<label for="clienttel">Teléfono:</label>
				<input value="<?php echo $clientes->clienttel; ?>" required name="clienttel" type="text" min="3000000000" max="3999999999" disabled="true" id="clienttel" placeholder="Teléfono del Cliente" class="form-control">
			</div>
			<div class="form-group">
				<label for="clientema">Email:</label>
				<input value="<?php echo $clientes->clientema; ?>" required name="clientema" type="text" disabled="true" id="clientema" placeholder="Email del Cliente" class="form-control">
			</div>
			<a class="btn btn-warning" href="<?php echo "formEditarCliente.php?clientdoc=" . $clientes->clientdoc . "&usercliente=" .$cli?>">Editar</a>
			<a href="encabezado-cliente.php" class="btn btn-danger">Volver</a>
		</div>
	</div>
</div>