USE asistenciasena;

INSERT INTO rol VALUES(1,'Instructor');
INSERT INTO rol VALUES(2,'Coordinador');

INSERT INTO programa VALUES(1,'ADSI');

INSERT INTO materia VALUES(1,'PHP','V',1);

INSERT INTO funcionario VALUES(1,123456789,'Ejemplo','Prueba','0987654321','Miau',1);

INSERT INTO ficha VALUES(1,2056293,curdate(),'2021/06/16',1);

INSERT INTO estado VALUES(1,'Activo');
INSERT INTO estado VALUES(2,'Desertado');

INSERT INTO aprendiz VALUES(null,'CC',16800233,'Nomis','Zemenez','0987654321','misena@misena.edu.co','personal@personal.com',1,1);
INSERT INTO aprendiz VALUES(null,'TI',75448233,'Daniel','Tuzzo','123456789','misena@misena.edu.co','personal@personal.com',1,1);

INSERT INTO asistencia VALUES(1,'2019/12/12','Retardo',1,1);