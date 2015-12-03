<!--
	www.notas-programacion.com
	Descripcion:   
		Pantalla para recuperar el password del usuario en caso de extravio. 
	Archivo:    recuperarPassword.php
-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>.:: Recuperar Password ::. </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--Importar hojas de estilo -->
	<link href="css/estilos.css" rel="stylesheet" type="text/css">
	<link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" />

	<!--Importar scripts de javascript -->
	<script src="js/jquery171.js" type="text/javascript"></script> 
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script src="jsjquery.alerts.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	<!--
		$(document).ready(function() {
			$("#recPassword").validate({
				rules: {
				/*A continuacion los nombres de los campos y sus reglas a cumplir */
					correo2: {
						required: true,
						email: true,
						equalTo: "#correo"
					},
						correo: {
						required: true,
						email: true
					}


				}
			});
		});
	// -->
	</script>
	
</head>
<body>
<br /><br />


<form id="recPassword" name="recPassword"  method="POST" action="recuperarPassword.php">

<table align="center" width="50%">

<tr>
	<td colspan="2" align="center"><h3><b>Recuperar Password</b></h3></td>
</tr>

<?php
if( isset( $_POST['correo'] ) && $_POST['correo'] != '' )
{

	include("conectar_bd.php");  
	conectar_bd();
	include("generar_token.php");  

	$elcorreo   = $_POST['correo'];
	
	//Verificar si existe el correo en la BD
	$sql = "SELECT  id_usuario,tx_username,tx_nombre,tx_apellidoPaterno
			FROM tbl_users
			WHERE tx_correo = '".$elcorreo."'";			
	$rs_sql	= mysql_query($sql);

	if ( !( $fila 	= mysql_fetch_object($rs_sql) )  )
	{
		?>
			<input type="hidden" id="error" value="1">			
			<script type="text/javascript"> 
				location.href="recuperarPassword.php?error="+document.getElementById('error').value;
			</script>
		<?php
	}
	
	$idusr 	= $fila->id_usuario;
	$nombre = $fila->tx_nombre." ".$fila->tx_apellidoPaterno;
	$nick 	= $fila->tx_username;
	
	// Generacion de una nueva contraseña
	$pasw = obtenToken(8);
	
	// Envio al usuario su nuevo password
     $seEnvio;									//Para determinar si se envio o no el correo
     $destinatario = $elcorreo;					//A quien se envia
     $nomAdmin 			= 'Gonzalo Silverio';			//Quien envia
	 $mailAdmin 		= 'notaspro@notas-programacion.com';		//Nombre de quien envia
	 $urlAccessLogin = 'http://localhost/autenticar_usuarios/';		//Nombre de quien envia
//	 $mailAdmin = 'gonzasilve@localhost';		//Nombre de quien envia
     $elmensaje = "";     
     $asunto = "Nueva contraseña para ".$nick;

     $cuerpomsg ='
		<h3>.::Recuperar Password::.</h3>
		<p>A peticion de usted; se le ha asignado un nuevo password, utilice los siguientes datos para acceder al sistema</p>
		  <table border="0" >
			<tr>
			  <td colspan="2" align="center" ><br> Nuevos datos de acceso para <a href="'.$urlAccessLogin.'">'.$urlAccessLogin.'</a><br></td>
			</tr>
			<tr>
			  <td> Nombre </td>
			  <td> '.$nombre.' </td>
			</tr>
			<tr>
			  <td> Username </td>
			  <td> '.$nick.' </td>
			</tr>
			<tr>
			  <td> Password </td>
			  <td> '.$pasw.' </td>
			</tr>
		  </table> ';
		  
	date_default_timezone_set('America/Mexico_City');
		  
	//Establecer cabeceras para la funcion mail()
	//version MIME
	$cabeceras = "MIME-Version: 1.0\r\n";
	//Tipo de info
	$cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
	//direccion del remitente
	$cabeceras .= "From: ".$nomAdmin." <".$mailAdmin.">";
	$resEnvio = 0;
	if(mail($destinatario,$asunto,$cuerpomsg,$cabeceras))
	{
		//Actualizar pwd en la BD
		$sql_updt = "UPDATE tbl_users SET tx_password = '".md5($pasw)."' 
		WHERE (id_usuario = ".$idusr.")
		AND (tx_correo = '".$elcorreo."')";
		$res_updt = mysql_query($sql_updt);
		$resEnvio = 1;
	}
		
	// Mostrar resultado de envio
	?>
		<input type="hidden" id="enviado" value="<?php echo $resEnvio ?>">
		<input type="hidden" id="elcorreo" value="<?php echo $elcorreo ?>">
		<script type="text/javascript">
			location.href="recuperarPassword.php?enviado="+document.getElementById('enviado').value+"&elcorreo="+document.getElementById('elcorreo').value;
		</script>
	<?php
	
}
else
{
?>


<tr>
	<td colspan="2">Escriba su Correo electronico con el que se ha registrado, 
		se le enviara un nuevo password a su correo electronico:<br /><br /> 
	</td>
</tr>

<tr>
	<td>Correo electronico:</td>
	<td>
		<input type="text" name="correo" id="correo"  maxlength="50" />
	</td>
</tr>
<tr>
	<td>Confirme Correo electronico:</td>
	<td>
		<input type="text" name="correo2" id="correo2" maxlength="50" />
	</td>
</tr>

<?php
	if( isset($_GET['error']) && $_GET['error']==1 )
	{
		echo "<tr><td colspan='2'><br><font color='red'>El correo electronico no pertenece a ningun usuario registrado.</font><br></td></tr>";
	}
	else if( isset($_GET['enviado']) && isset($_GET['elcorreo'])  )
	{
		if( $_GET['enviado']==1 ) 
			echo "<tr><td colspan='2'><br><font color='green'>Su nueva contrase&ntilde;a ha sido enviada a <strong>".$_GET['elcorreo']."</strong>.</font><br></td></tr>";
		else if( $_GET['enviado']==0 ) 
			echo "<tr><td colspan='2'><br><font color='red'>Por el momento la nueva contrase&ntilde;a no pudo ser enviada a <strong>".$_GET['elcorreo']."</strong>.<br>
			Intente de nuevo mas tarde.</font></td></tr>";
	}
?>

<tr>
	<td colspan="2" align="center">
		<br /><br /> 
		<input type="submit" name="enviar" value="Enviar" >
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" onClick="javascript: location.href='index.php'" name="cancelar" value="Cancelar" >        
	</td>
</tr>

<?php
}
?>

</table>
</form>
</body>
</html>
