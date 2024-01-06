DROP DATABASE IF EXISTS Game_Collection;
CREATE DATABASE Game_Collection;
USE Game_Collection;

CREATE TABLE PERSON (
	id_user SMALLINT AUTO_INCREMENT PRIMARY KEY,
    fname_user VARCHAR(100) NOT NULL,
    name_user VARCHAR(100) NOT NULL,
    mail_user VARCHAR(255) NOT NULL UNIQUE,
    password_user VARCHAR(255) NOT NULL
);

CREATE TABLE GAME (
	id_game SMALLINT AUTO_INCREMENT PRIMARY KEY,
    name_game VARCHAR(100) NOT NULL,
    editor_game VARCHAR(100) NOT NULL,
    release_date DATE NOT NULL,
    description_game VARCHAR(500) NOT NULL,
    platform_game VARCHAR(100) NOT NULL,
    url_cover VARCHAR(500) NOT NULL,
    url_website VARCHAR(500) NOT NULL    
);

CREATE TABLE LIBRARY (
	id_user SMALLINT,
    id_game SMALLINT,
    hours_played INT NOT NULL,
    PRIMARY KEY(id_game, id_user),
 	CONSTRAINT foreign_key_id_game FOREIGN KEY(id_game) REFERENCES GAME(id_game),
    CONSTRAINT foreign_key_id_user FOREIGN KEY(id_user) REFERENCES PERSON(id_user)
);

INSERT INTO PERSON VALUES 
(NULL, 'Ewen', 'Buhot', 'ewen.buhot@gmail.com', 'ewenbuhot'),
(NULL, 'Tom', 'Delangle', 'tom.delangle@gmail.com', 'tomdelangle'),
(NULL, 'Thomas', 'Quero', 'thomas.quero@gmail.com', 'thomasquero');

INSERT INTO GAME VALUES 
(NULL, 'Grand Thief Auto VI', 'Rockstar Games', '2023-12-24', 'GTA VI est le meilleur jeu qui n a jamais été créé. Venez découvrir le plaisir à l état pur.', 'PC, PS5, XBOX S','https://cdn1.epicgames.com/0584d2013f0149a791e7b9bad0eec102/offer/GTAV_EGS_Artwork_2560x1440_Landscaped%20Store-2560x1440-79155f950f32c9790073feaccae570fb.jpg', 'http://tinyurl.com/wy9uekx8'),
(NULL, 'Fortnite', 'Epic Games', '2018-10-07', 'Fortnite est le plus grand Battle Roayle du monde. Ce jeu a déjà conquis des millions de personnes.', 'PC, PS5, Xbox Series S, PS4, Xbox Series X, Nintendo Switch, Mobile','https://cdn.sortiraparis.com/images/80/66131/908390-fortnite-enfer-vert-map-skins-passe-de-combat-le-point-sur-les-nouveautes-de-la-saison-3.jpg', 'http://tinyurl.com/wy9uekx8'),
(NULL, 'ED MOYENNE', 'Zotac', '2020-05-10', 'ED Moyenne est un jeu coopératif de survie. Il offre des centaines de façons différentes de jouer.','Mobile','https://pbs.twimg.com/profile_images/1611785242120962048/IplREB86_400x400.jpg', 'http://tinyurl.com/wy9uekx8'),
(NULL, 'Adibou', 'Coktel Wision', '2010-02-24', 'Adibou est un jeu qui a été créé dans le but d apprendre en s amusant ! Ses méthodes pédagogiques permettent de faire activités ludiques pour tous les membres de la famille','PC','https://staticctf.ubisoft.com/J3yJr34U2pZ2Ieem48Dwy9uqj5PNUQTn/2AhSJumbPsrf6NYvqcR0Of/486cff966004c7233193f2337a81acbc/keyart_CR.jpg', 'http://tinyurl.com/wy9uekx8'),
(NULL, 'World of Tanks', 'WarGaming', '2017-08-22', 'World of Tanks est un jeu multijoueur de combats en temps réel. Il offre une façon de jouer unique est accessible','PC, Mobile','https://image.jeuxvideo.com/medias-crop-1200-675/152162/1521619601-3635-card.jpg', 'http://tinyurl.com/wy9uekx8');


INSERT INTO LIBRARY VALUES 
(1, 1, 25),
(1, 3, 543),
(1, 4, 265),
(2, 1, 658),
(2, 2, 123),
(2, 3, 3256),
(2, 4, 24),
(2, 5, 325),
(3, 1, 452),
(3, 3, 951),
(3, 5, 159);

