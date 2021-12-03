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

create table historiqueConge(
    id varchar(10) primary key,
    idEmp int,
    motif varchar(10),
    dateDebut dateTime,
    dateFin dateTime,
    foreign key (idEmp) references employe(idEmploye),
    foreign key (motif) references motifConge(id)
);

/*
Donnée Test
*/
insert into contact values (null,'email1','autre1');

insert into personne values (null,'nom1','prenom1','1974-05-30','M','adresse1',1200.786,'Marié',1);

insert into departement values (null,'dep1','descri1');

insert into poste values (null,1,'nom1','descri1');

insert into salaire values (null,1,132566.56,'1999-10_09');
INSERT INTO employe (idEmploye, idPersonne, idPoste, idSalaire, dateEmbauche) VALUES
(null, 1, 1, 1, '1999-03-06');


INSERT INTO employe (idEmploye, idPersonne, idPoste, idSalaire, dateEmbauche) VALUES
(1, 1, 1, 1, '1999-03-06'),
(2, 2, 2, 2, '2003-10-16');

INSERT INTO employe (idEmploye, idPersonne, idPoste, idSalaire, dateEmbauche) VALUES
(3, 1, 1, 1, '2021-03-06');

insert into motifconge values ('1','descri conge1','non');
insert into motifconge values ('2','descri conge2','oui');

insert into historiqueconge values ('1',2,'1','2021-04-01 15:14:12','2021-04-03 15:14:12');

insert into historiqueconge values ('2',2,'2','2021-04-05 15:14:12','2021-04-07 15:14:12');


insert into historiqueconge values ('2',2,'2','2021-04-20 15:14:12','2021-04-28 15:14:12');

/*
Vue Employe Conge
*/

create view EmployeConge AS
select hc.*,motifconge.description,motifconge.deductibilite,e.idPoste, e.idSalaire, e.dateEmbauche,p.nom,p.prenom,(datediff(hc.dateFin,hc.dateDebut))as NbrJour
from historiqueconge as hc
         join motifconge on hc.motif = motifconge.id
         join employe e on hc.idEmp = e.idEmploye
         join personne p on e.idPersonne = p.idPersonne




