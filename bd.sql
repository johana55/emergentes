CREATE TABLE accion (
	id serial NOT NULL,
	descripcion char(30) NOT NULL
);

CREATE TABLE casouso (
	id serial NOT NULL,
	descripcion char(20) NOT NULL,
	modulo integer
);


CREATE TABLE catalogo (
	id serial NOT NULL,
	descripcion char(50),
	fechaInicio timestamp,
	fechaFin timestamp
);

CREATE TABLE categoria (
	id serial NOT NULL,
	descripcion char(30) NOT NULL
);


CREATE TABLE cliente (
	id integer  NOT NULL,
	nombres varchar(100),
	apellidos varchar(50) NOT NULL,
	correo varchar(100) NOT NULL,
	direccion integer NOT NULL,
	telefono varchar(20),
	nit varchar(20),
	localidad varchar(200) NOT NULL
);

CREATE TABLE cuaccion (
	cu integer NOT NULL,
	accion integer NOT NULL
);

CREATE TABLE departamento (
	id serial NOT NULL,
	nombre varchar(100) NOT NULL,
	pais integer NOT NULL
);

CREATE TABLE direccion (
	id serial NOT NULL,
	nombre varchar(100) NOT NULL,
	departamento integer NOT NULL
);

CREATE TABLE empleado (
	id integer NOT NULL,
	domicilio char(100),
	nombre varchar(50) NOT NULL,
	apellido varchar(100) NOT NULL,
	telefono varchar(20)
);

CREATE TABLE envios (
	empleado integer NOT NULL,
	pedido integer NOT NULL,
	fechahora timestamp NOT NULL,
	comentario varchar(300)
);


CREATE TABLE imagen (
	id serial NOT NULL,
	url text NOT NULL,
	producto integer NOT NULL
);


CREATE TABLE marca (
	id serial NOT NULL,
	descripcion char(30) NOT NULL
);

CREATE TABLE metodo_envio (
	id serial NOT NULL,
	descripcion varchar(100) NOT NULL,
	monto decimal(10,2) DEFAULT 0 NOT NULL
);

CREATE TABLE metodo_pago (
	id serial NOT NULL,
	descripcion varchar(100) NOT NULL,
	precio_comision decimal(10,2) DEFAULT 0 NOT NULL
);

CREATE TABLE modulo (
	id serial NOT NULL,
	descripcion char(30) NOT NULL
);

CREATE TABLE pais (
	id serial NOT NULL,
	nombre varchar(100) NOT NULL
)
;


CREATE TABLE pedido (
	id serial NOT NULL,
	cliente integer NOT NULL,
	direccion integer NOT NULL,
	metodo_envio integer NOT NULL,
	metodo_pago integer NOT NULL,
	horafecha timestamp NOT NULL,
	total decimal(10,2) NOT NULL,
	iva decimal(10,2) NOT NULL
);

CREATE TABLE pedido_producto (
	pedido integer NOT NULL,
	producto integer NOT NULL,
	cantidad integer DEFAULT 0 NOT NULL
);

CREATE TABLE permiso (
	cu integer NOT NULL,
	accion integer NOT NULL,
	rol integer NOT NULL
);


CREATE TABLE producto (
	id serial NOT NULL,
	nombre varchar(200) NOT NULL,
	descripcion varchar(250) NOT NULL,
	precio_compra numeric(10,2) NOT NULL,
	unidad_medida integer NOT NULL,
	marca integer NOT NULL,
	categoria integer
);

CREATE TABLE producto_catalogo (
	id serial NOT NULL,
	producto integer NOT NULL,
	catalogo integer NOT NULL,
	precio decimal(10,2) NOT NULL,
	stock integer,
	show boolean
);

CREATE TABLE rol (
	id serial NOT NULL,
	nombre varchar(100) NOT NULL
);

CREATE TABLE unidad_medida (
	id serial NOT NULL,
	abreviatura varchar(10) NOT NULL,
	descripcion varchar(100) NOT NULL
);


CREATE TABLE usuario (
	id serial NOT NULL,
	nombre_usuario varchar(100) NOT NULL,
	password varchar(200) NOT NULL,
	tipo integer NOT NULL,
	email varchar(250) NOT NULL,
	id_rol integer
);




