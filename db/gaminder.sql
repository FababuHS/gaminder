DROP DATABASE IF EXISTS gaminder;
CREATE DATABASE gaminder CHARACTER SET utf8mb4;
USE gaminder;

CREATE TABLE juego (
	id_juego INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_juego VARCHAR(80) UNIQUE NOT NULL,
    editor VARCHAR(50) NOT NULL
);

INSERT INTO juego VALUES (1, 'League of Legends', 'Riot Games');
INSERT INTO juego VALUES (2, 'Valorant', 'Riot Games');
INSERT INTO juego VALUES (3, 'Overwatch', 'Blizzard Activision');

CREATE TABLE jugador (
	id_jugador INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(40) NOT NULL,
    pass VARCHAR(255) NOT NULL,    
    nombre_jugador VARCHAR(40) NOT NULL,    
    apellido1 VARCHAR(40) NOT NULL,
    apellido2 VARCHAR(40),
    email VARCHAR(60) NOT NULL,
    idioma SET('SPA','ENG','FRA','DEU','ITA') NOT NULL,
    cumple DATE NOT NULL,
    discord VARCHAR(40) NOT NULL,
    premium BOOLEAN,
    gmadmin BOOLEAN    
);

INSERT INTO jugador VALUES (1, 'OpPanda', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Alvaro', 'Fababu', 'Lopez', 'afablop555@g.educaand.es', 'SPA,ENG',
	'1991-06-22', 'Fababu#3223', true, true);
INSERT INTO jugador VALUES (2, 'Roski', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Pablo', 'Ros', 'Ortega', 'roski@gmail.com', 'SPA,ENG,DEU',
	'1991-05-30', 'Roski#1234', true, true);
INSERT INTO jugador VALUES (3, 'Moh4ever', 'ed2b1f468c5f915f3f1cf75d7068baae', 'David', 'Escoriza', 'Martinez', 'descmar111@g.educaand.es', 'SPA',
	'1989-10-20', 'Davidole#5555', true, false); 
    
CREATE TABLE rol (
	id_rol INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(30) NOT NULL,
    juego_rol INT UNSIGNED NOT NULL,
    FOREIGN KEY (juego_rol) REFERENCES juego (id_juego)
);

INSERT INTO rol VALUES (1, 'Top', 1);
INSERT INTO rol VALUES (2, 'Jungle', 1);
INSERT INTO rol VALUES (3, 'Mid', 1);
INSERT INTO rol VALUES (4, 'Bot', 1);
INSERT INTO rol VALUES (5, 'Support', 1);
INSERT INTO rol VALUES (6, 'Duelist', 2);
INSERT INTO rol VALUES (7, 'Initiator', 2);
INSERT INTO rol VALUES (8, 'Controller', 2);
INSERT INTO rol VALUES (9, 'Sentinel', 2);
INSERT INTO rol VALUES (10, 'Dps', 3);
INSERT INTO rol VALUES (11, 'Sniper', 3);
INSERT INTO rol VALUES (12, 'Healer', 3);
INSERT INTO rol VALUES (13, 'Tank', 3);

CREATE TABLE personaje (
	id_personaje INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_personaje VARCHAR(40) NOT NULL,
    id_juego INT UNSIGNED NOT NULL,
    personaje_rol INT UNSIGNED NOT NULL,    
    FOREIGN KEY (id_juego) REFERENCES juego (id_juego),
    FOREIGN KEY (personaje_rol) REFERENCES rol (id_rol)
);

INSERT INTO personaje VALUES (1, 'Aatrox', 1, 1);
INSERT INTO personaje VALUES (2, 'XinZhao', 1, 2);
INSERT INTO personaje VALUES (3, 'Ahri', 1, 3);
INSERT INTO personaje VALUES (4, 'Jinx', 1, 4);
INSERT INTO personaje VALUES (5, 'Sona', 1, 5);
INSERT INTO personaje VALUES (6, 'Jett', 2, 6);
INSERT INTO personaje VALUES (7, 'Sova', 2, 7);
INSERT INTO personaje VALUES (8, 'Viper', 2, 8);
INSERT INTO personaje VALUES (9, 'Killjoy', 2, 9);
INSERT INTO personaje VALUES (10, 'Tracer', 3, 10);
INSERT INTO personaje VALUES (11, 'Blackwidow', 3, 11);
INSERT INTO personaje VALUES (12, 'Mercy', 3, 12);
INSERT INTO personaje VALUES (13, 'D.Va', 3, 13);


CREATE TABLE jugador_lol (
	id_jugador_lol INT UNSIGNED NOT NULL PRIMARY KEY,
    summname VARCHAR(40) NOT NULL,
    fav_lol INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_jugador_lol) REFERENCES jugador (id_jugador),
    FOREIGN KEY (fav_lol) REFERENCES personaje (id_personaje)
);

INSERT INTO jugador_lol VALUES (1, 'OverpoweredPanda#1234', 4);
INSERT INTO jugador_lol VALUES (2, 'RoskiLMDL#3456', 5);

CREATE TABLE jugador_ow (
	id_jugador_ow INT UNSIGNED NOT NULL PRIMARY KEY,
    bnetname VARCHAR(40) NOT NULL,
    fav_ow INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_jugador_ow) REFERENCES jugador (id_jugador),
    FOREIGN KEY (fav_ow) REFERENCES personaje (id_personaje) 
);

INSERT INTO jugador_ow VALUES (1, 'Panda#1234', 13);
INSERT INTO jugador_ow VALUES (3, 'Deivid#5555', 11);

CREATE TABLE jugador_val (
	id_jugador_val INT UNSIGNED NOT NULL PRIMARY KEY,
    agentname VARCHAR(40) NOT NULL,
    fav_val INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_jugador_val) REFERENCES jugador (id_jugador),
    FOREIGN KEY (fav_val) REFERENCES personaje (id_personaje)
);

INSERT INTO jugador_val VALUES (2, 'PaulR#2222', 8);
INSERT INTO jugador_val VALUES (3, 'Dvd#6789', 9);

CREATE TABLE gmatch (
	id_match INT UNSIGNED NOT NULL PRIMARY KEY,
    id_jugador_uno INT UNSIGNED NOT NULL,
    id_jugador_dos INT UNSIGNED,
    fechamatch DATETIME NOT NULL,
    estado BOOLEAN,
    val_jugador_uno ENUM ('1','2','3','4','5'),
    val_jugador_dos ENUM ('1','2','3','4','5'),
    rol_jugador_uno INT UNSIGNED NOT NULL,
    rol_jugador_dos INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_jugador_uno) REFERENCES jugador (id_jugador),
    FOREIGN KEY (id_jugador_dos) REFERENCES jugador (id_jugador),
    FOREIGN KEY (rol_jugador_uno) REFERENCES rol (id_rol),
    FOREIGN KEY (rol_jugador_dos) REFERENCES rol (id_rol)
);