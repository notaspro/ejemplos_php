<?php
/*     
	www.notas-programacion.com
	Descripcion:   
		Pantalla inicial que se muestra al usuario una vez que ha 
		sido logueado correctamente. 
	Archivo:    principal.php 
*/

//Inicializar una sesion de PHP
session_start();
 
//Validar que el usuario este logueado y exista un UID
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la
    //pantalla de login, enviando un codigo de error
?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="2">
        </form>
        <script type="text/javascript">
            document.formulario.submit();
        </script>
<?php
}
 
    //Conectar BD
    include("conectar_bd.php"); 
    conectar_bd();
 
    //Sacar datos del usuario que ha iniciado sesion
    $sql = "SELECT  tx_nombre,tx_apellidoPaterno,tx_TipoUsuario,id_usuario
            FROM tbl_users
            LEFT JOIN ctg_tiposusuario
            ON tbl_users.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
            WHERE id_usuario = '".$_SESSION['uid']."'";        
    $result     =mysql_query($sql);
 
    $nombreUsuario = "";
 
    //Formar el nombre completo del usuario
    if( $fila = mysql_fetch_array($result) )
        $nombreUsuario = $fila['tx_nombre']." ".$fila['tx_apellidoPaterno'];
     
//Cerrrar conexion a la BD
mysql_close($conexio);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>.:: Inicio ::. Ejemplo autenticar usuarios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<!--Importar hojas de estilo -->	
		<link href="css/estilos.css" rel="stylesheet" type="text/css">

</head>
<body topmargin="0" >
<table align="right" width="350px" border="0">
<tr>                                              <!-- Dar Bienvenida al usuario -->
    <td  width="100px" align="right">Bienvenido <b><?php echo $nombreUsuario ?></b></td>
    <td  width="15px" align="center">
        <!-- Proporcionar Link para cerrar sesion -->
        <a href="cerrarSesion.php">Cerrar sesi&oacute;n</a>
    </td>
</tr>
</table>
<br /><br />
<h2 align="center">Pantalla Principal</h2>
 
        <!-- Contenido inicial del sitio web -->
         
<body>
</html>