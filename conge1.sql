CREATE TABLE employe (
  idEmploye varchar(10) NOT NULL primary key,
  idPersonne varchar(10) DEFAULT NULL,
  idPoste varchar(10) DEFAULT NULL,
  idSalaire varchar(10) DEFAULT NULL,
  dateEmbauche dateTime DEFAULT NULL
) ;

--
-- Dumping data for table `employe`
--

INSERT INTO employe (idEmploye, idPersonne, idPoste, idSalaire, dateEmbauche) VALUES (2, 2, 1, 1, '1999-03-06');
INSERT INTO employe (idEmploye, idPersonne, idPoste, idSalaire, dateEmbauche) VALUES (4, 4, 2, 1, '2003-10-16'); 

INSERT INTO employe (idEmploye, idPersonne, idPoste, idSalaire, dateEmbauche) VALUES
(3, 1, 1, 1, '2021-03-06');

create table periodeConge(
    id varchar(10) primary key,
    dateDebut date,
    dateFin date
);

create table motifConge (
    id varchar(10) primary key,
    description varchar(150),
    deductibilite varchar(10)
);

-- nasiana hoe etat raha ohatra hoe demande en cours 0 na efa accepté 1 na hoe refusé -1
-- novaina ny type (satria mbola mysql ny bdd)
create table historiqueConge(
    id int not null auto_increment primary key,
    idEmp int,
    motif varchar(10),
    dateDebut dateTime,
    dateFin dateTime,
    etat int,
    foreign key (idEmp) references employe(idEmploye),
    foreign key (motif) references motifConge(id)
);

create table retraitConge(
    id int not null auto_increment primary key,
    idEmp int,
    heure int,
    dateDiminution dateTime,
    foreign key (idEmp) references employe(idEmploye)
);

insert into retraitConge values (null, 1, 1, '2021-12-02 00:00:00');
insert into retraitConge values (null, 1, 1, '2021-11-02 00:00:00');
insert into retraitConge values (null, 1, 1, '2019-12-02 00:00:00');


create view empAnciente as select e.*,TIMESTAMPDIFF(year,dateEmbauche,NOW()) as years from employe e

insert into motifConge values ('M1','repos medical','non');
insert into motifConge values ('M2','evenement familial','non');
insert into motifConge values ('M3','conge parental','non');
insert into motifConge values ('M4','non justifie','oui');
insert into motifConge values ('M5','autre','oui');

create view congePris as (
    select id,idEmp , SUM(TIMESTAMPDIFF(hour,dateDebut,dateFin)) as nbJours 
    from historiqueConge 
    where TIMESTAMPDIFF(year,dateDebut,NOW())<=3 and etat=1
    group by idEmp 
);

-- somme des heures de congés en moins tao anaty 4 ans
create view heureEnMoins as(
    select ea.idEmploye, sum(heure) as heureMoins, "heure de travail pris sur conge" as remarque from retraitConge rc 
    join empAnciente ea on ea.idEmploye = rc.idEmp
    where TIMESTAMPDIFF(year,dateDiminution,NOW())<=MOD(years,4)

);
select * from congePris cross join heureEnMoins

create view etatConge as (
    select ea.idEmploye,dateEmbauche,years as anneeTravail,MOD(years,4)*30*24 as cumule,
    case 
        when cp.nbJours is null then 0
        else cp.nbJours
    end pris,
    case
        when cp.nbJours is null then 0
        when hm.heureMoins is null then MOD(years,4)*30*24-cp.nbJours
        else MOD(years,4)*30*24-cp.nbJours-hm.heureMoins
    end restant,
    case 
        when MOD(years,4)*30*24 = 0 and years > 0 then "conge expire"
        when MOD(years,4)*30*24 = 0 and years = 0 then "travail depuis moins d'un an"
        when hm.remarque is not null then hm.remarque
    else ""
    end remarque
    from empAnciente ea left join congePris cp on ea.idEmploye=cp.idEmp
    left join heureEnMoins hm on hm.idEmploye=ea.idEmploye
);



create view demandeEnCours as (
    select hc.id,idEmp,mc.description,DATE(dateDebut) as dateDebut,
    DATE(dateFin) as dateFin,TIMESTAMPDIFF(day,dateDebut,dateFin) as demande,
    cumule,pris,restant,remarque,
    nomDepartement,
    idDepartement,
    nomPoste
    from historiqueConge hc inner join etatConge ec on hc.idEmp=ec.idEmploye
    left join motifConge mc on mc.id=hc.motif
    join employe_view e on e.idEmploye = hc.idEmp
    where hc.etat=0
);



