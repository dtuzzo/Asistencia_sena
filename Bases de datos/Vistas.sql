USE asistenciasena;

/*------------------------*/

CREATE VIEW VISTA_APRENDIZ 
AS
SELECT
aprendiz.id_aprendiz, aprendiz.tipodocumento_aprendiz, aprendiz.numerodocumento_aprendiz, 
	aprendiz.nombre_aprendiz, aprendiz.apellido_aprendiz, aprendiz.celular_aprendiz, 
    aprendiz.correosena_aprendiz, aprendiz.correopersonal_aprendiz, ficha.numero_ficha, estado.nombre_estado
FROM APRENDIZ
INNER JOIN ficha
ON ficha.id_ficha = aprendiz.id_ficha_fk
INNER JOIN estado 
ON estado.id_estado = aprendiz.id_estado_fk;


CREATE VIEW VISTA_FUNCIONARIO
AS
SELECT
	funcionario.id_funcionario, funcionario.numerodocumento_funcionario, funcionario.nombre_funcionario, 
	funcionario.apellido_funcionario,funcionario.celular_funcionario, rol.nombre_rol, materia.nombre_materia
FROM funcionario
INNER JOIN rol
ON rol.id_rol = funcionario.id_rol_fk
INNER JOIN materia
ON materia.id_materia = funcionario.id_materia_fk;


/*-------------------------------------------------------*/

CREATE TRIGGER APRENDIZRE_AI AFTER INSERT ON aprendiz FOR EACH ROW 
INSERT INTO asistencia VALUES (NULL,NULL, NEW.nombre_aprendiz, NEW.apellido_aprendiz, NULL,NEW.id_aprendiz);

/*------------------------------------------*/

CREATE VIEW VISTA_ASISTENCIA
AS
SELECT
asistencia.id_asistencia, asistencia.fecha_registro, asistencia.tipo_asistencia,
	aprendiz.nombre_aprendiz, aprendiz.apellido_aprendiz, funcionario.nombre_funcionario
FROM ASISTENCIA
INNER JOIN aprendiz
ON aprendiz.id_aprendiz = asistencia.id_aprendiz_fk
INNER JOIN funcionario 
ON funcionario.id_funcionario = asistencia.id_funcionario_fk;