ALTER TABLE accion ADD CONSTRAINT PK_accion
	PRIMARY KEY (id)
;


ALTER TABLE casouso ADD CONSTRAINT PK_casouso
	PRIMARY KEY (id)
;


ALTER TABLE catalogo ADD CONSTRAINT PK_catalogo
	PRIMARY KEY (id)
;


ALTER TABLE categoria ADD CONSTRAINT PK_categoria
	PRIMARY KEY (id)
;


ALTER TABLE cliente ADD CONSTRAINT PK_prospecto
	PRIMARY KEY (id)
;


ALTER TABLE cuaccion ADD CONSTRAINT PK_cuaccion
	PRIMARY KEY (cu, accion)
;


ALTER TABLE departamento ADD CONSTRAINT PK_departamento
	PRIMARY KEY (id)
;


ALTER TABLE direccion ADD CONSTRAINT PK_direccion
	PRIMARY KEY (id)
;


ALTER TABLE empleado ADD CONSTRAINT PK_empleado
	PRIMARY KEY (id)
;


ALTER TABLE envios ADD CONSTRAINT PK_envios
	PRIMARY KEY (empleado, pedido)
;


ALTER TABLE imagen ADD CONSTRAINT PK_imagen
	PRIMARY KEY (id)
;


ALTER TABLE marca ADD CONSTRAINT PK_marca
	PRIMARY KEY (id)
;


ALTER TABLE metodo_envio ADD CONSTRAINT PK_metodo_envio
	PRIMARY KEY (id)
;


ALTER TABLE metodo_pago ADD CONSTRAINT PK_metodo_pago
	PRIMARY KEY (id)
;


ALTER TABLE modulo ADD CONSTRAINT PK_modulo
	PRIMARY KEY (id)
;


ALTER TABLE pais ADD CONSTRAINT PK_pais
	PRIMARY KEY (id)
;


ALTER TABLE pedido ADD CONSTRAINT PK_pedido
	PRIMARY KEY (id)
;


ALTER TABLE pedido_producto ADD CONSTRAINT PK_pedido_producto
	PRIMARY KEY (pedido, producto)
;


ALTER TABLE permiso ADD CONSTRAINT PK_permiso
	PRIMARY KEY (cu, accion, rol)
;


ALTER TABLE producto ADD CONSTRAINT PK_producto
	PRIMARY KEY (id)
;


ALTER TABLE producto_catalogo ADD CONSTRAINT PK_producto_catalogo
	PRIMARY KEY (id)
;


ALTER TABLE rol ADD CONSTRAINT PK_rol
	PRIMARY KEY (id)
;


ALTER TABLE unidad_medida ADD CONSTRAINT PK_unidad_medida
	PRIMARY KEY (id)
;


ALTER TABLE usuario ADD CONSTRAINT PK_usuario
	PRIMARY KEY (id)
;



ALTER TABLE accion
	ADD CONSTRAINT UQ_accion_descripcion UNIQUE (descripcion)
;
ALTER TABLE casouso
	ADD CONSTRAINT UQ_casouso_descripcion UNIQUE (descripcion)
;
ALTER TABLE categoria
	ADD CONSTRAINT UQ_categoria_descripcion UNIQUE (descripcion)
;
ALTER TABLE marca
	ADD CONSTRAINT UQ_marca_descripcion UNIQUE (descripcion)
;
ALTER TABLE modulo
	ADD CONSTRAINT UQ_modulo_descripcion UNIQUE (descripcion)
;
ALTER TABLE rol
	ADD CONSTRAINT UQ_rol_nombre UNIQUE (nombre)
;
ALTER TABLE unidad_medida
	ADD CONSTRAINT UQ_unidad_medida_abreviatura UNIQUE (abreviatura)
;
ALTER TABLE usuario
	ADD CONSTRAINT UQ_usuario_email UNIQUE (email)
;
ALTER TABLE usuario
	ADD CONSTRAINT UQ_usuario_nombre_usuario UNIQUE (nombre_usuario)
;

ALTER TABLE casouso ADD CONSTRAINT FK_casouso_modulo
	FOREIGN KEY (modulo) REFERENCES modulo (id)
;

ALTER TABLE cliente ADD CONSTRAINT FK_cliente_direccion
	FOREIGN KEY (direccion) REFERENCES direccion (id)
