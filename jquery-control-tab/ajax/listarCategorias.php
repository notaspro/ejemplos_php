<?php
/*
	www.notas-programacion.com
	Descripcion:
	Archivo que es llamado mediante una peticion ajax y se encarga
	de devolver en forma de HTML una tabla con las categorias de la BD	
	
	Archivo: listarCategorias.php
*/
    include("../conectar_bd.php");
    conectar_bd();
     
    //Hacer una consulta de la tabla categorias a la base de datos  
    $queryCategorias = "SELECT * FROM cta_CategoriasProductos; ";
    $resCategorias = mysql_query($queryCategorias);
?>
 
    <TABLE WIDTH="95%" BORDER="0" >
        <TR class="filaEncabezado">
            <TD width="1%" align="left">ID</TD>
            <TD align="left">NOMBRE</TD>
            <TD align="left">DESCRIPCION</TD>
        </TR>
<?php    
    $i=0;
    //Ciclo para obtener y desplegar cada registro de la tabla categorias
    while( $filaCategoria = mysql_fetch_array($resCategorias) ) {
        $estilo = ( ($i%2)==0 ) ? "celdaWhite" : "celdaGreen";
?>
        <TR class="<?=$estilo; ?>"  >
            <TD><?=$filaCategoria['id_CategoriaProducto']; ?></TD>
            <TD><?=$filaCategoria['tx_Nombre']; ?></TD>
            <TD><?=$filaCategoria['tx_Descripcion']; ?></TD>
        </TR>
<?php
    $i++;
    }   //Fin del ciclo
?>
    </TABLE>
<?php
    mysql_close($conexio);
?>
