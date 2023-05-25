ALTER TABLE tarifs
ADD CONSTRAINT tarifconstraint UNIQUE (idAnnee, idParcour, idNiveau);