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
ALTER TABLE usuario ADD CONSTRAINT FK_usuario_rol
	FOREIGN KEY (id_rol) REFERENCES rol (id)
;
insert into usuario VALUES (1,'johana','123',1,'jz89@hotmail.com',1);
insert into usuario VALUES (2,'german','123',1,'yhermany@live.com',1);

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
insert INTO  rol VALUES (1,'ADMINISTRADOR');
insert INTO  rol VALUES (2,'EMPLEADO');

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

INSERT  into unidad_medida VALUES (2,'caja8','caja de 8 unidades');
INSERT  into unidad_medida VALUES (3,'caja12','caja de 12 unidades');
INSERT  into unidad_medida VALUES (4,'pack','packete');

INSERT INTO marca VALUES (2,'HITACHY');
INSERT INTO marca VALUES (3,'SONY');
INSERT INTO marca VALUES (4,'SANGSUN');

INSERT INTO categoria VALUES (2,'AUDIFONO');
INSERT INTO categoria VALUES (3,'CELULAR');


CREATE TABLE catalogo (
  id serial NOT NULL,
  descripcion char(50),
  fechaInicio char(20),
  fechaFin char(20)
)
;
CREATE TABLE producto_catalogo (
  id serial NOT NULL,
  producto integer NOT NULL,
  catalogo integer NOT NULL,
  precio decimal(10,2) NOT NULL,
  stock integer,
show boolean
)
;

ALTER TABLE catalogo ADD CONSTRAINT PK_catalogo
PRIMARY KEY (id)
;
ALTER TABLE producto_catalogo ADD CONSTRAINT PK_producto_catalogo
PRIMARY KEY (id)
;
ALTER TABLE producto_catalogo ADD CONSTRAINT FK_producto_catalogo_catalogo
FOREIGN KEY (catalogo) REFERENCES catalogo (id)
;

ALTER TABLE producto_catalogo ADD CONSTRAINT FK_producto_catalogo_producto
FOREIGN KEY (producto) REFERENCES producto (id)
;
alter table catalogo add COLUMN nombre char(50) UNIQUE
alter table catalogo add COLUMN show BOOLEAN


CREATE TABLE prospecto (
  id integer NOT NULL,
  nombres char(50),
  apellidos char(50),
  correo char(50),
  direccion char(60),
  telefono char(8),
  nit char(15),
  ciudad integer
)
;
CREATE TABLE cliente (
  id integer NOT NULL,
  fechacreado char(16) NOT NULL,
  prospecto integer
)
;

CREATE TABLE empleado (
  id integer NOT NULL,
  domicilio char(100)
)
;
ALTER TABLE cliente ADD CONSTRAINT PK_cliente
PRIMARY KEY (id)
;


ALTER TABLE empleado ADD CONSTRAINT PK_empleado
PRIMARY KEY (id)
;


ALTER TABLE prospecto ADD CONSTRAINT PK_prospecto
PRIMARY KEY (id)
;




ALTER TABLE cliente ADD CONSTRAINT FK_cliente_prospecto
FOREIGN KEY (prospecto) REFERENCES prospecto (id)
;

ALTER TABLE cliente ADD CONSTRAINT FK_cliente_usuario
FOREIGN KEY (id) REFERENCES usuario (id)
;

ALTER TABLE empleado ADD CONSTRAINT FK_empleado_usuario
FOREIGN KEY (id) REFERENCES usuario (id)
;
CREATE TABLE ciudad (
  id integer NOT NULL,
  nombre char(20),
  depto integer
)
;

CREATE TABLE departamento (
  id integer NOT NULL,
  nombre char(20),
  pais integer
)
;

CREATE TABLE pais (
  id integer NOT NULL,
  nombre char(30)
)
;
ALTER TABLE ciudad ADD CONSTRAINT PK_ciudad
PRIMARY KEY (id)
;
ALTER TABLE departamento ADD CONSTRAINT PK_departamento
PRIMARY KEY (id)
;
ALTER TABLE pais ADD CONSTRAINT PK_pais
PRIMARY KEY (id)
;

ALTER TABLE ciudad ADD CONSTRAINT FK_ciudad_departamento
FOREIGN KEY (depto) REFERENCES departamento (id)
;

ALTER TABLE departamento ADD CONSTRAINT FK_departamento_pais
FOREIGN KEY (pais) REFERENCES pais (id)
;
ALTER TABLE prospecto ADD CONSTRAINT FK_prospecto_ciudad
FOREIGN KEY (ciudad) REFERENCES ciudad (id)
;
INSERT INTO pais VALUES (1,'BOLIVIA');
INSERT INTO departamento VALUES (1,'SANTA CRUZ',1);
INSERT INTO departamento VALUES (2,'LA PAZ',1);
INSERT INTO ciudad VALUES (1,'Andrez Ibañes',1);
INSERT INTO ciudad VALUES (2,'Cotoca',1);

