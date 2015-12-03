/*
	www.notas-programacion.com
	Descripcion:
		Sentencias SQL para crear la Base de datos del ejemplo.
		Crea una BD llamada jquerytabs_mysql con dos tablas
		cta_CategoriasProductos y tbl_productos
	
	Archivo: scriptsBD.sql
*/

/*Crear la base de datos*/
CREATE DATABASE jquerytabs_mysql;
USE jquerytabs_mysql;
 
 /*Crear la tabla de Categorias*/
CREATE TABLE cta_CategoriasProductos(id_CategoriaProducto INT NOT NULL AUTO_INCREMENT,
tx_Nombre VARCHAR(50),
tx_Descripcion VARCHAR(500),
primary key(id_CategoriaProducto) );
 
/*Crear la tabla Productos*/
CREATE TABLE tbl_productos(id_producto INT NOT NULL AUTO_INCREMENT,
tx_NombreProducto VARCHAR(50),
tx_Descripcion VARCHAR(500),
dt_FechaCaducidad DATETIME DEFAULT NULL,
mn_PrecioCompra DECIMAL(5,2),
mn_PrecioPublico DECIMAL(5,2),
id_Categoria INT,
primary key(id_producto),
foreign key (id_Categoria) references cta_CategoriasProductos(id_CategoriaProducto)  );
   

 /*Insertar 2 categorias para los productos*/
INSERT INTO cta_CategoriasProductos(tx_Nombre,tx_Descripcion) 
VALUES('Perfumeria','Todo tipo de productos de limpieza y productos de tocador');
 
INSERT INTO cta_CategoriasProductos(tx_Nombre,tx_Descripcion) 
VALUES('Frituras','Productos de frituras; palomitas, totopos, etc.');
 
INSERT INTO cta_CategoriasProductos(tx_Nombre,tx_Descripcion) 
VALUES('Abarrotes','Todo tipo de Productos de abarrotes; enlatados, veladoras, refrescos, etc .'); 


/*Insertar 3 Productos de ejemplo*/
INSERT INTO tbl_productos (tx_NombreProducto,tx_Descripcion,dt_FechaCaducidad,mn_PrecioCompra,mn_PrecioPublico,id_Categoria) 
VALUES('Shampoo Ultra humectante','Shampoo caja/2 pzas marca patito','2013-07-04',245.50,315.00,1);
 
INSERT INTO tbl_productos (tx_NombreProducto,tx_Descripcion,dt_FechaCaducidad,mn_PrecioCompra,mn_PrecioPublico,id_Categoria)
VALUES('Papas refritas','Papas fritas bolsa 150 gr. superpapas','2012-11-22 10:45',3.50,6.50,2);
 
INSERT INTO tbl_productos (tx_NombreProducto,tx_Descripcion,dt_FechaCaducidad,mn_PrecioCompra,mn_PrecioPublico,id_Categoria)
VALUES('Jabon anti alopecia','Jabon higienico 1 pza 145 gr.','2013-04-16 07:57',8.50,10.50,1);
 
