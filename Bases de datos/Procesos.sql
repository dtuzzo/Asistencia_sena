USE asistenciasena;


DELIMITER $$
CREATE PROCEDURE ACTUALIZAR_APRENDIZ
(IN tipodocumento_aprendiz_U VARCHAR(20), IN numerodocumento_aprendiz_U INT, IN nombre_aprendiz_U VARCHAR(30),
	IN apellido_aprendiz_U VARCHAR(30), IN celular_aprendiz_U BIGINT(20), IN correosena_aprendiz_U VARCHAR(40),
	IN correopersonal_aprendiz_U VARCHAR(40), IN id_aprendiz_U INT, IN id_estado_fk_U INT, IN id_ficha_fk_U INT)
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

DELIMITER $$
CREATE PROCEDURE INSERTAR_APRENDIZ
(IN tipodocumento_aprendiz VARCHAR(5), IN numerodocumento_aprendiz BIGINT(15), IN nombre_aprendiz VARCHAR(30),
	IN apellido_aprendiz VARCHAR(30), IN celular_aprendiz VARCHAR(20), IN correosena_aprendiz VARCHAR(40),
	IN correopersonal_aprendiz VARCHAR(40), IN id_estado_fk INT, IN id_ficha_fk INT)
BEGIN 
INSERT INTO aprendiz (id_aprendiz, tipodocumento_aprendiz, numerodocumento_aprendiz, nombre_aprendiz, apellido_aprendiz, celular_aprendiz, correosena_aprendiz, correopersonal_aprendiz, id_estado_fk, id_ficha_fk)
VALUES (null, tipodocumento_aprendiz, numerodocumento_aprendiz, nombre_aprendiz, apellido_aprendiz, celular_aprendiz, correosena_aprendiz, correopersonal_aprendiz, id_estado_fk, id_ficha_fk);
END$$
DELIMITER ;

CALL INSERTAR_APRENDIZ ('xd', 1031, 'Julian', 'Es puto', '3216', 'misena@msiena.co', 'person@pero.c', 1, 1);

DELIMITER $$
CREATE PROCEDURE ObtenerRegistrosAprendiz(IN id_aprendiz_O INT)
BEGIN
SELECT*FROM aprendiz WHERE id_aprendiz = id_aprendiz_O;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE ELIMINAR_APRENDIZ
(IN id_aprendiz_D INT)
BEGIN
DELETE FROM aprendiz WHERE id_aprendiz = id_aprendiz_D;
END$$
DELIMITER ;

/*----------------------------------------------------------------------------------*/

DELIMITER $$
CREATE PROCEDURE ACTUALIZAR_FUNCIONARIO 
(IN numerodocumento_funcionario_U INT, IN nombre_funcionario_U VARCHAR(30), IN apellido_funcionario_U VARCHAR(30), 
	IN celular_funcionario_U VARCHAR(20), IN clave_funcionario_U VARCHAR(30), IN id_rol_fk_U INT, 
    IN id_materia_fk_U INT, IN id_funcionario_U INT)
BEGIN
UPDATE funcionario SET  
numerodocumento_funcionario =  numerodocumento_funcionario_U,
nombre_funcionario = nombre_funcionario_U,
apellido_funcionario = apellido_funcionario_U,
celular_funcionario = celular_funcionario_U,
clave_funcionario =  clave_funcionario_U,
id_rol_fk = id_rol_fk_U,
id_materia_fk = id_materia_fk_U
WHERE id_funcionario = id_funcionario_U;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE ELIMINAR_FUNCIONARIO 
(IN id_funcionario_D INT)
BEGIN
DELETE FROM funcionario WHERE id_funcionario = id_funcionario_D;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE INSERTAR_FUNCIONARIO 
(IN numerodocumento_funcionario INT, IN nombre_funcionario VARCHAR(30), 
	IN apellido_funcionario VARCHAR(30), IN celular_funcionario VARCHAR(20), IN clave_funcionario VARCHAR(30), 
	IN id_rol_fk INT, IN id_materia_fk INT)
BEGIN
INSERT INTO funcionario (numerodocumento_funcionario, nombre_funcionario, apellido_funcionario, celular_funcionario, clave_funcionario, id_rol_fk, id_materia_fk)
VALUES (numerodocumento_funcionario, nombre_funcionario, apellido_funcionario, celular_funcionario, clave_funcionario, id_rol_fk, id_materia_fk);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE ObtenerRegistrosFuncionario (IN id_funcionario_O INT)
BEGIN
SELECT*FROM funcionario WHERE id_funcionario = id_funcionario_O;
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


























