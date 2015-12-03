<?php
/*     
	www.notas-programacion.com
	Descripcion:   
		Ejemplos de generacion de tokens se seguridad.
	Archivo:    generar_token.php 
*/

	function obtenCaracterAleatorio($arreglo) {
		$clave_aleatoria = array_rand($arreglo, 1);	//obten clave aleatoria
		return $arreglo[ $clave_aleatoria ];	//devolver item aleatorio
	}

	function obtenCaracterMd5($car) {
		$md5Car = md5($car.Time());	//Codificar el caracter y el tiempo POSIX (timestamp) en md5
		$arrCar = str_split(strtoupper($md5Car));	//Convertir a array el md5
		$carToken = obtenCaracterAleatorio($arrCar);	//obten un item aleatoriamente
		return $carToken;
	}

	function obtenToken($longitud) {
		//crear alfabeto
		$mayus = "ABCDEFGHIJKMNPQRSTUVWXYZ";
		$mayusculas = str_split($mayus);	//Convertir a array
		//crear array de numeros 0-9
		$numeros = range(0,9);
		//revolver arrays
		shuffle($mayusculas);
		shuffle($numeros);
		//Unir arrays
		$arregloTotal = array_merge($mayusculas,$numeros);
		$newToken = "";
		
		for($i=0;$i<=$longitud;$i++) {
				$miCar = obtenCaracterAleatorio($arregloTotal);
				$newToken .= obtenCaracterMd5($miCar);
		}
		return $newToken;
	}
?>

