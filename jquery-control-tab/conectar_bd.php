<?php
/*
	www.notas-programacion.com
	Descripcion:
	Declara una funcion que permite conectarse a la 
	base de datos del ejemplo
	
	Archivo: conectar_bd.php
*/     
$conexio = null;
function conectar_bd() {
    global $conexio;
    //Definir datos de conexion con el servidor MySQL (local)   
    $elUsr = "root";
    $elPw  = "12345";
    $elServer ="localhost";
    $laBd = "jquerytabs_mysql";
     
    //Obtener link de conexion
    $conexio = mysql_connect($elServer, $elUsr , $elPw) or die (mysql_error());
     
    mysql_select_db($laBd, $conexio ) or die (mysql_error());
}
     
?>
