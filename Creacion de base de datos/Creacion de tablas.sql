/*Creacion de tablas*/

CREATE TABLE IF NOT EXISTS usuarios (
	id_usuario INTEGER PRIMARY KEY AUTO_INCREMENT,
    fecha_nacimiento DATE NOT NULL,
    sexo CHAR(1),
    nombre VARCHAR(40) NOT NULL,
    apellido VARCHAR(40),
    contrasena VARCHAR(40) NOT NULL,
    username VARCHAR(40),
    mail VARCHAR(60) NOT NULL
);

CREATE TABLE IF NOT EXISTS desafios(
	id_desafio INTEGER PRIMARY KEY AUTO_INCREMENT,
    fecha_creacion DATE,
    fecha_limite DATE,
    imagen VARCHAR(40),
    descripcion TEXT,
    id_respuesta_ganadora INTEGER,
    id_categoria INTEGER,
    id_autor INTEGER,
    dificultad TINYINT,
    requisitos TEXT
);

CREATE TABLE IF NOT EXISTS comentarios(
	id_comentario INTEGER PRIMARY KEY AUTO_INCREMENT,
    fecha DATE,
    id_desafio INTEGER,
    id_respuesta INTEGER,
    id_usuario INTEGER
);

CREATE TABLE IF NOT EXISTS likes(
	id_like INTEGER PRIMARY KEY AUTO_INCREMENT,
    fecha DATE,
	id_desafio INTEGER,
    id_respuesta INTEGER,
    id_usuario INTEGER
);

CREATE TABLE IF NOT EXISTS respuestas(
	id_respuesta INTEGER PRIMARY KEY AUTO_INCREMENT,
    fecha DATE,
    descripcion TEXT,
    id_desafio INTEGER,
    id_autor INTEGER
);

CREATE TABLE IF NOT EXISTS archivos(
	id_archivo INTEGER PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60),
    id_respuesta INTEGER
);

CREATE TABLE IF NOT EXISTS intereses(
	id_interes INTEGER PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40),
    id_usuario INTEGER,
    id_categoria INTEGER
);

CREATE TABLE IF NOT EXISTS amistades(
	id_amistad INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_usuario1 INTEGER,
    id_usuario2 INTEGER,
    fecha_amistad DATE
);

CREATE TABLE IF NOT EXISTS categorias(
	id_categoria INTEGER PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40),
    descripcion TEXT
);

CREATE TABLE IF NOT EXISTS desafios_destacados(
	id_desafio_destacado INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_desafio INTEGER,
    id_categoria INTEGER,
    fecha DATE
);