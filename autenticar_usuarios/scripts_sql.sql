/*
	www.notas-programacion.com
	Descripcion:
		Archivo con script para crear la bd y las tablas de este ejemplo.
	Archivo: scripts_sql.sql
*/ 
	
/*1.-  Crear la base de datos */
create database prueba;
 
/*2.- Crear Catalogo de tipos de usuario */
create table ctg_tiposusuario
(
id_TipoUsuario  int not null auto_increment,
tx_TipoUsuario  varchar(100),
primary key(id_TipoUsuario)
);
 
 
/*3.- Crear tabla de usuarios */
create table tbl_users(
id_usuario int not null auto_increment,
tx_nombre varchar(50) not null,
tx_apellidoPaterno varchar(50),
tx_apellidoMaterno varchar(50),
tx_correo varchar(100),
tx_username varchar(50),
tx_password varchar(250),
id_TipoUsuario int,
dt_registro datetime,
primary key(id_usuario),
foreign key(id_TipoUsuario) references ctg_TiposUsuario(id_TipoUsuario)
);
 
/*4.- Insertar tipos de usuarios de prueba*/
INSERT INTO `ctg_tiposusuario`( `tx_TipoUsuario`) VALUES ('Administrador');
INSERT INTO `ctg_tiposusuario`( `tx_TipoUsuario`) VALUES ('Usuario Normal');
 
/*El password: 12345 en MD5 = 827ccb0eea8a706c4c34a16891f84e7b */
/*5.- Insertar usuario de prueba*/
INSERT INTO tbl_users (tx_Nombre,tx_apellidoPaterno,tx_apellidoMaterno,tx_correo,
tx_username,tx_password,id_TipoUsuario,dt_registro)
VALUES('Gonzalo','Silverio','Silverio','gonzasilve@notas-programacion.com',
'gonzasilve','827ccb0eea8a706c4c34a16891f84e7b',1,'2012-11-09 17:35:40');
