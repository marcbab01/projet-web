CREATE DATABASE stampee_db;
USE stampee_db;

CREATE TABLE privilege (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    privilege VARCHAR(50) NOT NULL
);

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    zipCode VARCHAR(10) NOT NULL,
    privilege_id INT NOT NULL,
    FOREIGN KEY (privilege_id) REFERENCES privilege(id)
);

CREATE TABLE couleur (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    code VARCHAR(10)
);

CREATE TABLE pays (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE conditions (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(25)
);

CREATE TABLE timbre (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    couleur_id INT NOT NULL,
    pays_id INT NOT NULL,
    condition_id INT NOT NULL,
    tirage INT NOT NULL,
    longueur INT NOT NULL,
    largeur INT NOT NULL,
    certificat BOOLEAN,
    FOREIGN KEY (couleur_id) REFERENCES couleur(id),
    FOREIGN KEY (pays_id) REFERENCES pays(id),
    FOREIGN KEY (condition_id) REFERENCES conditions(id)
);

CREATE TABLE image (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(100),
    principalite BOOLEAN,
    timbre_id INT,
    FOREIGN KEY (timbre_id) REFERENCES timbre(id)
);

CREATE TABLE enchere (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    debut DATE NOT NULL,
    fin DATE NOT NULL,
    prix_plancher DOUBLE NOT NULL,
    favoris BOOLEAN NOT NULL,
    timbre_id INT NOT NULL,
    FOREIGN KEY (timbre_id) REFERENCES timbre(id)
);

CREATE TABLE commentaire (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    commentaire TEXT NOT NULL,
    user_id INT NOT NULL,
    enchere_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (enchere_id) REFERENCES enchere(id)
);

CREATE TABLE mise (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    montant DOUBLE NOT NULL,
    timestamp DATETIME,
    user_id INT NOT NULL,
    enchere_id INT NOT NULL UNIQUE,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (enchere_id) REFERENCES enchere(id)
);

INSERT INTO privilege (privilege) VALUES ('Admin');
INSERT INTO privilege (privilege) VALUES ('Manager');
INSERT INTO privilege (privilege) VALUES('Employee');

INSERT INTO couleur (nom, code) VALUES ('Noir', '#000000');
INSERT INTO couleur (nom, code) VALUES ('Rose', '#FFC0CB');
INSERT INTO couleur (nom, code) VALUES ('Mauve', '#800080');
INSERT INTO couleur (nom, code) VALUES ('Rouge', '#FF0000');
INSERT INTO couleur (nom, code) VALUES ('Orange', '#FFA500');
INSERT INTO couleur (nom, code) VALUES ('Jaune', '#FFFF00');
INSERT INTO couleur (nom, code) VALUES ('Vert', '#008000');
INSERT INTO couleur (nom, code) VALUES ('Bleu', '#0000FF');

INSERT INTO pays (nom) VALUES ('Canada');
INSERT INTO pays (nom) VALUES ('USA');
INSERT INTO pays (nom) VALUES ('Angleterre');
INSERT INTO pays (nom) VALUES ('France');
INSERT INTO pays (nom) VALUES ('Allemagne');
INSERT INTO pays (nom) VALUES ('Espagne');
INSERT INTO pays (nom) VALUES ('Mexique');
INSERT INTO pays (nom) VALUES ('Portugal');
INSERT INTO pays (nom) VALUES ('Japon');
INSERT INTO pays (nom) VALUES ('Chine');
INSERT INTO pays (nom) VALUES ('Russie');
INSERT INTO pays (nom) VALUES ('Danemark');
INSERT INTO pays (nom) VALUES ('Égypte');