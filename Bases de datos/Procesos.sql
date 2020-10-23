USE asistenciasena;

-- Cambiado el día 22/10/2020
DELIMITER $$
CREATE PROCEDURE ACTUALIZAR_APRENDIZ
(
IN tipodocumento_aprendiz_U VARCHAR(20), 
IN numerodocumento_aprendiz_U INT, 
IN nombre_aprendiz_U VARCHAR(30),
IN apellido_aprendiz_U VARCHAR(30), 
IN celular_aprendiz_U BIGINT(20), 
IN correosena_aprendiz_U VARCHAR(40),
IN correopersonal_aprendiz_U VARCHAR(40), 
IN id_aprendiz_U INT, 
IN id_estado_fk_U INT, 
IN id_ficha_fk_U INT
)
BEGIN
UPDATE aprendiz SET
tipodocumento_aprendiz = tipodocumento_aprendiz_U,
numerodocumento_aprendiz = numerodocumento_aprendiz_U,
nombre_aprendiz = nombre_aprendiz_U,
apellido_aprendiz = apellido_aprendiz_U,
celular_aprendiz = celular_aprendiz_U,
correosena_aprendiz = correosena_aprendiz_U,
correopersonal_aprendiz = correopersonal_aprendiz_U,
id_estado_fk = id_estado_fk_U,
id_ficha_fk = id_ficha_fk_U
WHERE id_aprendiz = id_aprendiz_U;
END$$
DELIMITER ;

-- Cambiado el día 22/10/2020
DELIMITER $$
CREATE OR REPLACE PROCEDURE INSERTAR_APRENDIZ
(
IN tipodocumento_aprendiz VARCHAR(5), 
IN numerodocumento_aprendiz BIGINT(15), 
IN nombre_aprendiz VARCHAR(30),
IN apellido_aprendiz VARCHAR(30), 
IN celular_aprendiz VARCHAR(20), 
IN correosena_aprendiz VARCHAR(40),
IN correopersonal_aprendiz VARCHAR(40),
IN id_estado_fk INT,
IN id_ficha_fk INT
)
BEGIN 
INSERT INTO aprendiz (tipodocumento_aprendiz, numerodocumento_aprendiz, nombre_aprendiz, apellido_aprendiz, celular_aprendiz, correosena_aprendiz, correopersonal_aprendiz, id_estado_fk, id_ficha_fk)
VALUES (tipodocumento_aprendiz, numerodocumento_aprendiz, nombre_aprendiz, apellido_aprendiz, celular_aprendiz, correosena_aprendiz, correopersonal_aprendiz, id_estado_fk, id_ficha_fk);
END$$
DELIMITER ;

--CALL INSERTAR_APRENDIZ ('xd', 1031, 'Julian', 'Es puto', '3216', 'misena@msiena.co', 'person@pero.c', 1, 1);

-- Cambiado el día 22/10/2020
DELIMITER $$
CREATE OR REPLACE PROCEDURE ObtenerRegistrosAprendiz(IN id_aprendiz_O INT)
BEGIN
SELECT
aprendiz.id_aprendiz, aprendiz.tipodocumento_aprendiz, aprendiz.numerodocumento_aprendiz, 
aprendiz.nombre_aprendiz, aprendiz.apellido_aprendiz, aprendiz.celular_aprendiz, 
aprendiz.correosena_aprendiz, aprendiz.correopersonal_aprendiz, estado.nombre_estado, ficha.numero_ficha
FROM APRENDIZ

INNER JOIN ficha
ON ficha.id_ficha = aprendiz.id_ficha_fk

INNER JOIN estado 
ON estado.id_estado = aprendiz.id_estado_fk

WHERE id_aprendiz = id_aprendiz_O;
END$$
DELIMITER ;

/*----------------------------------------------------------------------------------*/

