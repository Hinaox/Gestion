CREATE DATABASE gestion;
USE Gestion;

CREATE TABLE CategorieProfessionnel(
	idcat int not null primary key AUTO_INCREMENT,
	Categorie varchar(50)
);


CREATE TABLE GradeProfessionnel(
	idGrad int not null primary key AUTO_INCREMENT,
	reference varchar(50),
	Libelle Varchar(50)
);


CREATE TABLE Organigramme(
	Poste varchar(50) not null primary key,
	PosteSup varchar(50) ,
	idCategorie int ,
	foreign key (PosteSup) references Organigramme(Poste),
	foreign key (idCategorie) references CategorieProfessionnel(idcat)
);

CREATE TABLE GrilleSalaire(
	 GradeProfessionnel int  not null ,
	 categorie int 	 not null ,
	 SalaireMin int,
	 primary key (GradeProfessionnel,categorie),
	 foreign key (GradeProfessionnel) references GradeProfessionnel(idGrad),
	 foreign key (categorie) references CategorieProfessionnel(idcat)
);

INSERT INTO CategorieProfessionnel (Categorie) values ('M1');
INSERT INTO CategorieProfessionnel (Categorie) values ('M2');
INSERT INTO CategorieProfessionnel (Categorie) values ('OS1');
INSERT INTO CategorieProfessionnel (Categorie) values ('OS2');
INSERT INTO CategorieProfessionnel (Categorie) values ('OS3');
INSERT INTO CategorieProfessionnel (Categorie) values ('OP1A');
INSERT INTO CategorieProfessionnel (Categorie) values ('OP1B');
INSERT INTO CategorieProfessionnel (Categorie) values ('OP2A');
INSERT INTO CategorieProfessionnel (Categorie) values ('OP2B');
INSERT INTO CategorieProfessionnel (Categorie) values ('OP3');

INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('Stg','Stagiaire');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('2C1','Deuxieme classe, 1er echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('2C2','Deuxieme classe, 2e echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('2C3','Deuxieme classe, 3e echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('1C1','Premiere classe, 1er echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('1C2','Premiere classe, 2e echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('1C3','Premiere classe, 3e echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('Ppal1','Principal 1er echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('Ppal2','Principal 2e echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('Ppal3','Principal 3e echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('Exc1','Classe exceptionnelle 1er echelon');
INSERT INTO GradeProfessionnel (reference,Libelle) VALUES ('Exc2','Classe exceptionnelle 2e echelon');


INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Directeur General',null,8);

INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Directeur de Production','Directeur General',6);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Logistique','Directeur de Production',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Usine1','Directeur de Production',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Usine2','Directeur de Production',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Directeur Financier','Directeur General',6);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Comptabilite','Directeur Financier',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Controle de Gestion','Directeur Financier',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Paie','Directeur Financier',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Directeur des RH','Directeur General',6);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Recrutement','Directeur des RH',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Gestion du personnel','Directeur des RH',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Directeur Commercial','Directeur General',6);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Marketing','Directeur Commercial',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Produit','Directeur Commercial',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('SAV','Directeur Commercial',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Directeur Admin. et Juridique','Directeur General',6);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Administration','Directeur Admin. et Juridique',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Audit interne','Directeur Admin. et Juridique',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Service juridique','Directeur Admin. et Juridique',5);
INSERT INTO Organigramme (Poste, PosteSup,idCategorie) values ('Secretariat General','Directeur General',6);









INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (1,1,246559);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (2,1,250107);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (3,1,259362);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (4,1,262907);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (5,1,267636);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (6,1,273546);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,1,281353);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,1,287263);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,1,291992);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,1,302067);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,1,307655);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,1,353608);

INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (1,2,272511);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (2,2,277033);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (3,2,281556);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (4,2,288933);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (5,2,298979);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (6,2,303501);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,2,309153);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,2,318168);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,2,322689);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,2,328341);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,2,338234);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,2,425914);

INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (1,3,323489);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (2,3,330855);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (3,3,338007);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (4,3,348237);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (5,3,362908);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (6,3,373633);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,3,384095);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,3,399034);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,3,410860);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,3,423971);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,3,441366);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,3,579445);

INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (1,4,419430);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (2,4,441253);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (3,4,463238);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (4,4,485104);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (5,4,520532);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (6,4,543691);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,4,579703);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,4,618729);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,4,654786);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,4,687459);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,4,732052);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,4,747580);

INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (1,5,443044);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (2,5,468550);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (3,5,489151);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (4,5,515524);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (5,5,516019);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (6,5,586678);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,5,612415);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,5,643294);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,5,678181);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,5,714970);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,5,760519);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,5,808562);

INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (1,6,479647);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (2,6,500892);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (3,6,532831);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (4,6,555977);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (5,6,587965);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (6,6,617654);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,6,652188);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,6,691769);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,6,731265);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,6,781217);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,6,827340);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,6,860258);

INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (1,7,525258);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (2,7,549207);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (3,7,574958);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (4,7,606311);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (5,7,635427);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (6,7,667976);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,7,705590);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,7,743140);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,7,790649);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,7,832552);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,7,879576);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,7,1016262);

INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (1,8,576393);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (2,8,610183);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (3,8,641778);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (4,8,676889);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (5,8,718868);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (6,8,760982);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,8,813796);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,8,864193);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,8,920084);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,8,990306);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,8,1055171);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,8,109122);

INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (1,9,642535);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (2,9,672883);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (3,9,710031);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (4,9,745654);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (5,9,783042);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (6,9,831022);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,9,875574);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,9,923693);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,9,984395);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,9,1045771);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,9,1113035);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,9,1190218);

INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (7,10,1008075);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (8,10,1060017);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (9,10,1094583);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (10,10,1187812);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (11,10,1216164);
INSERT INTO GrilleSalaire (GradeProfessionnel,categorie,SalaireMin) VALUES (12,10,1266399);

CREATE VIEW GrilleSalaireMin as
SELECT CategorieProfessionnel.Categorie as Categorie,reference as GradeProfessionnel, salaireMin ,GrilleSalaire.GradeProfessionnel as idGrad,GrilleSalaire.categorie as idcat
from CategorieProfessionnel join GrilleSalaire 
on CategorieProfessionnel.idcat=GrilleSalaire.categorie
join GradeProfessionnel on GradeProfessionnel.idGrad=GrilleSalaire.GradeProfessionnel;

select * from GrilleSalaireMin;
