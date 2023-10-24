USE pale_emploi;

CREATE TABLE IF NOT EXISTS Candidat(
    id INT AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Employeur(
    id INT AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    password VARCHAR(50),
    email VARCHAR(50),
    entreprise VARCHAR(50),
    codeParrainage VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Emplois(
    id INT AUTO_INCREMENT,
    titre VARCHAR(50),
    description VARCHAR(50),
    ville VARCHAR(50),
    datePublication DATE,
    employeurId INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(employeurId) REFERENCES Employeur(id)
);

CREATE TABLE IF NOT EXISTS Postuler(
    candidatId INT,
    emploisId INT,
    PRIMARY KEY(candidatId, emploisId),
    FOREIGN KEY(candidatId) REFERENCES Candidat(id),
    FOREIGN KEY(emploisId) REFERENCES Emplois(id)
);
