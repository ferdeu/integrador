<?php

	function existeParametro($nombre, $arrayDonde) {
		return array_key_exists($nombre, $arrayDonde);
	}

	function existeFileSinError($nombre) {
		if (existeParametro($nombre, $_FILES) && $_FILES[$nombre]['error'] === UPLOAD_ERR_OK) {
			return true;
		}
		return false;
	}

	function traerValorDeParametro($nombre, $arrayDonde, $default = null) {
		if (existeParametro($nombre, $arrayDonde) && !empty($arrayDonde[$nombre])) {
			return $arrayDonde[$nombre];
		}

		return $default;
	}

	function traerInfoUsuarioPorCampo($campo, $valor) {
		$usuarios = json_decode(file_get_contents('usuarios.json'),true);
		if (is_null($usuarios)) {
			$usuarios = ['usuarios' => []];
		}

		$existe = false;
		$posicion = null;
		$usuarioEncontrado = null;

		foreach ($usuarios['usuarios'] as $indice => $usuario) {
			if ($usuario[$campo] == $valor) {
				$existe = true;
				$posicion = $indice;
				$usuarioEncontrado = $usuario;
			}
		}

		return [
			'existe' => $existe,
			'posicion' => $posicion,
			'usuario' => $usuarioEncontrado,
		];
	}

	function guardarArchivoSubido($nombreDelInputFile, $nombreTargetFile, $carpetaTarget) {
		if (array_key_exists($nombreDelInputFile, $_FILES)) {
			$file = $_FILES[$nombreDelInputFile];

			$nombre = $file['name'];
			$tmp = $file['tmp_name'];
			$ext = pathinfo($nombre, PATHINFO_EXTENSION);

			if(!file_exists($carpetaTarget)) {
				$old = umask(0);
				mkdir($carpetaTarget, 0777);
				umask($old);
			}

			$date = new DateTime();
			$urlcompleta = $carpetaTarget . $nombreTargetFile .$date->getTimestamp()."." . $ext;
			move_uploaded_file($tmp, $urlcompleta);
			return $urlcompleta;
		}
	}

	function guardarUsuario($usuario) {
		$usuarios = json_decode(file_get_contents('usuarios.json'),true);
		if (is_null($usuarios)) {
			$usuarios = ['usuarios' => []];
		}

		$usuarios['usuarios'][] = $usuario;

		file_put_contents('usuarios.json', json_encode($usuarios,JSON_PRETTY_PRINT));
	}



?>
