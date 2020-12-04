CREATE DATABASE asistenciasena;
USE asistenciasena;

CREATE TABLE rol(
id_rol INT PRIMARY KEY auto_increment,
nombre_rol VARCHAR(30) NOT NULL
);

CREATE TABLE programa(
id_programa INT PRIMARY KEY auto_increment,
nombre_programa VARCHAR(30) NOT NULL
);

CREATE TABLE materia(
id_materia INT PRIMARY KEY auto_increment,
nombre_materia VARCHAR(30) NOT NULL,
trimestre_materia VARCHAR(5) NOT NULL,
id_programa_fk INT NOT NULL
);

CREATE TABLE detalle_materia_funcionario(
id_detalle INT PRIMARY KEY auto_increment,
id_materia_fk INT NOT NULL,
id_funcionario_fk INT NOT NULL
);

CREATE TABLE detalle_ficha_funcionario( 
id_detalle INT PRIMARY KEY auto_increment, 
id_ficha_fk INT NOT NULL, 
id_funcionario_fk INT NOT NULL 
);

CREATE TABLE funcionario(
id_funcionario INT PRIMARY KEY auto_increment,
numerodocumento_funcionario INT NOT NULL,
nombre_funcionario VARCHAR(30) NOT NULL,
apellido_funcionario VARCHAR(30) NOT NULL,
celular_funcionario VARCHAR(20) NOT NULL,
clave_funcionario VARCHAR(30) NOT NULL,
id_rol_fk INT NOT NULL
);

CREATE TABLE estado(
id_estado INT PRIMARY KEY auto_increment,
nombre_estado VARCHAR(30) NOT NULL
);

CREATE TABLE ficha(
id_ficha INT PRIMARY KEY auto_increment,
numero_ficha INT NOT NULL,
fecha_inicio DATE NOT NULL,
fecha_fin DATE NOT NULL,
id_materia_fk INT NOT NULL
);

CREATE TABLE aprendiz(
id_aprendiz INT PRIMARY KEY auto_increment not null,
tipodocumento_aprendiz VARCHAR(5) NOT NULL,
numerodocumento_aprendiz BIGINT(15) NOT NULL,
nombre_aprendiz VARCHAR(30) NOT NULL,
apellido_aprendiz VARCHAR(30) NOT NULL,
celular_aprendiz VARCHAR(20) NOT NULL,
correosena_aprendiz VARCHAR(40) NOT NULL,
correopersonal_aprendiz VARCHAR(40) NOT NULL,
id_estado_fk INT NOT NULL,
id_ficha_fk INT NOT NULL,
id_materia_fk INT NOT NULL,
id_ficha_fk INT NOT NULL
);


CREATE TABLE asistencia(
id_asistencia INT PRIMARY KEY auto_increment,
fecha_registro DATETIME NOT NULL,
tipo_asistencia VARCHAR(15),
id_aprendiz_fk INT NOT NULL,
id_funcionario_fk INT NOT NULL
);