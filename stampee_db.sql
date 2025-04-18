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
    titre VARCHAR(255) NOT NULL,
    date INT,
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
    chemin VARCHAR(255),
    principalite BOOLEAN,
    timbre_id INT,
    FOREIGN KEY (timbre_id) REFERENCES timbre(id)
);

CREATE TABLE enchere (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    debut DATE NOT NULL,
    fin DATE NOT NULL,
    prix_plancher DOUBLE NOT NULL,
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
    enchere_id INT NOT NULL,
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

INSERT INTO conditions (nom) VALUES ('Parfaite');
INSERT INTO conditions (nom) VALUES ('Excellente');
INSERT INTO conditions (nom) VALUES ('Bonne');
INSERT INTO conditions (nom) VALUES ('Moyenne');
INSERT INTO conditions (nom) VALUES ('Endommage');

INSERT INTO enchere (debut, fin, prix_plancher, timbre_id) VALUES ('2025-05-10', '2025-05-24', 800.00, 1);
INSERT INTO enchere (debut, fin, prix_plancher, timbre_id) VALUES ('2025-06-01', '2025-06-15', 300.00, 2);
INSERT INTO enchere (debut, fin, prix_plancher, timbre_id) VALUES ('2025-06-02', '2025-06-16', 100.00, 3);
INSERT INTO enchere (debut, fin, prix_plancher, timbre_id) VALUES ('2025-06-10', '2025-06-24', 50.00, 4);
INSERT INTO enchere (debut, fin, prix_plancher, timbre_id) VALUES ('2025-07-01', '2025-08-01', 500.00, 5);
INSERT INTO enchere (debut, fin, prix_plancher, timbre_id) VALUES ('2025-08-06', '2025-08-20', 275.00, 6);
INSERT INTO enchere (debut, fin, prix_plancher, timbre_id) VALUES ('2025-09-01', '2025-09-15', 650.00, 7);
INSERT INTO enchere (debut, fin, prix_plancher, timbre_id) VALUES ('2025-10-15', '2025-10-29', 425.00, 8);