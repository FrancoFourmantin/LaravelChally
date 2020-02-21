/*Estableciendo FKs*/

/*FK intereses*/
ALTER TABLE intereses 
ADD FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario);

ALTER TABLE intereses 
ADD FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria);

/*FK amistades*/
ALTER TABLE amistades
ADD FOREIGN KEY (id_usuario1) REFERENCES usuarios(id_usuario);

ALTER TABLE amistades
ADD FOREIGN KEY (id_usuario2) REFERENCES usuarios(id_usuario);

/*FK desafios*/
ALTER TABLE desafios
ADD FOREIGN KEY (id_respuesta_ganadora) REFERENCES respuestas(id_respuesta);

ALTER TABLE desafios 
ADD FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria);

ALTER TABLE desafios
ADD FOREIGN KEY (id_autor) REFERENCES usuarios(id_usuario);

/*FKs comentarios*/
ALTER TABLE comentarios 
ADD FOREIGN KEY (id_desafio) REFERENCES desafios(id_desafio);

ALTER TABLE comentarios 
ADD FOREIGN KEY (id_respuesta) REFERENCES respuestas(id_respuesta);

ALTER TABLE comentarios
ADD FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario);

/*FKs Likes*/
ALTER TABLE likes
ADD FOREIGN KEY (id_desafio) REFERENCES desafios(id_desafio);

ALTER TABLE likes 
ADD FOREIGN KEY (id_respuesta) REFERENCES respuestas(id_respuesta);

ALTER TABLE likes 
ADD FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario);

/*FKs Respuestas*/
ALTER TABLE respuestas 
ADD FOREIGN KEY (id_desafio) REFERENCES desafios(id_desafio);

ALTER TABLE respuestas
ADD FOREIGN KEY (id_autor) REFERENCES usuarios(id_usuario);

/*FKs Archivos*/
ALTER TABLE archivos
ADD FOREIGN KEY (id_respuesta) REFERENCES respuestas(id_respuesta);

/*FKs Desafios_destacados*/
ALTER TABLE desafios_destacados
ADD FOREIGN KEY (id_desafio) REFERENCES desafios(id_desafio);

ALTER TABLE desafios_destacados
ADD FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria);

