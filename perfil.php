<?php

	include('funciones.php');
	session_start();

	if (!existeParametro('usuario',$_SESSION)) {
		header("Location: login.php");
		exit;
	}
	$usuario = $_SESSION['usuario'];
	$nombre = traerValorDeParametro('nombre',$_SESSION['usuario']);
	$apellido = traerValorDeParametro('apellido',$_SESSION['usuario']);
	$email = traerValorDeParametro('email',$_SESSION['usuario']);
	$imagen = $_SESSION['usuario']['imagenperfil'];




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BudgetFork - Perfil Usuario</title>

<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>

	<header>
    <a href="./index.php">
    <div class="logo"><img src="img/logo-home2.png" alt="logotipo" class="logo1">
    </div>
	 </a>
		<nav>
      <li><a href="./recetas.php">Recetas</a></li>
      <li><a href="./preguntas.php">FAQ</a></li>
      <li><a href="./logout.php">Cerrar Sesion</a></li>
		</nav>
	</header>

	<section class="hero">
    <div class="background-image" style="background-image: url(img/back.jpg);"></div>
	</section>

	<section class="perfil">
	<h1>Bienvenido: <?= $apellido . ", " . $nombre ?></h1>
	<img src="<?= $imagen ?>" style="max-width: 200px;">

	<form method="post" enctype="multipart/form-data">

		<p>Datos de mi cuenta: </p>
		<div>
			<label for="nombre">Nombre:</label><br>
			<input type="text" name="nombre" value="<?= $nombre ?>">
		</div>

		<div>
			<label for="nombre">Apellido:</label><br>
			<input type="text" name="nombre" value="<?= $apellido ?>">
		</div>

		<div>
			<label for="email">Email:</label><br>
			<input type="email" name="email" value="<?= $email ?>">
		</div>

		<!-- <div>
			<label for="password">Password Anterior:</label><br>
			<input type="password" name="passwordviejo">
		</div>
		<div>
			<label for="password">Nuevo Password:</label><br>
			<input type="password" name="passwordnuevo">
		</div> -->
		<!-- <p>
			<input type="submit" name="modificar" value="Modificar Datos">
		</p> -->

	</form>
	</section>

</body>
</html>
