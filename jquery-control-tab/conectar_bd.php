<?php
/*
<<<<<<< HEAD
	www.notas-programacion.com
=======
	www.notas.programacion.com
>>>>>>> 3341c51ca6dd63dd30a6577097e96170be4574a7
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
