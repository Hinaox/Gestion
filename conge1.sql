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
    deductibilite varchar(10),
    -- solde int 
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

create view empAnciente as select e.*,DATEDIFF(year,dateEmbauche, getdate()) as years from employe e

insert into motifConge values ('M1','repos medical','ND');
insert into motifConge values ('M2','evenement familial','ND');
insert into motifConge values ('M3','conge parental','ND');
insert into motifConge values ('M4','non justifie','D');
insert into motifConge values ('M5','autre','D');


