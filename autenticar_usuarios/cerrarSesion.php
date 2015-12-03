<?php
/*     
	www.notas-programacion.com
	Descripcion:   
		Archivo para destruir las variables de sesion de un usuario logueado y terminar la sesion,
		ademas redirecciona nuevamente a la pagina de login. 
	Archivo:    cerrarSesion.php 
*/
session_start();
// Destruye todas las variables de la sesion
session_unset();
// Finalmente, destruye la sesion
session_destroy();
 
//Redireccionar a la pagina de login
header ("Location: index.php");
 
?>