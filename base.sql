
create table contact(
    idContact int not null auto_increment primary key,
    email varchar(50) not null,
    autre varchar(100)
);

create table mobile(
    idMobile int not null auto_increment primary key,
    idContact int,
    numero int not null,
    foreign key (idContact) references contact(idContact) on delete cascade on update cascade
);

create table personne(
    idPersonne int not null auto_increment primary key,
    nom varchar(20),
    prenom varchar(20),
    dtn date,
    sexe char(1),
    adresse varchar(30),
    distance float,
    matrimonial varchar(10),
    idContact int,
    photo varchar(300),
    foreign key (idContact) references contact(idContact) on delete cascade on update cascade
);

create table departement(
    idDepartement int not null auto_increment primary key,
    nom varchar(30),
    descri text
);

create table poste(
    idPoste int not null auto_increment primary key,
    idDepartement int,
    nom varchar(30),
    descri text,
    constraint fk_poste_idDepartement foreign key (idDepartement) references departement(idDepartement)on delete cascade on update cascade
);

create table langue(
    idLangue int not null auto_increment primary key,
    titre varchar(20)
);

create table cv(
    idCV int not null auto_increment primary key,
    idPersonne int,
    descriProfile text,
    constraint fk_cv_idPersonne foreign key (idPersonne) references personne(idPersonne)
    
);

create table grade(
    idGrade int not null auto_increment primary key,
    titre varchar(20)
);

create table diplome(
    idDiplome int not null auto_increment primary key,
    idCV int,
    idGrade int,
    titre varchar(20),
    etablissement varchar(30),
    obtention date,
    constraint fk_diplome_idCV foreign key (idCV) references cv(idCV) on delete cascade on update cascade,
    constraint fk_diplome_idGrade foreign key (idGrade) references grade(idGrade) on delete cascade on update cascade
);

create table domaine(
    idDomaine int not null auto_increment primary key,
    titre varchar(20),
    descri text
);
create table experience(
    idExperience int not null auto_increment primary key,
    idCV int,
    dateEntre date,
    dateSortie date,
    poste varchar(30),
    societe varchar(30),
    constraint fk_experience_idCV foreign key (idCV) references cv(idCV) on delete cascade on update cascade
);
create table experience_domaine(
    idExperience int,
    idDomaine int,
    foreign key (idExperience) references experience(idExperience) on delete cascade on update cascade,
    foreign key (idDomaine) references domaine(idDomaine) on delete cascade on update cascade
);

create table scolarite(
    idScolarite int not null auto_increment primary key,
    idCV int,
    dateEntre date,
    dateSortie date,
    etablissement varchar(30),
    constraint fk_scolarite_idCV foreign key (idCV) references cv(idCV) on delete cascade on update cascade
);

create table cv_langue(
    idCV int,
    idLangue int,
    niveau float,
    foreign key (idCV) references cv(idCV) on delete cascade on update cascade,
    foreign key (idLangue) references langue(idLangue) on delete cascade on update cascade
);

create table categorieLoisir(
    idCategorieLoisire int not null auto_increment primary key,
    categorie varchar(20)
);
create table loisir(
    idLoisir int not null auto_increment primary key,
    idCategorieLoisire int,
    pratique varchar(30),
    foreign key (idCategorieLoisire) references categorieLoisir(idCategorieLoisire) on delete cascade on update cascade
);
create table cv_loisir(
    idCV int,
    idLoisir int,
    foreign key (idCV) references cv(idCV) on delete cascade on update  cascade,
    foreign key (idLoisir) references loisir(idLoisir) on delete cascade on update cascade
);

create table competence(
    idCompetence int not null auto_increment primary key,
    idCV int,
    titre varchar(20),
    niveau float,
    foreign key (idCV) references cv(idCV) on delete cascade on update cascade
); 

create table cv_poste(
    idCV int,
    idPoste int,
    foreign key (idCV) references cv(idCV) on delete cascade on update cascade,
    foreign key (idPoste) references poste(idPoste) on delete cascade on update cascade
);

