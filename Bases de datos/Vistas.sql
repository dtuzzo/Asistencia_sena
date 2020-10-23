USE asistenciasena;

/*------------------------*/

CREATE VIEW VISTA_INASISTENCIAS
AS
SELECT numerodocumento_aprendiz, nombre_aprendiz, apellido_aprendiz, nombre_estado, correosena_aprendiz, celular_aprendiz, id_ficha_fk
FROM APRENDIZ
INNER JOIN ASISTENCIA
ON id_aprendiz = id_aprendiz_fk
INNER JOIN ESTADO
ON id_estado = id_estado_fk
WHERE tipo_asistencia = "Falla";

SELECT * FROM VISTA_INASISTENCIAS;

CREATE VIEW VISTA_APRENDIZ 
AS
SELECT
	id_aprendiz, tipodocumento_aprendiz, numerodocumento_aprendiz, nombre_aprendiz, apellido_aprendiz, celular_aprendiz, 
    correosena_aprendiz, correopersonal_aprendiz, numero_ficha, nombre_estado, id_ficha_fk
FROM APRENDIZ
INNER JOIN ficha
ON ficha.id_ficha = aprendiz.id_ficha_fk
INNER JOIN estado
ON estado.id_estado = aprendiz.id_estado_fk;

SELECT * FROM VISTA_APRENDIZ where id_ficha_fk = 1;
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

