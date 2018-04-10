<?php

	include('funciones.php');

	session_start();

	if (existeParametro('usuario',$_SESSION)) {
		session_destroy();
		unset($_SESSION['usuario']);
		header("Location: index.php");
		exit;
	}


?>