-- Cambiado el día 22/10/2020
DELIMITER $$
CREATE OR REPLACE PROCEDURE ACTUALIZAR_FUNCIONARIO 
(
IN numerodocumento_funcionario_U INT, 
IN nombre_funcionario_U VARCHAR(30), 
IN apellido_funcionario_U VARCHAR(30), 
IN celular_funcionario_U VARCHAR(20), 
IN id_rol_fk_U INT,
IN id_funcionario_U INT
)
BEGIN
UPDATE funcionario SET  
numerodocumento_funcionario =  numerodocumento_funcionario_U,
nombre_funcionario = nombre_funcionario_U,
apellido_funcionario = apellido_funcionario_U,
celular_funcionario = celular_funcionario_U,
id_rol_fk = id_rol_fk_U

WHERE id_funcionario = id_funcionario_U;

END$$
DELIMITER ;
-- CALL ACTUALIZAR_FUNCIONARIO (1001191862, 'Julian', 'Ramirez', 123456789, 1, 1);

DELIMITER $$
CREATE PROCEDURE ELIMINAR_FUNCIONARIO 
(IN id_funcionario_D INT)
BEGIN
DELETE FROM funcionario WHERE id_funcionario = id_funcionario_D;
END$$
DELIMITER ;

-- Cambiado el día 22/10/2020
-- Hacer un trigger que cuando se inserte un funcionario, inserte un regitro en la tabla de muchos a muchos
DELIMITER $$
CREATE OR REPLACE PROCEDURE INSERTAR_FUNCIONARIO 
(
IN numerodocumento_funcionario INT, 
IN nombre_funcionario VARCHAR(30), 
IN apellido_funcionario VARCHAR(30), 
IN celular_funcionario VARCHAR(20), 
IN clave_funcionario VARCHAR(30), 
IN id_rol_fk INT
)
BEGIN
INSERT INTO funcionario (numerodocumento_funcionario, nombre_funcionario, apellido_funcionario, celular_funcionario, clave_funcionario, id_rol_fk)
VALUES (numerodocumento_funcionario, nombre_funcionario, apellido_funcionario, celular_funcionario, clave_funcionario, id_rol_fk);
END$$
DELIMITER ;

-- Cambiado el día 22/10/2020
DELIMITER $$
CREATE OR REPLACE PROCEDURE ObtenerRegistrosFuncionario (IN id_funcionario_O INT)
BEGIN
SELECT
funcionario.id_funcionario, funcionario.numerodocumento_funcionario, funcionario.nombre_funcionario, 
funcionario.apellido_funcionario,funcionario.celular_funcionario, rol.id_rol
FROM funcionario
INNER JOIN rol
ON rol.id_rol = funcionario.id_rol_fk
INNER JOIN detalle_materia_funcionario
ON detalle_materia_funcionario.id_funcionario_fk = funcionario.id_funcionario
WHERE id_funcionario = id_funcionario_O;
END$$
DELIMITER ;


/*------------------------------------------------------------------------------------*/


DELIMITER $$
CREATE PROCEDURE ACTUALIZAR_ASISTENCIA 
(IN tipo_asistencia_U VARCHAR(15), IN id_asistencia_U INT)
BEGIN
UPDATE asistencia SET
	fecha_registro = CURDATE(),
	tipo_asistencia = tipo_asistencia_U
WHERE id_asistencia = id_asistencia_U;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE INSERTAR_ASISTENCIA
(IN tipo_asistencia VARCHAR(15))
BEGIN
INSERT INTO asistencia (fecha_registro, tipo_asistencia)
VALUES (fecha_registro = CURDATE(), tipo_asistencia);
END$$
DELIMITER ;

/*-----------------------------------*/

DELIMITER $$
CREATE PROCEDURE ObtenerRegistrosAsistencia (IN id_asistencia_O INT)  BEGIN
SELECT * FROM asistencia WHERE id_asistencia = id_asistencia_O;
END$$
DELIMITER ;

-- Comentario para subir archivos

























