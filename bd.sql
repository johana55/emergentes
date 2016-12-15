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
INSERT into rol VALUES (1,'ADMINISTRADOR');
INSERT into rol VALUES (2,'EMPLEADO');
INSERT into rol VALUES (3,'CLIENTE');
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
INSERT  into unidad_medida VALUES (1,'caja8','caja de 8 unidades');
INSERT  into unidad_medida VALUES (2,'caja12','caja de 12 unidades');
INSERT  into unidad_medida VALUES (3,'pack','packete');

INSERT INTO marca VALUES (2,'HITACHY');
INSERT INTO marca VALUES (3,'SONY');
INSERT INTO marca VALUES (4,'SANGSUN');

INSERT INTO categoria VALUES (2,'AUDIFONO');
INSERT INTO categoria VALUES (3,'CELULAR');


CREATE TABLE catalogo (
  id serial NOT NULL,
  descripcion char(50),
  fechaInicio TIMESTAMP not null,
  fechaFin TIMESTAMP NOT NULL
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
alter table catalogo add COLUMN nombre char(50) UNIQUE;
alter table catalogo add COLUMN show BOOLEAN;

CREATE TABLE cliente (
  id integer NOT NULL,
  fechacreado TIMESTAMP NOT NULL,
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

INSERT INTO pais VALUES (1,'BOLIVIA');
INSERT INTO departamento VALUES (1,'SANTA CRUZ',1);
INSERT INTO departamento VALUES (2,'LA PAZ',1);
INSERT INTO ciudad VALUES (1,'Andrez Ibañes',1);
INSERT INTO ciudad VALUES (2,'Cotoca',1);
ALTER TABLE catalogo drop COLUMN show;
ALTER TABLE catalogo ADd COLUMN  show INTEGER;

