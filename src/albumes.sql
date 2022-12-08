DROP TABLE IF EXISTS albumes CASCADE;

CREATE TABLE albumes (
    id          bigserial     PRIMARY KEY,
    titulo      varchar(255)  NOT NULL,
    anyo        numeric(4)    NOT NULL
);

DROP TABLE IF EXISTS artista CASCADE;

CREATE TABLE artista (
    id          bigserial     PRIMARY KEY,
    nombre      varchar(255)  NOT NULL
);

DROP TABLE IF EXISTS temas CASCADE;

CREATE TABLE temas (
    id          bigserial     PRIMARY KEY,
    titulo      varchar(255)  NOT NULL,
    anyo        numeric(4)    NOT NULL,
    duracion    interval      NOT NULL
);

DROP TABLE IF EXISTS album_tema CASCADE;

CREATE TABLE album_tema (
    album_id    bigint        NOT NULL REFERENCES albumes (id),
    tema_id     bigint        NOT NULL REFERENCES temas (id),
    PRIMARY KEY (album_id, tema_id)
);

DROP TABLE IF EXISTS artista_tema CASCADE;

CREATE TABLE artista_tema (
    artista_id  bigint        NOT NULL REFERENCES artista (id),
    tema_id     bigint        NOT NULL REFERENCES temas (id),
    PRIMARY KEY (artista_id, tema_id)
);

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios (
    id       bigserial    PRIMARY KEY,
    usuario  varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL
);


-- Carga inicial de datos de prueba:
 INSERT INTO albumes (titulo, anyo)
 VALUES ('Más', '1990'),
        ('Palabra de mujer', '1995'),
        ('Estrella de mar', '2000');

 INSERT INTO artista (nombre)
 VALUES ('Alejandro Sanz'),
        ('Monica Naranjo'),
        ('Amaral');

INSERT INTO temas (titulo, anyo, duracion)
VALUES ('Pisando fuerte', '1990', '00:03:00'),
       ('Sobreviviré', '1995', '00:02:30'),
       ('Te necesito', '2000', '00:04:00');

INSERT INTO album_tema (album_id, tema_id)
VALUES ('1', '1'),
       ('2', '2'),
       ('3', '3');

INSERT INTO artista_tema (artista_id, tema_id)
VALUES ('1', '1'),
       ('2', '2'),
       ('3', '3');

INSERT INTO usuarios (usuario, password)
    VALUES ('admin', crypt('admin', gen_salt('bf', 10))),
           ('pepe', crypt('pepe', gen_salt('bf', 10)));


