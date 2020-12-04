USE asistenciasena;

INSERT INTO rol VALUES(1,'Instructor');
INSERT INTO rol VALUES(2,'Coordinador');

INSERT INTO programa VALUES(1,'ADSI');

-- Cambiado el día 22/10/2020
INSERT INTO materia VALUES(1,'PHP','V',1);
INSERT INTO materia VALUES(2,'JavaScript','V',1);
INSERT INTO materia VALUES(3,'Calidad','V',1);
INSERT INTO materia VALUES(4,'Java','V',1);
INSERT INTO materia VALUES(5,'Base de datos','V',1);
INSERT INTO materia VALUES(6,'Migracion y Testing','V',1);
INSERT INTO materia VALUES(7,'Seguimiento de proyecto','V',1);
INSERT INTO materia VALUES(8,'Procesos de negociacion','V',1);
INSERT INTO materia VALUES(9,'Ingles','V',1);
INSERT INTO materia VALUES(10,'Cultura fisica','V',1);
INSERT INTO materia VALUES(11,'Diseño','V',1);
INSERT INTO materia VALUES(12,'Proyeccion social','V',1);
INSERT INTO materia VALUES(13,'No aplica','V',1);

-- Cambiado el día 22/10/2020

INSERT INTO funcionario VALUES(null,123456789,'Gustavo','Beltran',3134321234,'gubelma@misena.edu.co',123,2)

INSERT INTO ficha VALUES(1,2056293,curdate(),'2021/06/16',1);

INSERT INTO estado VALUES(1,'Activo');
INSERT INTO estado VALUES(2,'Desertado');

INSERT INTO aprendiz VALUES(null,'CC',16800233,'Nomis','Zemenez','0987654321','misena@misena.edu.co','personal@personal.com',1,1);
INSERT INTO aprendiz VALUES(null,'TI',75448233,'Daniel','Tuzzo','123456789','misena@misena.edu.co','personal@personal.com',1,1);

INSERT INTO asistencia VALUES(1,'2019/12/12','Retardo',1,1);

-- Cambiado el día 22/10/2020
INSERT INTO detalle_materia_funcionario VALUES(null,1,1);

ALTER TABLE funcionario ADD UNIQUE INDEX (numerodocumento_funcionario);
ALTER TABLE funcionario ADD UNIQUE INDEX (celular_funcionario);
ALTER TABLE nombre_tabla DROP INDEX nombre_indice;