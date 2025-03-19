CREATE DATABASE stampee_db;
USE stampee_db;

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    zipCode VARCHAR(10) NOT NULL
);

CREATE TABLE couleur (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    code VARCHAR(10)
);

CREATE TABLE image (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    image BLOB(1000)
);

CREATE TABLE pays (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE conditions (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(25)
);

CREATE TABLE commentaire (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    commentaire TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE mise (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    montant DOUBLE NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE timbre (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    couleur_id INT NOT NULL,
    pays_id INT NOT NULL,
    image_id INT NOT NULL,
    condition_id INT NOT NULL,
    tirage INT NOT NULL,
    longueur INT NOT NULL,
    largeur INT NOT NULL,
    certificat BOOLEAN,
    commentaire_id INT,
    FOREIGN KEY (couleur_id) REFERENCES couleur(id),
    FOREIGN KEY (pays_id) REFERENCES pays(id),
    FOREIGN KEY (image_id) REFERENCES image(id),
    FOREIGN KEY (condition_id) REFERENCES conditions(id),
    FOREIGN KEY (commentaire_id) REFERENCES commentaire(id)
);

CREATE TABLE enchere (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    debut DATE NOT NULL,
    fin DATE NOT NULL,
    prix_plancher DOUBLE NOT NULL,
    favoris BOOLEAN NOT NULL,
    timbre_id INT NOT NULL,
    mise_id INT,
    FOREIGN KEY (timbre_id) REFERENCES timbre(id),
    FOREIGN KEY (mise_id) REFERENCES mise(id)
);