-- Controles SQL Date 

-- si < 0 : donc la date entrée est antérieure a la date du jour

select 
    case
    when DATEDIFF("2021-11-02 12:10:21",NOW())<0 THEN "Date antérieure a la date du jour"
    when DATEDIFF("2021-11-02 12:10:21","2021-11-04 12:10:21")<0 THEN "Date Fin antérieure a date fin "
    when DATEDIFF("2021-11-29 12:10:21",NOW())>0 AND DATEDIFF("2021-11-29 12:10:21",NOW())<5 THEN "Il faut au moins 5 jours d'avance pour demander un congé"
    else "Date Congé Valide"
    end as Controle

DELIMITER $$
CREATE FUNCTION diminuerConger (heure int, idEmpl int)
RETURNS boolean 
BEGIN
   DECLARE val boolean;
   SET val = (select
        case when restant-heure >0 then true
        else false
    end peutDiminuer
    from etatConge where idEmploye=idEmpl);
   RETURN (val);
END$$ 
DELIMITER ;

DELIMITER $$
CREATE FUNCTION controleDate ( dateDebut DATETIME ,dateFin DATETIME)
RETURNS varchar(100)
BEGIN
   DECLARE val varchar(100);
    IF DATEDIFF(dateDebut,NOW())<0 THEN
		SET val = "Date anterieure a la date du jour";
    ELSEIF DATEDIFF(dateDebut,dateFin)>0 THEN
        SET val = "Date fin anterieure a date debut ";
    ELSEIF DATEDIFF(dateDebut,NOW())>=0 AND DATEDIFF(dateDebut,NOW())<5 THEN
        SET val = "Il faut au moins 5 jours d'avance pour demander un conge";
    ELSE
        SET val = "Date Conge Valide";
    END IF;
   RETURN (val);
END$$ 
DELIMITER ;

DELIMITER $$
CREATE FUNCTION countCongeParDeptMoisAnnee( idDept varchar(10), ladate DATETIME)
RETURNS int
BEGIN
    DECLARE val int;
    SET val = (select count(*) from congeParMoisParEmploye
    where idDepartement=idDept and mois=MONTH(ladate) and annee=YEAR(ladate));
    RETURN (val);
END$$
DELIMITER ;

create view congeParMoisParEmploye as(
select hc.*,
    nomDepartement,
    idDepartement,
    nomPoste,
    Month(dateDebut) as mois,
    Year(dateDebut) as annee
from historiqueConge hc  
    join employe_view e on e.idEmploye = hc.idEmp
where etat = 1
    and (dateDebut>=NOW() or dateFin>=NOW())
group by Month(dateDebut),Year(dateDebut),e.idEmploye);




create view employe_view as
    select
        personne.*,
        employe.idEmploye, employe.idSalaire, employe.dateEmbauche,
        departement.nom as nomDepartement, departement.idDepartement, departement.descri as descriDepartement,
        salaire.montant as montantSalaire, salaire.dateMiseEnPlace,
        poste.nom as nomPoste, poste.idPoste, poste.descri as descriPoste
    from
        personne
        join employe on employe.idPersonne = personne.idPersonne
        join poste on employe.idPoste = poste.idPoste
        join departement on departement.idDepartement = poste.idDepartement
        join salaire on salaire.idEmploye = employe.idSalaire


create view EmployeConge AS
select hc.*,motifconge.description,motifconge.deductibilite,e.idPoste, e.idSalaire, e.dateEmbauche,p.nom,p.prenom,(timestampdiff(HOUR ,hc.dateDebut,hc.dateFin))as NbrHeure
from historiqueconge as hc
         join motifconge on hc.motif = motifconge.id
         join employe e on hc.idEmp = e.idEmploye
         join personne p on e.idPersonne = p.idPersonne



DELIMITER $$
CREATE PROCEDURE retraitHeureConge(IN heureRetire int, IN idEmploye int)
BEGIN
    select diminuerConger(heureRetire,idEmploye) as retrait;
    IF (retrait=1) THEN 
        insert into retraitConge values (null, idEmploye, heureRetire, NOW());
    END IF;
END$$
DELIMITER ;