create table salaire(
    idSalaire int not null auto_increment primary key,
    idEmploye int,
    montant float,
    dateMiseEnPlace date
);

create table employe (
    idEmploye int not null auto_increment primary key,
    idPersonne int,
    idPoste int,
    idSalaire int,
    dateEmbauche date,
    constraint fk_employe_idPersonne foreign key (idPersonne) references personne(idPersonne)on delete cascade on update cascade,
    constraint fk_employe_idPoste foreign key (idPoste) references poste(idPoste)on delete cascade on update cascade,
    constraint fk_employe_idSalaire foreign key (idSalaire) references salaire(idSalaire)on delete cascade on update cascade
);

create table enfant (
    idEnfant int not null auto_increment primary key,
    idEmploye int,
    nom varchar(30),
    prenom varchar(30),
    dtn date,
    constraint fk_enfant_idEmploye foreign key (idEmploye) references employe(idEmploye)on delete cascade on update cascade
);

create table pointage (
    idPointage int not null auto_increment primary key,
    idEmploye int,
    dateDebut datetime,
    dateFin datetime,   
    constraint fk_pointage_idEmploye foreign key (idEmploye) references employe(idEmploye) on delete cascade on update cascade
);

create table heureSup(
    idHeureSup int not null auto_increment primary key,
    idEmploye int,
    dateDebut datetime,
    dateFin datetime,
    foreign key (idEmploye) references employe(idEmploye)
);

create table demande(
    idDemande int not null auto_increment primary key,
    idEmploye int,
    dateDebut datetime,
    dateFin datetime,
    foreign key (idEmploye) references employe(idEmploye)
);

create table demandeHeureSupEmploye(
    idDemande int,
    idEmploye int,
    foreign key (idDemande) references demande(idDemande),
    foreign key (idEmploye) references employe(idEmploye)
);

create table irsa(
    idTranche int not null auto_increment primary key,
    label varchar(30),
    montantMin int,
    montantMax int,
    taux float
);

create table fichePaie(
    idFichePaie int not null auto_increment primary key,
    idEmploye int,
    dateMiseEnPlace date,
    irsa float,
    pc float,
    net float,
    foreign key (idEmploye) references employe(idEmploye) on delete cascade on update cascade
);

create table RN(
    idRN int not null auto_increment primary key,
    idFichePaie int,
    salaireFix float,
    prime float,
    foreign key (idFichePaie) references fichePaie(idFichePaie) on delete cascade on update cascade
);


create table salaireVariable(
    idSalaireVariable int not null auto_increment primary key,
    idRN int,
    libele varchar(30),
    montant float,
    foreign key (idRN) references RN(idRN) on delete cascade on update cascade
);


create table indemnite(
    idIndemnite int not null auto_increment primary key,
    idRN int,
    libele varchar(30),
    montant float,
    foreign key (idRN) references RN(idRN) on delete cascade on update cascade
);

create table categorieAN(
    idCategorieAN int not null auto_increment primary key,
    libele varchar(30),
    taux float
);
create table AN(
    idAN int not null auto_increment primary key,
    idFichePaie int,
    idCategorieAN int,
    montant float,
    foreign key (idCategorieAN) references categorieAN(idCategorieAN) on delete cascade on update cascade,
    foreign key (idFichePaie) references fichePaie(idFichePaie) on delete cascade on update cascade
);
create table avance(
    idAvance int not null auto_increment primary key,
    idFichePaie int,
    libele varchar(30),
    montant float,
    foreign key (idFichePaie) references fichePaie(idFichePaie) on delete cascade on update cascade
);


create table categorieEvenement(
    idCategorieEvenement int not null auto_increment primary key,
    label varchar(30)
);
create table evenement(
    idEvenement int not null auto_increment primary key,
    idCategorieEvenement int,
    label varchar(30),
    descri text,
    dateEvenement date,
    constraint fk_evenement_idCategorieEvenement foreign key (idCategorieEvenement) references categorieEvenement(idCategorieEvenement) on delete cascade on update cascade
);

