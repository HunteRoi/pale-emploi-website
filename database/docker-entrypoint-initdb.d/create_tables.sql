USE pale_emploi;

CREATE TABLE IF NOT EXISTS code_parrainage(
    id INT AUTO_INCREMENT,
    code VARCHAR(6) NOT NULL UNIQUE,
    date_creation DATE,
    date_affiliation DATE,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS personne(
    id INT AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    mot_de_passe VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    entreprise VARCHAR(50),
    code_parrainage INT,
    PRIMARY KEY(id),
    FOREIGN KEY(code_parrainage) REFERENCES code_parrainage(id)
);

CREATE TABLE IF NOT EXISTS offre_emploi(
    id INT AUTO_INCREMENT,
    titre VARCHAR(50) NOT NULL,
    description VARCHAR(50),
    ville VARCHAR(50),
    date_publication DATE,
    employeur_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(employeur_id) REFERENCES personne(id)
);

CREATE TABLE IF NOT EXISTS application(
    candidat INT,
    emploi INT,
    PRIMARY KEY(candidat, emploi),
    FOREIGN KEY(candidat) REFERENCES personne(id),
    FOREIGN KEY(emploi) REFERENCES offre_emploi(id)
);
