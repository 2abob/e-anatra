-- ALTER TABLE tarifs
-- ADD CONSTRAINT tarifconstraint UNIQUE (idAnnee, idParcour, idNiveau);

CREATE TABLE sequences (
    name VARCHAR(255) PRIMARY KEY,
    value INT UNSIGNED NOT NULL
);

INSERT INTO sequences (name, value) VALUES ('sequence_etudiant', 1);
INSERT INTO sequences (name, value) VALUES ('sequence_annee_universitaire', 1);
INSERT INTO sequences (name, value) VALUES ('sequence_mention', 1);
INSERT INTO sequences (name, value) VALUES ('sequence_niveau', 1);
INSERT INTO sequences (name, value) VALUES ('sequence_parcour', 1);
INSERT INTO sequences (name, value) VALUES ('sequence_tarif', 1);
INSERT INTO sequences (name, value) VALUES ('sequence_ecolage_etudiant', 1);

create view listeetudiantmention as
select et.*, p.idMention
from students et join ecolage_etudiants ee on et.id = ee.idEtudiant
join tarifs tar on ee.idTarif = tar.id
join parcours p on tar.idParcour
join mentions m on p.idMention = m.id;

create view listeetudiantparcour as
select et.*, tar.idParcour
from students et join ecolage_etudiants ee on et.id = ee.idEtudiant
join tarifs tar on ee.idTarif = tar.id
join parcours p on tar.idParcour;
