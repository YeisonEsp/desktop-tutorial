<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="../css/style_login.css">
<link rel="icon" href="../images/Pagina/casa-puerta-relleno-bs.svg">
<title>login</title>
</head>

<body>
	<div class="wrapper">
		<form action="loginProcess.php" method="POST">
			<div>
				<h1>LOGIN</h1>
				<a class="arrow-back" href="../">
					<i class="bi bi-arrow-left-circle"></i>
				</a>
			</div>
			<div class="input-box">
				<input type="text" name="use" id="use" placeholder="Usuario" autocomplete="off" required>
				<i class="bi bi-person"></i>
			</div>
			<div class="input-box">
				<input type="password" name="con" id="con" placeholder="Contraseña" required>
				<i class="bi bi-lock"></i>
			</div>
			<button type="submit" class="btn">Ingresar</button>
		</form>
	</div>
</body>
</html>