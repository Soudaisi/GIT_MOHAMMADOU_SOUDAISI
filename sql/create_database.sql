CREATE DATABASE IF NOT EXISTS annuaire;

USE annuaire;

CREATE TABLE employes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    poste VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    telephone VARCHAR(20),
    date_embauche DATE
);
