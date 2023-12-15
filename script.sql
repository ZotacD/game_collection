DROP DATABASE IF EXISTS Game_Collection;
CREATE DATABASE Game_Collection;
USE Game_Collection;

CREATE TABLE PERSON (
	id_user SMALLINT AUTO_INCREMENT PRIMARY KEY,
    fname_user VARCHAR(100),
    name_user VARCHAR(100),
    mail_user VARCHAR(255),
    password_user VARCHAR(255)
);

CREATE TABLE GAME (
	id_game SMALLINT AUTO_INCREMENT PRIMARY KEY,
    name_game VARCHAR(100) NOT NULL,
    editor_game VARCHAR(100) NOT NULL,
    release_date DATE NOT NULL,
    description_game VARCHAR(500) NOT NULL,
    url_cover VARCHAR(500) NOT NULL,
    url_website VARCHAR(500) NOT NULL    
);

CREATE TABLE LIBRARY (
	id_user SMALLINT,
    id_game SMALLINT,
    order_lib SMALLINT NOT NULL,
    hours_played INT NOT NULL,
    platform_game VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_game, id_user),
 	CONSTRAINT foreign_key_id_game FOREIGN KEY(id_game) REFERENCES GAME(id_game),
    CONSTRAINT foreign_key_id_user FOREIGN KEY(id_user) REFERENCES PERSON(id_user)
);

INSERT INTO PERSON VALUES 
(NULL, 'Ewen', 'Buhot', 'ewen.buhot@gmail.com', 'ewenbuhot'),
(NULL, 'Tom', 'Delangle', 'tom.delangle@gmail.com', 'tomdelangle'),
(NULL, 'Thomas', 'Quero', 'thomas.quero@gmail.com', 'thomasquero');

INSERT INTO GAME VALUES 
(NULL, 'Grand Thief Auto VI', 'Rockstar Games', '2023-12-24', 'GTA VI est le meilleur jeu qui n a jamais été créé. Venez découvrir le plaisir à l état pur.','http://tinyurl.com/wy9uekx8', 'http://tinyurl.com/wy9uekx8'),
(NULL, 'Fortnite', 'Epic Games', '2018-10-07', 'Fortnite est le plus grand Battle Roayle du monde. Ce jeu a déjà conquis des millions de personnes.','http://tinyurl.com/wy9uekx8', 'http://tinyurl.com/wy9uekx8'),
(NULL, 'ED MOYENNE', 'Zotac', '2020-05-10', 'ED Moyenne est un jeu coopératif de survie. Il offre des centaines de façons différentes de jouer.','http://tinyurl.com/wy9uekx8', 'http://tinyurl.com/wy9uekx8'),
(NULL, 'Adibou', 'Coktel Wision', '2010-02-24', 'Adibou est un jeu qui a été créé dans le but d apprendre en s amusant ! Ses méthodes pédagogiques permettent de faire activités ludiques pour tous les membres de la 		famille','http://tinyurl.com/wy9uekx8', 'http://tinyurl.com/wy9uekx8'),
(NULL, 'World of Tanks', 'WarGaming', '2017-08-22', 'World of Tanks est un jeu multijoueur de combats en temps réel. Il offre une façon de jouer unique est accessible','http://tinyurl.com/wy9uekx8', 'http://tinyurl.com/wy9uekx8');


INSERT INTO LIBRARY VALUES 
(1, 1, 1, 25, 'PC'),
(1, 3, 2, 543, 'PC'),
(1, 4, 3, 265, 'PC'),
(2, 1, 1, 658, 'PS5'),
(2, 2, 2, 123, 'PC'),
(2, 3, 3, 3256, 'PC'),
(2, 4, 4, 24, 'PS5'),
(2, 5, 5, 325, 'PC'),
(3, 1, 1, 452, 'PC'),
(3, 3, 2, 951, 'PC'),
(3, 5, 3, 159, 'PC');

