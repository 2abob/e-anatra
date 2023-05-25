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

