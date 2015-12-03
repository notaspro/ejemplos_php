<?php
/*
	www.notas-programacion.com
	Descripcion:
	Archivo que es llamado mediante una peticion ajax y se encarga
	de devolver en forma de HTML una tabla con los productos de la BD	
	
	Archivo: listarProductos.php
*/
    include("../conectar_bd.php");
    conectar_bd();
     
    //Hacer una consulta de la tabla productos a la base de datos
    $queryProductos = "SELECT tbl_productos.*,cta_CategoriasProductos.tx_Nombre AS categoria 
                        FROM tbl_productos
                        INNER JOIN cta_CategoriasProductos
                        ON tbl_productos.id_Categoria = cta_CategoriasProductos.id_CategoriaProducto;";
    $resProductos = mysql_query($queryProductos);
?>
 
    <TABLE WIDTH="95%" BORDER="0" >
        <TR class="filaEncabezado">
            <TD width="1%" align="left">ID</TD>
            <TD align="left">NOMBRE</TD>
            <TD align="left">DESCRIPCION</TD>
            <TD align="left">FECHA CADUCIDAD</TD>
            <TD align="left">PRECIO LISTA</TD>
            <TD align="left">PRECIO PUBLICO</TD>
            <TD align="left">CATEGORIA</TD>
        </TR>
<?php    
    $i=0;
    //Ciclo para obtener y desplegar cada registro de la tabla productos
    while( $filaProducto = mysql_fetch_array($resProductos) ) {
        $estilo = ( ($i%2)==0 ) ? "celdaWhite" : "celdaGreen";
?>
        <TR class="<?=$estilo; ?>"  >
            <TD><?=$filaProducto['id_producto']; ?></TD>
            <TD><?=$filaProducto['tx_NombreProducto']; ?></TD>
            <TD><?=$filaProducto['tx_Descripcion']; ?></TD>
            <TD><?=$filaProducto['dt_FechaCaducidad']; ?></TD>
            <TD><?="$".$filaProducto['mn_PrecioCompra']; ?></TD>
            <TD><?="$".$filaProducto['mn_PrecioPublico']; ?></TD>
            <TD><?=$filaProducto['categoria']; ?></TD>
        </TR>
<?php
    $i++;
    }   //Fin de ciclo
?>
    </TABLE>
<?php
    mysql_close($conexio);
?>
