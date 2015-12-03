<?php
/*     
	www.notas-programacion.com
	Descripcion:   
		Conecta con el Manejador de Base de Datos (DBMS) y deja disponible una variable global (conexio)
		para ser utilizada posteriormente. 
	Archivo:    conectar_bd.php 
*/
 
$conexio;
function conectar_bd()
{
    global $conexio;
    //Definir datos de conexion con el servidor MySQL
    $elUsr = "root";
    $elPw  = "12345";
    $elServer ="localhost";
    $laBd = "prueba";
     
    //Conectar
    $conexio = mysql_connect($elServer, $elUsr , $elPw) or die (mysql_error());
     
    //Seleccionar la BD a utilizar
    mysql_select_db($laBd, $conexio ) or die (mysql_error());
}  
?>