create table evenement_personne(
    idEvenement int,
    idPersonne int,
    foreign key (idEvenement) references evenement(idEvenement) on delete cascade on update cascade,
    foreign key (idPersonne) references personne(idPersonne) on delete cascade on update cascade
);

INSERT INTO `categorieEvenement` (`idCategorieEvenement`,`label`)
VALUES
   (1,"test"),
   (2,"entretient"),
  (3,"conference"),
  (4,"team building"),
  (5,"ferie"),
  (6,"lancement de produit"),
  (7,"exposition");


INSERT INTO `evenement` (`idCategorieEvenement`,`label`,`descri`,`dateEvenement`)
VALUES
   (1,"test a l'entreprise","Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis","2021-02-05"),
   (2,"entretient d'embauche","Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis","2021-02-10");


INSERT INTO personne (idPersonne,`nom`,`prenom`,`dtn`,`sexe`,`adresse`,`distance`,`matrimonial`,`idContact`)VALUES
  (1,"Lillith", "Pope","1981-03-12","F","970-3240 Nec Rd.",1,"Mariée",1),
  (2,"Kim", "Baxter","1981-03-12","F","Ap #862-3446 Phasellus Ave",6,"Celibataire",2),
  (3,"Tyrone", "Love","1981-03-12","M","1704 Purus, Av.",5,"Marié",3),
  (4,"Philip", "West","1981-03-12","M","8340 Nisl. Street",9,"Marié",4),
  (5,"Lance", "Crane","1981-03-12","F","335-3726 Malesuada Rd.",0,"Mariée",5),
  (6,"Dahlia", "Olsen","1981-03-12","F","466-9537 Nec, St.",7,"Veuve",6),
  (7,"Amethyst", "Patterson","1981-03-12","M","999-6773 Aliquam Av.",10,"Veuf",7),
  (8,"Frances", "Cleveland","1981-03-12","M","Ap #236-4383 In St.",1,"Celibataire",8),
  (9,"Odessa", "Leach","1981-03-12","F","Ap #580-7936 Malesuada Avenue",5,"Mariée",9),
  (10,"Wilma", "Rivera","1981-03-12","F","Ap #271-6542 Est. St.",2,"Veuve",10),
  (11,"Maggy", "Lindsey","1981-03-12","M","857-2139 Dolor Avenue",4,"Marié",11),
  (12,"Daria", "Roth","1981-03-12","F","174-8534 Enim. Road",4,"Celibataire",12),
  (13,"Ursa", "Jenkins","1981-03-12","M","481-6744 Pellentesque Av.",2,"Marié",13),
  (14,"Kiona", "Kirby","1981-03-12","M","P.O. Box 525, 8563 Auctor Street",4,"Veuf",14),
  (15,"Thomas", "Middleton","1981-03-12","M","571-530 Nec Rd.",10,"Marié",15),
  (16,"Marshall", "Juarez","1981-03-12","M","758-9471 Mus. Av.",4,"Celibataire",16),
  (17,"Signe", "Bartlett","1981-03-12","F","8706 Dui. Av.",1,"Mariée",17),
  (18,"Fatima", "Mccray","1981-03-12","M","857-2340 Non, Rd.",4,"Veuf",18),
  (19,"Gage", "Norman","1981-03-12","M","6895 Orci St.",8,"Celibataire",19),
  (20,"Angela", "Gomez","1981-03-12","F","207-4603 Tellus, Ave",7,"Mariée",20);


INSERT INTO `employe` (`idEmploye`,`idPersonne`,`idPoste`,`idSalaire`,`dateEmbauche`)
VALUES (2,2,4,1,"2021-12-03");
  (1,3,4,1,"2021-02-15");

INSERT INTO `evenement_personne` (`idEvenement`,`idPersonne`)
VALUES
(1,1),
(2,1);

-- les vues
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
;