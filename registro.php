<?php
	include('funciones.php');

	session_start();

	if (existeParametro('usuario',$_SESSION)) {
		header("Location: perfil.php");
		exit;
	}

	$nombre = traerValorDeParametro('nombre',$_POST);
  $apellido = traerValorDeParametro('apellido',$_POST);
	$email = traerValorDeParametro('email',$_POST);
	$password = traerValorDeParametro('password',$_POST);
	$existeFile = existeFileSinError('imagenperfil');
	$infoUsuario = [];
	$error = false;


	if (existeParametro('login', $_POST)) {

		if ($nombre && $email && $password && $existeFile) {

      //traigo info del usuario por email
			$infoUsuario = traerInfoUsuarioPorCampo('email',$email);

			if ($infoUsuario['existe']) {
				$error = true;
			} else{
				guardarUsuario([
					'nombre'=>$nombre,
          'apellido'=>$apellido,
					'email' => $email,
					'password' => password_hash($password,PASSWORD_DEFAULT),
					'imagenperfil' => guardarArchivoSubido('imagenperfil', 'imagen_perfil_','./imgperfiles/')
				]);

				$infoUsuario = traerInfoUsuarioPorCampo('email', $email);
				if ($infoUsuario['existe']) {
				$_SESSION['usuario'] = $infoUsuario['usuario'];
				header("Location: index.php");
				exit;
				}
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
  <link rel="stylesheet" href="./css/reg.css">

</head>

<body>
  <header>
    <a href="./index.php">
    <div class="logo"><img src="img/logo-home2.png" alt="logotipo" class="logo1">
      </a>
    </div>
  </header>

  <h1>Registrate</h1>

  <form class="login" action="" method="post" enctype="multipart/form-data">

		<?php if($error && array_key_exists('existe', $infoUsuario) && $infoUsuario['existe']): ?>
			<p>
				<span>Error: El email ingresado (<?= $email ?>) ya existe en la base de datos. Por favor use un email diferente.</span>
			</p>
		<?php endif; ?>

			<div><label for="name">Nombre</label>
			<input type="text" name="nombre" class="input_text" value="<?= $nombre ?>" required >
			<?php if($error && !$nombre):?>
				<span>Ingrese su nombre</span>
			<?php endif; ?>
      </div>

			<div><label for="name">Apellido</label>
				<input type="text" name="apellido" class="input_text" value="<?= $apellido?>" required >
  			<?php if($error && !$nombre):?>
  				<span>Ingrese su Apellido</span>
  			<?php endif; ?>
      </div>

      <div><label for="username">Email</label>
        <input type="text" name="email" id="email" value="<?= $email ?>" required>
  			<?php if($error && !$email):?>
  				<span>Ingrese su email</span>
  			<?php endif; ?>
      </div>

      <div><label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
        <?php if($error && !$password):?>
  				<span>Ingrese su password</span>
  			<?php endif; ?>
      </div>

      <div><label for="imagenperfil">Foto de Perfil</label>
        <input type="file" name="imagenperfil">
        <?php if($error && !$existeFile):?>
          <span>Ingrese su foto de perfil</span>
        <?php endif; ?>
      </div>

      <div class="actions">
        <input type="submit" name="login" value="Registrarse">
				<a href="/forgot">Olvidé mi contraseña</a>
      </div>
  </form>


  <footer>
    <ul>
      <li><a href="./index.html"><h5>Home</i></h5></a></li>
      <li><a href="./presupuestos.html"><h5>Presupuestos</i></h5></a></li>
      <li><a href="./login.html"><h5>Login</i></h5></a></li>
      <li><a href="./faq.html"><h5>FAQ</i></h5></a></li>
    </ul>
  </footer>
</body>

</html>
