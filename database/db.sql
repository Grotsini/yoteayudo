CREATE TABLE perfil (
    id_perfil INT(3) NOT NULL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL 
);

CREATE TABLE grupo (
    id_grupo INT(3) NOT NULL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    numIntegrantes INT(2) NOT NULL
);

CREATE TABLE vehiculo (
    id_vehiculo INT(3) NOT NULL PRIMARY KEY,
    placa VARCHAR(6) NOT NULL
);

CREATE TABLE estadoRuta (
    id_er INT(3) NOT NULL PRIMARY KEY,
    estado INT(1) NOT NULL
);

CREATE TABLE estadoPersona (
    id_ep INT(3) NOT NULL PRIMARY KEY,
    estado INT(1) NOT NULL
);

CREATE TABLE via (
    id_via INT(3) NOT NULL PRIMARY KEY,
    tipo INT(1) NOT NULL
);

CREATE TABLE estadoEntrega (
    id_ee INT(3) NOT NULL PRIMARY KEY,
    estadp INT(1) NOT NULL
);

CREATE TABLE ayuda (
    id_ayuda INT(3) NOT NULL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    cantidad INT(2) NOT NULL
);

CREATE TABLE familia (
    id_familia INT(3) NOT NULL PRIMARY KEY,
    numIntegrantes INT(2) NOT NULL,
    numContagiados INT(2) NOT NULL
);

CREATE TABLE usuario (
    id_usuario INT(3) NOT NULL PRIMARY KEY,
    id_perfil INT(3) NOT NULL,
    dni VARCHAR(8) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido_pat VARCHAR(20) NOT NULL,
    apellido_mat VARCHAR(20) NOT NULL,
    telefono VARCHAR(9) NOT NULL,
    contraseña VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_perfil) REFERENCES perfil(id_perfil)
);

CREATE TABLE ruta2 (
    id_ruta INT(3) NOT NULL PRIMARY KEY,
    fechaInicio DATETIME NOT NULL COMMENT 'Fecha Inicio',
    fechaFin DATETIME NOT NULL COMMENT 'Fecha de Finalización',
    id_zona INT(3) NOT NULL,
    id_grupo INT(3) NOT NULL,
    id_vehiculo INT(3) NOT NULL,
    id_er INT(3) NOT NULL
);

CREATE TABLE persona (
    id_persona INT(3) NOT NULL PRIMARY KEY,
    id_ep INT(3) NOT NULL,
    id_familia INT(3) NOT NULL,
    dni VARCHAR(8) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido_pat VARCHAR(20) NOT NULL,
    apellido_mat VARCHAR(20) NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    latitud INT(3) NOT NULL,
    longitud INT(3) NOT NULL,
    zona VARCHAR(25) NOT NULL,
    via CHAR(2) NOT NULL,
    nom_via VARCHAR(25) NOT NULL,
    id_via INT(3) NOT NULL,
    FOREIGN KEY (id_ep) REFERENCES estadoPersona(id_ep),
    FOREIGN KEY (id_familia) REFERENCES familia(id_familia),
    FOREIGN KEY (id_via) REFERENCES via(id_via)
);

CREATE TABLE entrega (
    id_entrega INT(3) NOT NULL PRIMARY KEY,
    id_ee INT(3) NOT NULL,
    id_familia INT(3) NOT NULL,
    cantC INT(3) NOT NULL,
    cantK INT(3) NOT NULL,
    comentario VARCHAR(200) NOT NULL,
    nombreImagen VARCHAR(200) NOT NULL,
    rutaImagen VARCHAR(200) NOT NULL,
    id_ruta INT(3) NOT NULL,
    FOREIGN KEY (id_ee) REFERENCES estadoEntrega(id_ee),
    FOREIGN KEY (id_familia) REFERENCES familia(id_familia),
    FOREIGN KEY (id_ruta) REFERENCES ruta(id_ruta)
);

CREATE TABLE grupoIntegrantes (
    id_grupo INT(3) NOT NULL,
    id_usuario INT(3) NOT NULL,
    PRIMARY KEY(id_grupo, id_usuario),
    FOREIGN KEY (id_grupo) REFERENCES grupo(id_grupo),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

DESC usuario;

CREATE TABLE detalle (
    id_detalle INT(3) NOT NULL,
    desc_detalle VARCHAR(30) NOT NULL
);

INSERT INTO detalle VALUES (0, '-');
INSERT INTO detalle VALUES (1, 'Leve');
INSERT INTO detalle VALUES (2, 'Moderado');
INSERT INTO detalle VALUES (3, 'Crítico');

INSERT INTO persona VALUES (2, 100, '25550289', 'Roberto','Navarro','García',41, 1,0);
INSERT INTO persona VALUES (3, 100, '25550419', 'Noelia','Reyes','Vilca',38, 1,0);
INSERT INTO persona VALUES (4, 101, '25550419', 'Noelia','Soto','Paredes',48, 2,1);
INSERT INTO persona VALUES (5, 101, '75532419', 'Valeria','Lopez','Soto',15, 2,1);
INSERT INTO persona VALUES (6, 101, '15432419', 'José','Lopez','Barriga',53, 3,2);


PARA PROCEDURE:

SELECT A.id_ruta, DATE_FORMAT(CONVERT(A.fechaInicio, DATE),'%d/%m/%Y') as fecha, CONVERT(A.fechaInicio,TIME) as hora, B.desc_grupo, C.placa, E.desc_zona, D.desc_estado_ruta FROM ruta2 A LEFT JOIN grupo B ON A.id_grupo = B.id_grupo LEFT JOIN vehiculo C ON A.id_vehiculo = C.id_vehiculo LEFT JOIN estadoRuta D ON A.id_er = D.id_er LEFT JOIN zona E ON A.id_zona = E.id_zona ORDER BY 1