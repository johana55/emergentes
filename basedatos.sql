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

//3/15/2016
CREATE TABLE categoria (
  id serial NOT NULL,
  descripcion char(30) NOT NULL
)
;

CREATE TABLE imagen (
  id serial NOT NULL,
  url text NOT NULL,
  producto integer NOT NULL
)
;

CREATE TABLE marca (
  id serial NOT NULL,
  descripcion char(30) NOT NULL
)
;

CREATE TABLE producto (
  id serial NOT NULL,
  nombre varchar(200) NOT NULL,
  descripcion varchar(250) NOT NULL,
  precio_venta numeric(10,2) NOT NULL,
  precio_compra numeric(10,2) NOT NULL,
  unidad_medida integer NOT NULL,
  marca integer NOT NULL,
  categoria integer not null
)
;

CREATE TABLE unidad_medida (
  id serial NOT NULL,
  abreviatura varchar(10) NOT NULL,
  descripcion varchar(100) NOT NULL
)
;

ALTER TABLE categoria ADD CONSTRAINT PK_categoria
PRIMARY KEY (id)
;


ALTER TABLE imagen ADD CONSTRAINT PK_imagen
PRIMARY KEY (id)
;


ALTER TABLE marca ADD CONSTRAINT PK_marca
PRIMARY KEY (id)
;


ALTER TABLE producto ADD CONSTRAINT PK_producto
PRIMARY KEY (id)
;


ALTER TABLE unidad_medida ADD CONSTRAINT PK_unidad_medida
PRIMARY KEY (id)
;
ALTER TABLE categoria
  ADD CONSTRAINT UQ_categoria_descripcion UNIQUE (descripcion)
;
ALTER TABLE marca
  ADD CONSTRAINT UQ_marca_descripcion UNIQUE (descripcion)
;
ALTER TABLE unidad_medida
  ADD CONSTRAINT UQ_unidad_medida_abreviatura UNIQUE (abreviatura)
;

ALTER TABLE imagen ADD CONSTRAINT FK_imagen_producto
FOREIGN KEY (producto) REFERENCES producto (id)
;

ALTER TABLE producto ADD CONSTRAINT FK_producto_categoria
FOREIGN KEY (categoria) REFERENCES categoria (id)
;

ALTER TABLE producto ADD CONSTRAINT FK_producto_marca
FOREIGN KEY (marca) REFERENCES marca (id)
;

ALTER TABLE producto ADD CONSTRAINT FK_producto_unidad_medida
FOREIGN KEY (unidad_medida) REFERENCES unidad_medida (id)
;

CREATE TABLE accion (
  id integer NOT NULL,
  descripcion char(30) NOT NULL
)
;

CREATE TABLE casouso (
  id integer NOT NULL,
  descripcion char(20) NOT NULL
)
;

CREATE TABLE cuaccion (
  cu integer NOT NULL,
  accion integer NOT NULL
)
;

CREATE TABLE permiso (
  cu integer NOT NULL,
  accion integer NOT NULL,
  rol integer NOT NULL
)
;

ALTER TABLE accion ADD CONSTRAINT PK_accion
PRIMARY KEY (id)
;


ALTER TABLE casouso ADD CONSTRAINT PK_casouso
PRIMARY KEY (id)
;


ALTER TABLE cuaccion ADD CONSTRAINT PK_cuaccion
PRIMARY KEY (cu, accion)
;


ALTER TABLE permiso ADD CONSTRAINT PK_permiso
PRIMARY KEY (cu, accion, rol)
;
ALTER TABLE accion
  ADD CONSTRAINT UQ_accion_descripcion UNIQUE (descripcion)
;
ALTER TABLE casouso
  ADD CONSTRAINT UQ_casouso_descripcion UNIQUE (descripcion)
;

ALTER TABLE cuaccion ADD CONSTRAINT FK_cuaccion_accion
FOREIGN KEY (accion) REFERENCES accion (id)
;

ALTER TABLE cuaccion ADD CONSTRAINT FK_cuaccion_casouso
FOREIGN KEY (cu) REFERENCES casouso (id)
;

ALTER TABLE permiso ADD CONSTRAINT FK_permiso_cuaccion
FOREIGN KEY (cu, accion) REFERENCES cuaccion (cu, accion)
;

ALTER TABLE permiso ADD CONSTRAINT FK_permiso_rol
FOREIGN KEY (rol) REFERENCES rol (id)
;

//poblacion
insert INTO  rol VALUES (2,'empleado');

insert INTO  casouso VALUES (1,'pedido');
insert INTO  casouso VALUES (2,'catalogo');
insert INTO  casouso VALUES (3,'cliente');

insert INTO  accion VALUES (1,'leer');
insert INTO  accion VALUES (2,'crear');
insert INTO  accion VALUES (3,'eliminar');
insert INTO  accion VALUES (4,'actualizar');

insert INTO  cuaccion VALUES (1,1);
insert INTO  cuaccion VALUES (1,2);
insert INTO  cuaccion VALUES (1,3);
insert INTO  cuaccion VALUES (1,4);
insert INTO  cuaccion VALUES (2,1);
insert INTO  cuaccion VALUES (2,2);
insert INTO  cuaccion VALUES (2,3);
insert INTO  cuaccion VALUES (2,4);
insert INTO  cuaccion VALUES (3,1);
insert INTO  cuaccion VALUES (3,2);
insert INTO  cuaccion VALUES (3,3);
insert INTO  cuaccion VALUES (3,4);

insert INTO  permiso VALUES (1,1,1);
insert INTO  permiso VALUES (1,2,1);
insert INTO  permiso VALUES (1,3,1);
insert INTO  permiso VALUES (1,4,1);

insert INTO  permiso VALUES (2,1,1);
insert INTO  permiso VALUES (2,2,1);

alter TABLE casouso ADD  column modulo integer;
CREATE TABLE modulo (
  id integer NOT NULL,
  descripcion char(30) NOT NULL
)
;ALTER TABLE modulo ADD CONSTRAINT PK_modulo
PRIMARY KEY (id)
;
ALTER TABLE modulo
  ADD CONSTRAINT UQ_modulo_descripcion UNIQUE (descripcion)
;

INSERT into modulo VALUES (1,'PEDIDOS');//PARA LA PIMERA VERSION TODOS LOS CU ESTAN EN EL PRIMER MODULO
  INSERT into modulo VALUES (2,'CLIENTES');
  INSERT into modulo VALUES (3,'CATALOGO');
  UPDATE casouso set modulo=1


