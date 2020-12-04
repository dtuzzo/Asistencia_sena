USE asistenciasena;

-- ********************************************************************************************
-- Creado el día 19/11/2020

CREATE OR REPLACE VIEW vista_inasistencias_aa 
AS 
SELECT F.numero_ficha, AP.nombre_aprendiz, AP.apellido_aprendiz, COUNT(A.tipo_asistencia), F.id_ficha, AP.correosena_aprendiz
FROM APRENDIZ AS AP 
INNER JOIN ASISTENCIA AS A 
ON AP.id_aprendiz = A.id_aprendiz_fk 
INNER JOIN FICHA as F
ON F.id_ficha = A.id_ficha_fk 
WHERE A.tipo_asistencia = "Falla"
GROUP BY AP.nombre_aprendiz, AP.apellido_aprendiz
HAVING COUNT(A.tipo_asistencia) >= 3

-- ********************************************************************************************

-- ********************************************************************************************
-- Creado el día 28/10/2020
CREATE OR REPLACE VIEW vista_materias 
AS 
SELECT 
	d.id_funcionario_fk, d.id_materia_fk, m.nombre_materia 
FROM detalle_materia_funcionario as d 
INNER JOIN materia as m 
ON d.id_materia_fk = m.id_materia;

CREATE OR REPLACE VIEW vista_fichas_funcionario 
AS 
SELECT 
	d.id_funcionario_fk, d.id_ficha_fk, f.numero_ficha 
FROM detalle_ficha_funcionario as d 
INNER JOIN ficha as f 
ON d.id_ficha_fk = f.id_ficha;

CREATE OR REPLACE VIEW VISTA_ASISTENCIA 
AS 
SELECT 
	A.id_asistencia, AP.nombre_aprendiz, AP.apellido_aprendiz, A.fecha_registro, 
	F.nombre_funcionario, F.apellido_funcionario, M.nombre_materia, IFNULL(A.tipo_asistencia, 'Sin registrar') AS tipo_asistencia, 
	A.id_funcionario_fk, A.id_ficha_fk 
FROM APRENDIZ AS AP 
INNER JOIN ASISTENCIA AS A 
ON AP.id_aprendiz = A.id_aprendiz_fk 
INNER JOIN funcionario as F
ON F.id_funcionario = A.id_funcionario_fk 
INNER JOIN MATERIA AS M 
ON M.id_materia = A.id_materia_fk

-- ********************************************************************************************

-- ********************************************************************************************
-- Cambiado el día 22/10/2020
CREATE OR REPLACE VIEW VISTA_APRENDIZ 
AS
SELECT
aprendiz.id_aprendiz, aprendiz.tipodocumento_aprendiz, aprendiz.numerodocumento_aprendiz, 
	aprendiz.nombre_aprendiz, aprendiz.apellido_aprendiz, aprendiz.celular_aprendiz, 
    aprendiz.correosena_aprendiz, aprendiz.correopersonal_aprendiz, estado.nombre_estado,ficha.numero_ficha
FROM APRENDIZ
INNER JOIN ficha
ON ficha.id_ficha = aprendiz.id_ficha_fk
INNER JOIN estado 
ON estado.id_estado = aprendiz.id_estado_fk;
-- ********************************************************************************************

-- ********************************************************************************************
CREATE OR REPLACE VIEW VISTA_APRENDIZ2
AS
SELECT
	id_aprendiz, tipodocumento_aprendiz, numerodocumento_aprendiz, nombre_aprendiz, apellido_aprendiz, celular_aprendiz, 
    correosena_aprendiz, correopersonal_aprendiz, numero_ficha, nombre_estado, id_ficha_fk
FROM APRENDIZ
INNER JOIN ficha
ON ficha.id_ficha = aprendiz.id_ficha_fk
INNER JOIN estado
ON estado.id_estado = aprendiz.id_estado_fk;
-- ********************************************************************************************

-- ********************************************************************************************
-- Cambiado el día 29/10/2020
CREATE OR REPLACE VIEW VISTA_FUNCIONARIO
AS
SELECT
funcionario.id_funcionario, funcionario.numerodocumento_funcionario, funcionario.nombre_funcionario, 
funcionario.apellido_funcionario,funcionario.celular_funcionario,funcionario.correo_funcionario,rol.nombre_rol, materia.nombre_materia
FROM funcionario
INNER JOIN rol
ON rol.id_rol = funcionario.id_rol_fk
INNER JOIN detalle_materia_funcionario
ON detalle_materia_funcionario.id_funcionario_fk = funcionario.id_funcionario
INNER JOIN materia
ON materia.id_materia = detalle_materia_funcionario.id_materia_fk;

-- ********************************************************************************************

DELIMITER $$
CREATE OR REPLACE PROCEDURE ObtenerRegistrosAsistencia(IN id_asistencia_O INT)
BEGIN
SELECT
asistencia.id_asistencia 
FROM asistencia 

WHERE id_asistencia = id_asistencia_O;
END$$
DELIMITER ;

-- *************************************************************************************************
CREATE OR REPLACE VIEW VISTA_INASISTENCIA
AS 
SELECT 
A.id_asistencia, AP.numerodocumento_aprendiz, AP.nombre_aprendiz, AP.apellido_aprendiz, A.fecha_registro, E.nombre_estado, AP.celular_aprendiz, A.id_ficha_fk, A.tipo_asistencia 
FROM ASISTENCIA AS A
INNER JOIN APRENDIZ AS AP 
ON AP.id_aprendiz = A.id_aprendiz_fk 
INNER JOIN ESTADO AS E 
ON E.id_estado = AP.id_estado_fk;