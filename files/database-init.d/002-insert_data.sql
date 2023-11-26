USE pale_emploi;

INSERT INTO code_parrainage (code, date_creation, date_affiliation)
VALUES("789000", "2023-01-01", "2023-01-01");

INSERT INTO personne ( nom, prenom, mot_de_passe, email, entreprise, code_parrainage)
VALUES("Duvillié", "Guillerme", "e10adc3949ba59abbe56e057f20f883e", "guillerme.duvillie@henallux.be", "Henallux", 1);
-- mdp : 123456

INSERT INTO offre_emploi (titre, description, ville, date_publication, employeur_id)
VALUES("Développeur C Namur", "Je cherche un bon dev C pour m'accompagner dans mes aventures", "Namur", "2023-12-01", 1);
