-- fiche ecolage etudiant
create view ficheecolageetudiant as
select ee.id, t.tranche1 as apaye1, t.tranche2 as apaye2, t.tranche3 as apaye3, t.tranche4 as apaye4, 
ee.tranche1 as paye1, ee.tranche2 as paye2, ee.tranche3 as paye3, ee.tranche4 as paye4,
 (t.tranche1 - ee.tranche1) as rest1, (t.tranche2 - ee.tranche2) as rest2, (t.tranche3 - ee.tranche3) as rest3, (t.tranche4 - ee.tranche4) as rest4
from students et join ecolage_etudiants ee on et.id = ee.idEtudiant
join tarifs t on ee.idTarif = t.id;

-- form regler ecolage etudiant
DROP PROCEDURE IF EXISTS getFormReglerEcolageEtudiant;
DELIMITER //

CREATE PROCEDURE getFormReglerEcolageEtudiant(IN paramIdee varchar(255), IN numTranche varchar(255))
BEGIN
    
    SET @s = CONCAT(
        "SELECT ee.id, t.tranche", numTranche,
        " as apayer, ee.tranche", numTranche, 
        " as payee, (t.tranche", numTranche, 
        " - ee.tranche", numTranche, ") as reste 
        from ecolage_etudiants ee join tarifs t on ee.idTarif = t.id
        where ee.id='", paramIdee, "'"
    );
    PREPARE stmt1 FROM @s;
    EXECUTE stmt1;
    DEALLOCATE PREPARE stmt1; 
    -- select @s as test;
    
END //

DELIMITER ;

-- creation de vue pour l'indexation
create view indesetudiant as
select id, CONCAT(id, nom_etudiant, prenoms_etudiant, prenoms_etudiant, date_de_naissance, nom_du_pere,  nom_de_la_mere, contact_parent, sexe, adresse) as indexe from students;

-- fontion recherche
DELIMITER //

CREATE PROCEDURE rechercher(keywords varchar(255))
BEGIN
    
    SET @s = CONCAT(
        "SELECT * from students where id in (select id from indesetudiant where indexe like '%", keywords, "%')"
    );
    PREPARE stmt1 FROM @s;
    EXECUTE stmt1;
    DEALLOCATE PREPARE stmt1;
    
END //

DELIMITER ;

-- nombre eleve ayant souscri a un tarif
create view nombreelevepartarif as
select idTarif, count(*) as nbeleve 
from ecolage_etudiants;

--montant que la totalite des eleves devrait payer
create view apayerengeneral as
select t.id, t.idAnnee, sum(t.ecolage * nbe.nbeleve) as apayer
from tarifs t join nombreelevepartarif nbe on t.id = nbe.idTarif group by t.idAnnee;

--montant deja paye par la totalite des eleves
create view dejapayerengeneral as
select t.idAnnee, sum(ee.tranche1)+sum(ee.tranche2)+sum(ee.tranche3)+sum(ee.tranche4) as dejapaye
from ecolage_etudiants ee join tarifs t on ee.idTarif = t.id group by t.idAnnee;


--montant que la totalite des eleves par mention devrait payer
create view apayerparmention as
select t.id, p.idMention, t.idAnnee, sum(t.ecolage * nbe.nbeleve) as apayer
from tarifs t join nombreelevepartarif nbe on t.id = nbe.idTarif 
join parcours p on t.idParcour = p.id
group by p.idMention, t.idAnnee;

--montant deja paye par la totalite des eleves par mention
create view dejapayerparmention as
select p.idMention, t.idAnnee, sum(ee.tranche1)+sum(ee.tranche2)+sum(ee.tranche3)+sum(ee.tranche4) as dejapaye
from ecolage_etudiants ee join tarifs t on ee.idTarif = t.id 
join parcours p on t.idParcour = p.id
group by p.idMention, t.idAnnee;


--montant que la totalite des eleves par parcour devrait payer
create view apayerparparcour as
select t.id, t.idParcour, t.idAnnee, sum(t.ecolage * nbe.nbeleve) as apayer
from tarifs t join nombreelevepartarif nbe on t.id = nbe.idTarif 
group by t.idParcour, t.idAnnee;

--montant deja paye par la totalite des eleves par parcour
create view dejapayerparparcour as
select t.idParcour, t.idAnnee, sum(ee.tranche1)+sum(ee.tranche2)+sum(ee.tranche3)+sum(ee.tranche4) as dejapaye
from ecolage_etudiants ee join tarifs t on ee.idTarif = t.id 
group by t.idParcour, t.idAnnee;
