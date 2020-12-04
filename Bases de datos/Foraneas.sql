USE asistenciasena;

ALTER TABLE funcionario ADD CONSTRAINT funcirolFK FOREIGN KEY (id_rol_fk) REFERENCES rol(id_rol);

ALTER TABLE ficha ADD CONSTRAINT fichamateFK FOREIGN KEY (id_materia_fk) REFERENCES materia(id_materia);

ALTER TABLE detalle_materia_funcionario ADD CONSTRAINT detallemateriaFK FOREIGN KEY (id_materia_fk) REFERENCES materia(id_materia);
ALTER TABLE detalle_materia_funcionario ADD CONSTRAINT detallefuncionarioFK FOREIGN KEY (id_funcionario_fk) REFERENCES funcionario(id_funcionario);

ALTER TABLE detalle_ficha_funcionario ADD CONSTRAINT detallefichaFK FOREIGN KEY (id_ficha_fk) REFERENCES ficha(id_ficha);
ALTER TABLE detalle_ficha_funcionario ADD CONSTRAINT detallefuncionario_F_FK FOREIGN KEY (id_funcionario_fk) REFERENCES funcionario(id_funcionario);

ALTER TABLE materia ADD CONSTRAINT mateprograFK FOREIGN KEY (id_programa_fk) REFERENCES programa(id_programa);

ALTER TABLE aprendiz ADD CONSTRAINT aprestadoFK FOREIGN KEY (id_estado_fk) REFERENCES estado(id_estado);
ALTER TABLE aprendiz ADD CONSTRAINT aprefichaFK FOREIGN KEY (id_ficha_fk) REFERENCES ficha(id_ficha);

ALTER TABLE asistencia ADD CONSTRAINT asisapreFK FOREIGN KEY (id_aprendiz_fk) REFERENCES aprendiz(id_aprendiz);
ALTER TABLE asistencia ADD CONSTRAINT asisfunciFK FOREIGN KEY (id_funcionario_fk) REFERENCES funcionario(id_funcionario);
ALTER TABLE asistencia ADD CONSTRAINT asismateFK FOREIGN KEY (id_materia_fk) REFERENCES id_materia(materia);
ALTER TABLE asistencia ADD CONSTRAINT asisfichaFK FOREIGN KEY (id_ficha_fk) REFERENCES id_ficha(ficha);