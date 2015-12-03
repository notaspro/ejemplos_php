/*     
	www.notas-programacion.com
	Descripcion:   
		Script para crear la tabla tbl_tokens que se usara en el ejemplo
		de generacion de tokens de seguridad
	Archivo:    script_sql.sql
*/

CREATE DATABASE prueba_tokens;

USE prueba_tokens;

CREATE TABLE tbl_tokens(
	id INT NOT NULL auto_increment,
	tx_token VARCHAR(12) NOT NULL,
	tx_correo VARCHAR(60) NOT NULL,
	PRIMARY KEY(id)
);