CREATE DATABASE stampee_db;
USE stampee_db;

CREATE TABLE timbre (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    couleur_id INT NOT NULL,
    pays_id INT NOT NULL,
    imgMain_id INT NOT NULL,
    imgSec_id INT,
    condition_id INT NOT NULL,
    tirage INT NOT NULL,
    longueur INT NOT NULL,
    largeur INT NOT NULL,
    certificat BOOLEAN,
    FOREIGN KEY (couleur_id) REFERENCES couleur(id),
    FOREIGN KEY (pays_id) REFERENCES pays(id),
    FOREIGN KEY (condition_id) REFERENCES condition(id)
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

CREATE TABLE condition (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(25)
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

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    zipCode VARCHAR(10) NOT NULL
);

CREATE TABLE mise (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    montant DOUBLE NOT NULL,
    user_id INT NOT NULL
);