<?php

	include('funciones.php');
	session_start();

	if (existeParametro('usuario',$_SESSION)) {
		header("Location: index.php");
		exit;
	}

	$email = traerValorDeParametro('email',$_POST);
	$password = traerValorDeParametro('password',$_POST);
	$infoUsuario = [];
	$error = false;
	$passwordError = false;

	if (existeParametro('login', $_POST)) {

		if($email && $password) {

			$infoUsuario = traerInfoUsuarioPorCampo('email', $email);
			if ($infoUsuario['existe']) {
				if (password_verify($password, $infoUsuario['usuario']['password'] )) {


					$_SESSION['usuario'] = $infoUsuario['usuario'];

					if (existeParametro('recordarUsuario', $_POST)){
					setcookie('email', $email);
					setcookie('password', $password);
					setcookie('recordar', true);
					}else{
					setcookie('email', $email, time()-3600);
					setcookie('password', $password,time()-3600);
					setcookie('recordar', true,time()-3600);
					}
					header("Location: index.php");
					exit;

				} else {
					$error = true;
					$passwordError = true;
				}

			} else {
				$error = true;
			}

		} else {
			$error = true;
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BudgetFork</title>

	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
  <link rel="stylesheet" href="./css/login.css">

</head>

<body>
  <header>
    <a href="./index.php">
    <div class="logo"><img src="img/logo-home2.png" alt="logotipo" class="logo1">
      </a>
    </div>
  </header>
  <h1>Iniciar Sesion</h1>

  <form class="login" action="" method="post">


    <?php
		//Si no existe el usuario
		if($error && array_key_exists('existe', $infoUsuario) && !$infoUsuario['existe']):
		?>
      <p>
        <span>Error: El email no existe en la base de datos. </span>
      </p>
    <?php endif; ?>


    <?php // Si la clave es invalida
		if($error && $passwordError):
		?>
      <p>
        <span>Error: La clave es incorrecta. </span>
      </p>
    <?php endif; ?>



      <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email"
				value="<?= existeParametro('email',$_COOKIE) ? $_COOKIE['email'] : $email ?>">
  			<?php if($error && !$email):?>
  				<span>Ingrese su email</span>
  			<?php endif; ?>
      </div>

      <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" value="<?= existeParametro('password',$_COOKIE) ? $_COOKIE['password'] : $password ?>">
        <?php if($error && !$password):?>
  				<span>Ingrese su password</span>
  			<?php endif; ?>
			</div>

			<div>
				<input type="checkbox" name="recordarUsuario" value="recordar"
				<?php if(existeParametro('recordar',$_COOKIE)):?> checked <?php endif; ?>>
				<label for="recordarUsuario">Recordar Usuario</label>
      </div>


      <div class="actions">
        <input type="submit" name="login" value="Login"> <a href="/forgot">Olvidé mi contraseña</a>
      </div>

      <footer>
        <ul>
          <li><a href="./index.php"><h5>Home</i></h5></a></li>
          <li><a href="./presupuestos.php"><h5>Presupuestos</i></h5></a></li>
          <li><a href="./registro.php"><h5>Registrate</i></h5></a></li>
          <li><a href="./faq.php"><h5>FAQ</i></h5></a></li>
        </ul>
      </footer>
  </form>

</body>

</html>
