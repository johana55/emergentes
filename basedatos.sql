CREATE TABLE usuario (
	id serial NOT NULL,
	nombre_usuario varchar(100) NOT NULL,
	password varchar(200) NOT NULL,
	tipo integer NOT NULL,
	email varchar(250) NOT NULL,
	id_rol integer NOT NULL
)
;

ALTER TABLE usuario
	ADD CONSTRAINT UQ_usuario_email UNIQUE (email)
;
ALTER TABLE usuario
	ADD CONSTRAINT UQ_usuario_nombre_usuario UNIQUE (nombre_usuario)
;
ALTER TABLE usuario ADD CONSTRAINT PK_usuario
	PRIMARY KEY (id)
;
ALTER TABLE usuario ADD CONSTRAINT FK_usuario_rol
	FOREIGN KEY (id_rol) REFERENCES rol (id)
;

CREATE TABLE rol (
	id serial NOT NULL,
	nombre varchar(100) NOT NULL
)
;

ALTER TABLE rol
	ADD CONSTRAINT UQ_rol_nombre UNIQUE (nombre)
;
ALTER TABLE rol ADD CONSTRAINT PK_rol
	PRIMARY KEY (id)
;
