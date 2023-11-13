INSERT INTO T_Categorias (ID, nombre)
VALUES (1, "Terror"),
	   (2, "Ciencia Ficción");
       
INSERT INTO T_Directores (ID, nombre)
VALUES (1, "Stanley Kubrick"),
	   (2, "Tomas Alfredson"),
       (3, "Ingmar Bergman"),
       (4, "Christopher Nolan"),
       (5, "James Cameron");
       
INSERT INTO T_Peliculas (ID, titulo, año, duracion, sinopsis, imagen, votos, id_categoria, id_director)
VALUES (1, "The Shining", 1980, 146, "Jack Torrance es un hombre que se muda con su familia a un hotel aislado que debe cuidar, con la esperanza de salir del bloqueo creativo de su escritura.", DEFAULT, 0, 1, 1),
	   (2, "Déjame entrar", 2008, 114, "Oskar, que es acosado en el colegio, conoce a su nueva vecina Eli, al mismo tiempo que se producen unas misteriosas muertes.", DEFAULT, 0, 1, 2),
       (3, "Persona", 1966, 85, "Obra maestra y uno de los filmes más fascinantes del séptimo arte que explora la simbiosis de las dos personalidades de una misma mujer.", DEFAULT, 0, 1, 3),
       (4, "Origen", 2010, 148, "Dom Cobb es un ladrón capaz de adentrarse en los sueños de la gente y hacerse con sus secretos.", DEFAULT, 0, 2, 4),
       (5, "Terminator 2: El juicio final", 1991, 137, "Algunos años antes, un viajero del tiempo le reveló a la madre de John que su hijo sería el salvador de la humanidad.", DEFAULT, 0, 2, 5),
       (6, "Avatar: El sentido del agua", 2022, 192, "Jake Sully y Ney'tiri han formado una familia y hacen todo lo posible por permanecer juntos.", DEFAULT, 0, 2, 5);
       
INSERT INTO T_Actores (ID, nombre)
VALUES (1, "Jack Nicholson"),
	   (2, "Shelley Duvall"),
       (3, "Kåre Hedebrant"),
       (4, "Lina Leandersson"),
       (5, "Bibi Andersson"),
       (6, "Liv Ullmann"),
       (7, "Leonardo DiCaprio"),
       (8, "Joseph Gordon-Levitt"),
       (9, "Arnold Schwarzenegger"),
       (10, "Linda Hamilton"),
       (11, "Sam Worthington"),
       (12, "Zoe Saldana");
       
INSERT INTO T_Actor_Pelicula (ID_pelicula, ID_actor)
VALUES (1, 1),
	   (1, 2),
       (2, 3),
       (2, 4),
       (3, 5),
       (3, 6),
       (4, 7),
       (4, 8),
       (5, 9),
       (5, 10),
       (6, 11),
       (6, 12);
       
UPDATE T_Peliculas SET votos = 10 WHERE ID = 1;
UPDATE T_Peliculas SET votos = 25 WHERE ID = 2;
UPDATE T_Peliculas SET votos = 13 WHERE ID = 3;
UPDATE T_Peliculas SET votos = 5 WHERE ID = 4;
UPDATE T_Peliculas SET votos = 2 WHERE ID = 5;
UPDATE T_Peliculas SET votos = 123 WHERE ID = 6;
       
SELECT * FROM T_Categorias;
SELECT * FROM T_Directores;
SELECT * FROM T_Peliculas;
SELECT * FROM T_Actores;
SELECT * FROM T_Actor_Pelicula;

/* CONSULTAS */

-- 1.Identificador y nombre de las categorías que tenemos.
-- ¿Que categorías tenemos?
-- Terror y Ciencia Ficción
SELECT * FROM T_Categorias;

-- 2. Queremos saber las películas de terror más votadas, para ello se pide:
-- Identificador, titulo, año, sinopsis, votos de la categoría de terror, en orden descendente por votos.
SELECT 
    *
FROM
    T_Peliculas
        LEFT JOIN 
    T_Categorias ON (id_director = T_Categorias.ID);
 
 -- 3. Añadir el nombre del director a la consulta numero 2.
 
 -- 4. Visualizar el director y reparto de una determinada película, 
 -- ejemplo la que tiene más votos del género de terror.
 
 -- 5. Id de la categoría y nombre de la categoría así como el promedio de
 -- duración de las películas de dicha categoría.
 
