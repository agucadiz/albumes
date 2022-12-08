EXAMEN PRIMERA EVALUACIÓN (2021/22) 4-ABR-2021
Escribir una aplicación de gestión musical que permita al usuario gestionar la información de su discoteca musical.

Se pide:

(1 puntos) Crear la base de datos mediante migraciones con las siguientes tablas:

albumes (id, titulo, anyo)

artistas (id, nombre)

temas (id, titulo, anyo, duracion)

album_tema (album_id, tema_id)

artista_tema (artista_id, tema_id)

Indicación: la columna duración debe ser de tipo intervalo.

(1,5 puntos) Crear los modelos correspondientes y todas las relaciones adecuadas entre ellos, así como los CRUD de álbumes y temas.

(1,5 punto) Incorporar una regla de validación que impida en todo momento que un albúm pueda tener temas que no tengan ningún artista asociado.

(1,5 puntos) En la vista albumes/view/id, mostrar también los temas que componen cada álbum, indicando además (en el DetailView del álbum) la duración total del álbum, calculado como la suma de las duraciones de todos sus temas. Indicación: la suma la tiene que hacer el SGBD, no el PHP.

(1,5 puntos) En la vista temas/index, mostrar una columna con el número de artistas que tiene cada tema y otra con el número de álbumes en los que aparece cada tema, permitiendo filtrar y ordenar por dichas columnas.

(1,5 puntos) Crear la vista artistas/albumes/id, que muestre el nombre del artista identificado por su id y el nombre de todos los álbumes en los que ha participado ese artista.

(1,5 puntos) Impedir que se pueda borrar un artista si ha participado en algún tema que esté incorporado en algún álbum.

