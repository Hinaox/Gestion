
CREATE TABLE Offre(
    idOffre integer NOT NULL  primary key  AUTO_INCREMENT,
    Poste varchar(255) NOT NULL,
    description varchar(500) NOT NULL,
    responsabilite varchar(500) NOT NULL,
    ageMin integer NOT NULL,
    idDiplomeOffre integer not null,
    Experiences varchar(500) ,
    AutreExperience varchar(500),
    dateLimite date

);

 insert into Poste(idDepartement,nom,descri) VALUES
 (NUll,'Directeur General','Directeur generale'),
 (NULL,'Secretariat General','Secretaire general de l entreprises'),
 (3,'Directeur de Production','Chargees de production'),
 (3,'Logistique','Responsable logistique'),
 (3,'Usine1','Chargee de l usine 1'),
 (3,'Usine2','Chargee de l usine 2'),
 (5,'Directeur Financier','Directeur Financier'),
 (5,'Paie','Responsable payement cappitaux'),
 (5,'Comptabilite','Responsable des comptes'),
 (5,'Controle de Gestion','Controlleur de compte'),
 (2,'Directeur des RH','Chargees des ressources humaines'),
 (2,'Recrutement','Chargee de Recrutement'),
 (2,'Gestion du personnel','Chargee gestion du peronnel'),
 (4,'Directeur Commercial','Directeur commerciale'),
 (4,'SAV','SAV'),
 (5,'Marketing','Chargee de Marketing'),
 (6,'Produit','Chargee de produit'),
 (1,'Directeur Admin. et Juridique','Directeur Admin. et Juridique'),
 (1,'Administration','Administration'),
 (1,'Audit interne','Audit interne'),
 (1,'Service juridique','Service juridique');

insert into Employe(idPersonne,idPoste,idSalaire,dateEmbauche) values
(1,1,1,'2012-02-12'),
(2,2,1,'2012-02-12'),
(3,3,1,'2012-02-12'),
(4,4,1,'2012-02-12'),
(5,5,1,'2012-02-12'),
(6,6,1,'2012-02-12'),
(7,7,1,'2012-02-12'),
(8,8,1,'2012-02-12'),
(9,9,1,'2012-02-12'),
(10,10,1,'2012-02-12'),
(11,11,1,'2012-02-12'),
(12,12,1,'2012-02-12'),
(13,13,1,'2012-02-12'),
(14,14,1,'2012-02-12'),
(15,15,1,'2012-02-12'),
(16,16,1,'2012-02-12'),
(17,17,1,'2012-02-12'),
(18,18,1,'2012-02-12'),
(19,19,1,'2012-02-12'),
(20,20,1,'2012-02-12'),
(21,21,1,'2012-02-12');


select Poste, PosteSup,Categorie,Personne.nom,prenom from Organigramme join Poste
on Poste.nom = Organigramme.Poste 
join Personne 
on Personne.idPersonne = Poste.idPoste
join categorieProfessionnel
on categorieProfessionnel.idCat=Organigramme.idCategorie; 