;

ALTER TABLE cliente ADD CONSTRAINT FK_cliente_usuario
	FOREIGN KEY (id) REFERENCES usuario (id)
;

ALTER TABLE cuaccion ADD CONSTRAINT FK_cuaccion_accion
	FOREIGN KEY (accion) REFERENCES accion (id)
;

ALTER TABLE cuaccion ADD CONSTRAINT FK_cuaccion_casouso
	FOREIGN KEY (cu) REFERENCES casouso (id)
;

ALTER TABLE departamento ADD CONSTRAINT FK_departamento_pais
	FOREIGN KEY (pais) REFERENCES pais (id)
;

ALTER TABLE direccion ADD CONSTRAINT FK_direccion_departamento
	FOREIGN KEY (departamento) REFERENCES departamento (id)
;

ALTER TABLE empleado ADD CONSTRAINT FK_empleado_usuario
	FOREIGN KEY (id) REFERENCES usuario (id)
;

ALTER TABLE envios ADD CONSTRAINT FK_envios_empleado
	FOREIGN KEY (empleado) REFERENCES empleado (id)
;

ALTER TABLE envios ADD CONSTRAINT FK_envios_pedido
	FOREIGN KEY (pedido) REFERENCES pedido (id)
;

ALTER TABLE imagen ADD CONSTRAINT FK_imagen_producto
	FOREIGN KEY (producto) REFERENCES producto (id)
;

ALTER TABLE pedido ADD CONSTRAINT FK_pedido_direccion
	FOREIGN KEY (direccion) REFERENCES direccion (id)
;

ALTER TABLE pedido ADD CONSTRAINT FK_pedido_metodo_pago
	FOREIGN KEY (metodo_pago) REFERENCES metodo_pago (id)
;

ALTER TABLE pedido_producto ADD CONSTRAINT FK_pedido_producto_pedido
	FOREIGN KEY (pedido) REFERENCES pedido (id)
;

ALTER TABLE pedido_producto ADD CONSTRAINT FK_pedido_producto_producto_catalogo
	FOREIGN KEY (producto) REFERENCES producto_catalogo (id)
;

ALTER TABLE permiso ADD CONSTRAINT FK_permiso_cuaccion
	FOREIGN KEY (cu, accion) REFERENCES cuaccion (cu, accion)
;

ALTER TABLE permiso ADD CONSTRAINT FK_permiso_rol
	FOREIGN KEY (rol) REFERENCES rol (id)
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

ALTER TABLE producto_catalogo ADD CONSTRAINT FK_producto_catalogo_catalogo
	FOREIGN KEY (catalogo) REFERENCES catalogo (id)
;

ALTER TABLE producto_catalogo ADD CONSTRAINT FK_producto_catalogo_producto
	FOREIGN KEY (producto) REFERENCES producto (id)
;

ALTER TABLE usuario ADD CONSTRAINT FK_usuario_rol
	FOREIGN KEY (id_rol) REFERENCES rol (id)
;


// datos

INSERT into rol VALUES (1,'ADMINISTRADOR');
INSERT into rol VALUES (2,'EMPLEADO');
INSERT into rol VALUES (3,'CLIENTE');
insert into usuario VALUES (1,'johana','123',1,'jz89@hotmail.com',1);
insert into usuario VALUES (2,'german','123',1,'yhermany@live.com',1);

INSERT  into unidad_medida VALUES (1,'caja8','caja de 8 unidades');
INSERT  into unidad_medida VALUES (2,'caja12','caja de 12 unidades');
INSERT  into unidad_medida VALUES (3,'pack','packete');

INSERT INTO marca VALUES (2,'HITACHY');
INSERT INTO marca VALUES (3,'SONY');
INSERT INTO marca VALUES (4,'SAMSUNG');

INSERT INTO categoria VALUES (2,'AUDIFONO');
INSERT INTO categoria VALUES (3,'CELULAR');

alter table catalogo add COLUMN nombre char(50) UNIQUE;
ALTER TABLE catalogo add COLUMN  show INTEGER;

INSERT INTO pais VALUES (1,'BOLIVIA');
INSERT INTO departamento VALUES (1,'SANTA CRUZ',1);
INSERT INTO departamento VALUES (2,'LA PAZ',1);
