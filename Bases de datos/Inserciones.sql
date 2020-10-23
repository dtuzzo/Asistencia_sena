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

-- Cambiado el día 22/10/2020
INSERT INTO funcionario VALUES(null,111111111,'Julian Ricardo','Urrea Mantilla','4455332211','Miau',1);
INSERT INTO funcionario VALUES(null,222222222,'Jesus','Ropero Barbosa','5566778899','Hola123',1);
INSERT INTO funcionario VALUES(null,333333333,'Amparo','Rueda Jaimes','1122334455','Clave456',1);
INSERT INTO funcionario VALUES(null,444444444,'Erick','Granados Torres','9999999999','ETESECH',1);
INSERT INTO funcionario VALUES(null,555555555,'Sandra Yanneth','Rueda Guevara','8888888888','123456789',1);
INSERT INTO funcionario VALUES(null,666666666,'Jose Fernando','Galindo Suarez','7777777777','fegasu',1);
INSERT INTO funcionario VALUES(null,777777777,'Carolina','Forero Sanchez','6666666666','Miau123',1);
INSERT INTO funcionario VALUES(null,888888888,'Jorge Enrique','Portella Cleves','5555555555','Holis4567',1);
INSERT INTO funcionario VALUES(null,999999999,'Sandra Liliana','Rodriguez Tellez','4444444444','Juniortupapa',1);
INSERT INTO funcionario VALUES(null,998877665,'Luis Hernando','Baquero Ramirez','3333333333','claveclave123',1);
INSERT INTO funcionario VALUES(null,554433221,'Adriana','Duarte','2222222222','Colombia12345',1);
INSERT INTO funcionario VALUES(null,113355779,'Carmen','Rocio','1111111111','solyluna123',1);

INSERT INTO ficha VALUES(1,2056293,curdate(),'2021/06/16',1);

INSERT INTO estado VALUES(1,'Activo');
INSERT INTO estado VALUES(2,'Desertado');

INSERT INTO aprendiz VALUES(null,'CC',16800233,'Nomis','Zemenez','0987654321','misena@misena.edu.co','personal@personal.com',1,1);
INSERT INTO aprendiz VALUES(null,'TI',75448233,'Daniel','Tuzzo','123456789','misena@misena.edu.co','personal@personal.com',1,1);

INSERT INTO asistencia VALUES(1,'2019/12/12','Retardo',1,1);

-- Cambiado el día 22/10/2020
INSERT INTO detalle_materia_funcionario VALUES(null,1,1);
INSERT INTO detalle_materia_funcionario VALUES(null,2,2);
INSERT INTO detalle_materia_funcionario VALUES(null,3,3);
INSERT INTO detalle_materia_funcionario VALUES(null,4,4);
INSERT INTO detalle_materia_funcionario VALUES(null,5,5);
INSERT INTO detalle_materia_funcionario VALUES(null,6,6);
INSERT INTO detalle_materia_funcionario VALUES(null,7,7);
INSERT INTO detalle_materia_funcionario VALUES(null,8,8);
INSERT INTO detalle_materia_funcionario VALUES(null,9,9);
INSERT INTO detalle_materia_funcionario VALUES(null,10,10);
INSERT INTO detalle_materia_funcionario VALUES(null,11,11);
INSERT INTO detalle_materia_funcionario VALUES(null,12,12);
INSERT INTO detalle_materia_funcionario VALUES(null,13,13);