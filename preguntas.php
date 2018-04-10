<?php

	include('funciones.php');
	session_start();

  $logeado = false;

	if (existeParametro('usuario',$_SESSION)) {
	$logeado = true;
  $nombre = traerValorDeParametro('nombre',$_SESSION['usuario']);
  $apellido = traerValorDeParametro('apellido',$_SESSION['usuario']);
  $email = traerValorDeParametro('email',$_SESSION['usuario']);
	}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BudgetFork - Preguntas</title>

	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
  <link rel="stylesheet" href="./css/faq.css">

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
<?php  if(!$logeado){?>
      <li><a href="./login.php">Ingresar</a></li>
      <li><a href="./registro.php">Registrate</a></li>
<?php }else{ ?>
      <li><a href="./perfil.php"><?= $nombre ?> - Ir al Perfil</a></li>
      <li><a href="./logout.php">Cerrar Sesion</a></li>
<?php } ?>
		</nav>
	</header>


  <section class="hero">
    <div class="background-image" style="background-image: url(img/back.jpg);"></div>
	</section>

	<section class="features">
		<h3 class="title">Preguntas Frecuentes</h3>

    <hr>
		<ul class="grid">
			<li>
				<i class=""></i>
				<h4>¿Quiénes somos?</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id felis et ipsum bibendum ultrices vitae pulvinar velit.</p>
			</li>
			<li>
				<i class=""></i>
				<h4>¿Cómo nace BudgetFork?</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id felis et ipsum bibendum ultrices vitae pulvinar velit.</p>
			</li>
			<li>
				<i class=""></i>
				<h4>Misión ¿Qué buscamos?</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id felis et ipsum bibendum ultrices vitae pulvinar velit.</p>
			</li>
			<li>
				<i class=""></i>
				<h4>Visión ¿Qué nos guía?</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id felis et ipsum bibendum ultrices vitae pulvinar velit.</p>
			</li>
			<li>
				<i class=""></i>
				<h4>¿Cómo realizamos nuestras dietas?</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id felis et ipsum bibendum ultrices vitae pulvinar velit.</p>
			</li>
			<li>
				<i class=""></i>
				<h4>¿Cómo encargar?</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id felis et ipsum bibendum ultrices vitae pulvinar velit.</p>
			</li>
			<li>
				<i class=""></i>
				<h4>¿Qué profesionales nos avalan?</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id felis et ipsum bibendum ultrices vitae pulvinar velit.</p>
			</li>
			<li>
				<i class=""></i>
				<h4>Cómo nos podés encontrar?</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id felis et ipsum bibendum ultrices vitae pulvinar velit.</p>
			</li>
		</div>
	</section>

	<section class="contact">
    <hr>
    <h3 class="title">¿Preguntas o sugerencias? Nos encantaría escucharte.</h3>
		<form>
			<input type="email" placeholder="Email">
			<a href="#" class="btn">Contactanos!</a>
		</form>
	</section>

	<footer>
		<ul>
      <li><a href="#">BudgetFork<i class="fa fa-bfork-square"></i></a></li>
			<li><a href="#">Twitter<i class="fa fa-twitter-square"></i></a></li>
			<li><a href="#">Facebook<i class="fa fa-facebook-square"></i></a></li>
			<li><a href="#">Youtube<i class="fa fa-youtube-square"></i></a></li>
		</ul>
	</footer>

</body>

</html>
