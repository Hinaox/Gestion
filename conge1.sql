-- CREATE TABLE employe (
--   idEmploye varchar(10) NOT NULL primary key,
--   idPersonne varchar(10) DEFAULT NULL,
--   idPoste varchar(10) DEFAULT NULL,
--   idSalaire varchar(10) DEFAULT NULL,
--   dateEmbauche dateTime DEFAULT NULL
-- ) ;

--
-- Dumping data for table `employe`
--

-- INSERT INTO employe (idEmploye, idPersonne, idPoste, idSalaire, dateEmbauche) VALUES (2, 2, 1, 1, '1999-03-06');
-- INSERT INTO employe (idEmploye, idPersonne, idPoste, idSalaire, dateEmbauche) VALUES (4, 4, 2, 1, '2003-10-16'); 

-- INSERT INTO employe (idEmploye, idPersonne, idPoste, idSalaire, dateEmbauche) VALUES
-- (3, 1, 1, 1, '2021-03-06');

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


create view empAnciente as select e.*,TIMESTAMPDIFF(year,dateEmbauche,NOW()) as years from employe e

insert into motifConge values ('M1','evenement familial','ND');
insert into motifConge values ('M2','conge parental','ND');
insert into motifConge values ('M3','autre','D');

--maka ny conge pris les derniers 3 ans
create view congePris as (
    select id,idEmp , SUM(TIMESTAMPDIFF(day,dateDebut,dateFin)) as nbJours 
    from historiqueConge 
    where TIMESTAMPDIFF(year,dateDebut,NOW())<=3 and etat=1
    group by idEmp 
);

create view etatConge as (
    select idEmploye,dateEmbauche,years as anneeTravail,MOD(years,4)*30 as cumule,
    case 
        when cp.nbJours is null then 0
        else cp.nbJours
    end pris,
    case
        when cp.nbJours is null then 0
        else MOD(years,4)*30-cp.nbJours 
    end restant,
    case 
        when MOD(years,4)*30 = 0 and years > 0 then "conge expire"
        when MOD(years,4)*30 = 0 and years = 0 then "travail depuis moins d'un an"
    else ""
    end remarque
    from empAnciente ea left join congePris cp on ea.idEmploye=cp.idEmp
);

create view demandeEnCours as (
    select hc.id,idEmp,mc.description,DATE(dateDebut) as dateDebut,DATE(dateFin) as dateFin,TIMESTAMPDIFF(day,dateDebut,dateFin) as demande,
    cumule,pris,restant,remarque
    from historiqueConge hc inner join etatConge ec on hc.idEmp=ec.idEmploye
    left join motifConge mc on mc.id=hc.motif
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

