-- Active: 1725541943115@@mysql-blanchet.alwaysdata.net@3306@blanchet_ecf_arcadia

CREATE TABLE Role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role VARCHAR(50) NOT NULL UNIQUE
);

-- Création de la table Utilisateur
CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    id_role INT NOT NULL,
    id_service INT NOT NULL,
    FOREIGN KEY (id_role) REFERENCES Role(id)
);

-- Création de la table Race
CREATE TABLE Race (
    id INT PRIMARY KEY AUTO_INCREMENT,
    race VARCHAR(50) NOT NULL UNIQUE
);

-- Création de la table Habitat
CREATE TABLE Habitat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL UNIQUE,
    img VARCHAR(255) NOT NULL UNIQUE
);

-- Création de la table Rapport
CREATE TABLE Veterinaire (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    status VARCHAR(255),
    nourriture_reco VARCHAR(255),
    grammage_reco INT,
    santé VARCHAR(255),
    repas_donnees VARCHAR(255),
    quantite  INT,
    commentaire TEXT,
    id_User INT NOT NULL,
    id_animal INT,
    FOREIGN KEY (id_User) REFERENCES User(id),
    FOREIGN KEY (id_animal) REFERENCES Animal(id)
);


INSERT INTO Role (role) VALUES
('admin'),
('vétérinaire'),
('employé');

CREATE TABLE addavis(
    id INT PRIMARY KEY AUTO_INCREMENT,
    commentaire TEXT NOT NULL
    etoiles INT NOT NULL,
    nom VARCHAR(20) NOT NULL,
);

CREATE TABLE contacts(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50)NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
);

CREATE TABLE Service (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    id_user int,
    FOREIGN KEY (id_User) REFERENCES User(id)
);

-- Création de la table Animal
CREATE TABLE Animal (
    nom VARCHAR(50) NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    age INT,
    id_race INT NOT NULL,
    visite INT DEFAULT 0,
    img VARCHAR(255),
    id_habitat INT NOT NULL,
    FOREIGN KEY (id_race) REFERENCES Race(id),
    FOREIGN KEY (id_habitat) REFERENCES Habitat(id)
);


ALTER TABLE addavis 
ADD valide BOOLEAN DEFAULT FALSE;

Drop TABLE `Veterinaire`,