DELIMITER //
CREATE PROCEDURE getTranche(idNiveau int, idParcour int)
    BEGIN
        select tranche1, tranche2, tranche3, tranche4 
        from tarifs 
        where idNiveau = idNiveau AND idParcour = idParcour;
    END
// 

-- tranche impayee par etudiant
DELIMITER //
CREATE PROCEDURE getTrancheImpayer(idEtudiant int, idTarif int)
    BEGIN
        select tranche1, tranche2, tranche3, tranche4 
        from ecolage_etudiants 
        where idEtudiant = idEtudiant AND idTarif = idTarif;
    END
// 

-- payer tranche d'ecolage d'un etudiant
DELIMITER //
CREATE PROCEDURE payerTranche(idEtudiant int, idTarif int, numTranche int, montant int)
    BEGIN
        SET @s = CONCAT(
            'update ecolage_etudiants set tranche', 
            numTranche, '=', montant, 
            ' where idTarif=', idTarif, 
            ' and idEtudiant=', idEtudiant);
        PREPARE stmt1 FROM @s;
        EXECUTE stmt1;
        DEALLOCATE PREPARE stmt1;
    END
// 

-- payer tranche d'ecolage d'un etudiant
DELIMITER //
CREATE PROCEDURE payerTranche(idEcolageEtudiant int, numTranche int, montant int)
    BEGIN
        SET @s = CONCAT(
            'update ecolage_etudiants set tranche', 
            numTranche, '=', montant, 
            ' where id=', idEcolageEtudiant);
        PREPARE stmt1 FROM @s;
        EXECUTE stmt1;
        DEALLOCATE PREPARE stmt1;
    END
// 
