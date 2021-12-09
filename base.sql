
create table contact(
    idContact int not null auto_increment primary key,
    email varchar(50) not null,
    autre varchar(100)
);

INSERT INTO `contact` (`email`,`autre`)
VALUES
  ("gravida.non@nequenullam.org",null),
  ("malesuada.fames@morbi.edu",null),
  ("mi@utpharetra.co.uk",null),
  ("ligula.aliquam@magnisdis.co.uk",null),
  ("elit.pellentesque@eueleifend.org",null),
  ("morbi.neque@nonhendrerit.edu",null),
  ("ut.molestie@rutrumurna.org",null),
  ("non.vestibulum@euismod.com",null),
  ("rhoncus@sodalesmauris.net",null),
  ("enim.non@lectussitamet.ca",null),
  ("eros.non.enim@elitsedconsequat.org",null),
  ("montes.nascetur@ornarelibero.ca",null),
  ("consequat.nec.mollis@vulputateveliteu.org",null),
  ("libero.proin@vitaedolordonec.org",null),
  ("eros@sitametrisus.edu",null),
  ("non.enim@mi.net",null),
  ("nam.tempor@duismi.net",null),
  ("donec.consectetuer.mauris@vestibulummauris.net",null),
  ("cursus.integer.mollis@acarcu.ca",null),
  ("suspendisse.non.leo@amet.edu",null);

--misaraka le contact mobile sy le contact satria anaty contact ray mety misy numero maromaro
create table mobile(
    idMobile int not null auto_increment primary key,
    idContact int,
    numero int not null,
    foreign key (idContact) references contact(idContact) on delete cascade on update cascade
);
INSERT INTO `mobile` (`idContact`,`numero`)
VALUES
  (1,"0344526636"),
  (2,"0345788862"),
  (3,"0342326243"),
  (4,"0341858661"),
  (5,"034342585"),
  (6,"0348573662"),
  (7,"0346194367"),
  (8,"0342243155"),
  (9,"034282783"),
  (10,"0344737847"),
  (11,"0344255041"),
  (12,"034497705"),
  (13,"0342635633"),
  (14,"0341253961"),
  (15,"0344278357"),
  (16,"0342686872"),
  (17,"0345157172"),
  (18,"0346532812"),
  (19,"0342670372"),
  (20,"0347451215");

--reto zany ny info generale anle personne; ka na olona mbola tsy miasa ary dia efa manana profile eto
create table personne(
    idPersonne int not null auto_increment primary key,
    nom varchar(20),
    prenom varchar(20),
    dtn date,
    sexe char(1),
    adresse varchar(30),
    distance float,
    matrimonial varchar(20),
    idContact int,
    foreign key (idContact) references contact(idContact) on delete cascade on update cascade
);
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

---misy departement satria le poste anatinle orinasa manaraka organigramme

create table departement(
    idDepartement int not null auto_increment primary key,
    nom varchar(30),
    descri text
);
INSERT INTO `departement` (`idDepartement`,`nom`,`descri`)
VALUES
  (1,"administration generale","velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla"),
  (2,"ressource humaine","natoque penatibus et magnis"),
  (3,"production","Nunc mauris sapien, cursus in, hendrerit consectetuer,"),
  (4,"marketing et commercial","consectetuer ipsum nunc id enim. Curabitur"),
  (5,"financier","ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed");

create table poste(
    idPoste int not null auto_increment primary key,
    idDepartement int,
    nom varchar(50),
    descri text,
    constraint fk_poste_idDepartement foreign key (idDepartement) references departement(idDepartement)on delete cascade on update cascade
);
INSERT INTO `poste` (`idPoste`,`idDepartement`,`nom`,`descri`)
VALUES
  (1,1,"DG","rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam"),
  (2,2,"DRH","Aenean gravida nunc sed pede. Cum sociis natoque penatibus et"),
  (3,3,"Agent de conditionnement","mattis semper, dui lectus rutrum urna, nec luctus felis purus"),
  (4,4,"Directeur de la relation client","sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem"),
  (5,5,"Comptable","magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna.");

---------------------
--------------------- MIDITRA CV TSIKA ETO
---------------------

--- nosarahako tsara ny information tsotra fotsiny tsy ilaina en tant que employe de nataoko tanatinle cv anle olona
-- ka anatin'izany ny langue afaka resahany

create table langue(
    idLangue int not null auto_increment primary key,
    titre varchar(20)
);
INSERT INTO `langue` (`idLangue`,`titre`)
VALUES
  (1,"Malgache"),
  (2,"Francais"),
  (3,"Anglais"),
  (4,"Allemand"),
  (5,"Japonais"),
  (6,"Espagnol"),
  (7,"Russe"),
  (8,"Mandarin");

create table cv(
    idCV int not null auto_increment primary key,
    idPersonne int,
    constraint fk_cv_idPersonne foreign key (idPersonne) references personne(idPersonne),
    descriProfile text
);
INSERT INTO `cv` (`idCV`,`idPersonne`,`descriProfile`)
VALUES
  (1,1,"Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis"),
  (2,2,"ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra"),
  (3,3,"quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed"),
  (4,4,"a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo");

-- ity ilay grade anle diplome anle olona anaty cv
create table grade(
    idGrade int not null auto_increment primary key,
    titre varchar(20)
);
INSERT INTO `grade` (`idGrade`,`titre`)
VALUES
  (1,"1e annee"),
  (2,"2e annee"),
  (3,"3e annee"),
  (4,"4e annee"),
  (5,"5e annee");

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
INSERT INTO `diplome` (`idCV`,`idGrade`,`titre`,`etablissement`,`obtention`)
VALUES
  (1,4,"BACC","ITU", "07-20-2015"),
  (2,2,"MASTER","ESCA","01-07-2011"),
  (3,1,"MASTER","ISCAM","26-45-2011"),
  (4,3,"BACC","Ankatso","05-23-2015");


---ito le domaine anle experience ananany; de aza adino hoanle nanao cv fa tsy duré no mipetraka eo fa le date entre et sortie tamle orinasa niasany
create table domaine(
    idDomaine int not null auto_increment primary key,
    titre varchar(20),
    descri text
);
INSERT INTO `domaine` (`idDomaine`,`titre`,`descri`)
VALUES
  (1,"financier","neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis,"),
  (2,"communication","commodo auctor velit. Aliquam"),
  (3,"Science","Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper");

create table experience(
    idExperience int not null auto_increment primary key,
    idCV int,
    dateEntre date,
    dateSortie date,
    poste varchar(30),
    societe varchar(30),
    constraint fk_experience_idCV foreign key (idCV) references cv(idCV) on delete cascade on update cascade
);
INSERT INTO `experience` (`idCV`,`dateEntre`,`dateSortie`,`poste`,`societe`)
VALUES
  (1,"2018-09-11","2018-12-13","caissier","Jumbo score"),
  (1,"2019-01-30","2020-02-05","Comptable","BNI"),
  (3,"2020-12-27","2021-01-18","responsable marketing","Etoile color"),
  (4,"2018-05-20","2021-09-20","infirmiere","HJRA");

create table experience_domaine(
    idExperience int,
    idDomaine int,
    foreign key (idExperience) references experience(idExperience) on delete cascade on update cascade,
    foreign key (idDomaine) references domaine(idDomaine) on delete cascade on update cascade
);
INSERT INTO `experience_domaine` (`idExperience`,`idDomaine`)
VALUES
  (1,1),
  (2,1),
  (3,2),
  (4,3);


-- ity scolarite ity ilay cursus scolaire anle olona anaty cv
create table scolarite(
    idScolarite int not null auto_increment primary key,
    idCV int,
    dateEntre date,
    dateSortie date,
    etablissement varchar(30),
    constraint fk_scolarite_idCV foreign key (idCV) references cv(idCV) on delete cascade on update cascade
);
INSERT INTO `scolarite` (`idCV`,`dateEntre`,`dateSortie`,`etablissement`)
VALUES
  (1,"2012-08-11","2016-05-20","ITU"),
  (2,"2009-08-11","2014-05-20","ESCA"),
  (3,"2010-08-11","2014-05-20","ISCAM"),
  (4,"2014-08-11","2017-05-20","Ankatso");

--- ity le fifandraisanle cv sy le langue teo
create table cv_langue(
    idCV int,
    idLangue int,
    niveau float,
    foreign key (idCV) references cv(idCV) on delete cascade on update cascade,
    foreign key (idLangue) references langue(idLangue) on delete cascade on update cascade
);
INSERT INTO `cv_langue` (`idCV`,`idLangue`,`niveau`)
VALUES
  (1,1,10),
  (1,2,10),
  (1,3,9.5),
  (1,7,8),
  (2,1,10),
  (2,2,9),
  (2,3,7.5),
  (2,4,8),
  (2,6,7),
  (3,1,10),
  (3,2,10),
  (3,3,10),
  (3,8,4),
  (4,1,10),
  (4,2,6),
  (4,8,5);


--- ito le loisir mifanaraka amle tao amle formulaire ana cv iny [inforamtion tsy ilaina akory]
create table categorieLoisir(
    idCategorieLoisire int not null auto_increment primary key,
    categorie varchar(20)
);
INSERT INTO `categorieLoisir` (`categorie`)
VALUES
  ("sport"),
  ("culture"),
  ("musique"),
  ("electronique"),
  ("art");


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
--ity le competence personnel anle olona (specifique amin'ny olona iray) [information tsy nilaina akory]
create table competence(
    idCompetence int not null auto_increment primary key,
    idCV int,
    titre varchar(20),
    niveau float,
    foreign key (idCV) references cv(idCV) on delete cascade on update cascade
); 
-- ity ilay poste postulen'ilay olona anaty cv satria mety misy offre d'employe(idEmploye) on delete cascade on update cascade betsaka amle orinasa de mo te i-postule amna poste betsaka izy ao amle orinasa
---amzay mba tsy hisina redondance ana cv de tonga de eto fotsiny
create table cv_poste(
    idCV int,
    idPoste int,
    foreign key (idCV) references cv(idCV) on delete cascade on update cascade,
    foreign key (idPoste) references poste(idPoste) on delete cascade on update cascade
);
INSERT INTO `cv_poste` (`idCV`,`idPoste`)
VALUES
  (1,3),
  (2,2),
  (3,4),
  (4,3);

---------------------------
---------------------------MIITRA AMLE EMPLOYE NDRAY ISIKA ETO-------------
---------------------------

--tsy nfixeko tanatinle employé ilay salaire satria 1° information sensible, 2° mora ny manao retour en arrière
----rehefa le vao ampiditra salaire voalohany aloha (le olona vao n'embauchena) de ajanona null ilay idEmployé io de updatena fotsiny aveo
create table salaire(
    idSalaire int not null auto_increment primary key,
    idEmploye int,
    montant float,
    dateMiseEnPlace date
);
INSERT INTO `salaire` (`idSalaire`,`idEmploye`,`montant`,`dateMiseEnPlace`)
VALUES
  (1,1,5000000,"2021-02-12");

-- le idEmployé eto no matricule
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

INSERT INTO `employe` (`idEmploye`,`idPersonne` ,`idPoste`,`idSalaire`,`dateEmbauche`)
VALUES
  (1,3,4,1,"2021-02-15");

---- ity ilay enfant amle personne à charge ao amle calcule ana irsa
create table enfant (
    idEnfant int not null auto_increment primary key,
    idEmploye int,
    nom varchar(30),
    prenom varchar(30),
    dtn date,
    constraint fk_enfant_idEmploye foreign key (idEmploye) references employe(idEmploye)on delete cascade on update cascade
);

INSERT INTO `enfant` (`idEmploye`,`nom`,`prenom`,`dtn`)
VALUES
  (1,"Ella","Mimi","2019-03-14"),
  (1,"Elio","Mimi","2017-01-24");

----- pointage anle olona rehefa miasa
create table pointage (
    idPointage int not null auto_increment primary key,
    idEmploye int,
    datePointage date,
    duree float,
    constraint fk_pointage_idEmploye foreign key (idEmploye) references employe(idEmploye) on delete cascade on update cascade
);
INSERT INTO `pointage` (`idEmploye`,`datePointage`,`duree`)
VALUES
  (1,"2021-02-15",8),
  (1,"2021-02-16",8),
  (1,"2021-02-17",10),
  (1,"2021-02-18",12),
  (1,"2021-02-19",8),
  (1,"2021-02-20",9),
  (1,"2021-02-22",8),
  (1,"2021-02-23",7),
  (1,"2021-02-24",8),
  (1,"2021-02-28",9);

---- ity ilay irsa modifiena satria miova isan-atona ny irsa

create table irsa(
    idTranche int not null auto_increment primary key,
    label varchar(30),
    montantMin int,
    montantMax int,
    taux float
);
INSERT INTO `irsa` (`idTranche`,`label`,`montantMin`,`montantMax`,`taux`)
VALUES
  (1,"1e tranche",0,350000,0),
  (2,"2e tranche",350001,400000,5),
  (3,"3e tranche",400001,500000,10),
  (4,"4e tranche",500001,600000,15),
  (5,"5e tranche",600001,null,20);

---fiche de paie 
create table fichePaie(
    idFichePaie int not null auto_increment primary key,
    idEmploye int,
    dateMiseEnPlace date,
    irsa float,
    pc float,
    net float,
    foreign key (idEmploye) references employe(idEmploye) on delete cascade on update cascade
);


--- remunération en numéraire
--- le salaire fix io le salaire fix ary ihany
create table RN(
    idRN int not null auto_increment primary key,
    idFichePaie int,
    salaireFix float,
    prime float,
    foreign key (idFichePaie) references fichePaie(idFichePaie) on delete cascade on update cascade
);

---- le salaire variable anatinle RN ihany fa izy betsaka isaky ny RN
----- ny heur sup koa miditra ato amin'ny salaire variable ,,, fa ty mila ampidirina any amin'ny metier fa tsy eo amin'ny saisie formulaire satria resultat an'ny fanisana ny pointage
---- comission koa
create table salaireVariable(
    idSalaireVariable int not null auto_increment primary key,
    idRN int,
    libele varchar(30),
    montant float,
    foreign key (idRN) references RN(idRN) on delete cascade on update cascade
);

---- indemnite koa mbola anatin'ny RN sady mety misy maro anatinle RN

create table indemnite(
    idIndemnite int not null auto_increment primary key,
    idRN int,
    libele varchar(30),
    montant float,
    foreign key (idRN) references RN(idRN) on delete cascade on update cascade
);

----eto ndray miditra avantage en nature
create table categorieAN(
    idCategorieAN int not null auto_increment primary key,
    libele varchar(30),
    taux float
);
INSERT INTO `categorieAN` (`libele`,`taux`)
VALUES
  ("voiture",20),
  ("logement",50),
  ("nourriture",70),
  ("outils de communication",60);

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

-------------
-------------   ETO LE RESAKA AGENDA ----
-------------

--genre ato ny atao le date de test sy le date d'entretient
--nataoko global otranzao satria tsy voatery reny ihany ny evenement ao amle orinasa  


create table categorieEvenement(
    idCategorieEvenement int not null auto_increment primary key,
    label varchar(30)
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

create table evenement(
    idEvenement int not null auto_increment primary key,
    idCategorieEvenement int,
    label varchar(30),
    descri text,
    dateEvenement date,
    constraint fk_evenement_idCategorieEvenement foreign key (idCategorieEvenement) references categorieEvenement(idCategorieEvenement) on delete cascade on update cascade
);

INSERT INTO `evenement` (`idCategorieEvenement`,`label`,`descri`,`dateEvenement`)
VALUES
   (1,"test a l'entreprise","Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis","2021-02-05"),
   (2,"entretient d'embauche","Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis","2021-02-10");

---eto ny mametraka ny olona rehetra voakasik'ilay evenement ; nataoko olona satria mety ny employé no voakasika , fa mety koa oe le olona mbola vao mipostule

create table evenement_personne(
    idEvenement int,
    idPersonne int,
    foreign key (idEvenement) references evenement(idEvenement) on delete cascade on update cascade,
    foreign key (idPersonne) references personne(idPersonne) on delete cascade on update cascade
);

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

-----MODULE CONGE---------------------------------------------------------------------

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
    id int not null auto_increment primary key,
    idEmp int,
    motif varchar(10),
    dateDebut dateTime,
    dateFin dateTime,
    etat int,
    foreign key (idEmp) references employe(idEmploye),
    foreign key (motif) references motifConge(id)
);

-- raha miala amin'ny congé ny heure de travail any dia miditra ato ilay heure nalaina
create table retraitConge(
    id int not null auto_increment primary key,
    idEmp int,
    heure int,
    dateDiminution dateTime,
    foreign key (idEmp) references employe(idEmploye)
);

--données de test
insert into retraitConge values (null, 1, 1, '2021-12-02 00:00:00');
insert into retraitConge values (null, 1, 1, '2021-11-02 00:00:00');
insert into retraitConge values (null, 1, 1, '2019-12-02 00:00:00');

-- anciennete ana employe
create view empAnciente as select e.*,TIMESTAMPDIFF(year,dateEmbauche,NOW()) as years from employe e

insert into motifConge values ('M1','repos medical','non');
insert into motifConge values ('M2','evenement familial','non');
insert into motifConge values ('M3','conge parental','non');
insert into motifConge values ('M4','non justifie','oui');
insert into motifConge values ('M5','autre','oui');

-- congé nalain'ny olona tsirairay dans un intervalle de 4 ans satria 4ans = 90jours de congés 
create view congePris as (
    select id,idEmp , SUM(TIMESTAMPDIFF(hour,dateDebut,dateFin)) as nbJours 
    from historiqueConge 
    where TIMESTAMPDIFF(year,dateDebut,NOW())<=3 and etat=1
    group by idEmp 
);

create view heureEnMoins as(
    select ea.idEmploye, sum(heure) as heureMoins, "heure de travail pris sur conge" as remarque from retraitConge rc 
    join empAnciente ea on ea.idEmploye = rc.idEmp
    where TIMESTAMPDIFF(year,dateDiminution,NOW())<=MOD(years,4)

);

--etat de congé an'ny olona isaky ny 90j
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

create view EmployeConge AS
select hc.*,motifconge.description,motifconge.deductibilite,e.idPoste, e.idSalaire, e.dateEmbauche,p.nom,p.prenom,(timestampdiff(HOUR ,hc.dateDebut,hc.dateFin))as NbrHeure
from historiqueconge as hc
         join motifconge on hc.motif = motifconge.id
         join employe e on hc.idEmp = e.idEmploye
         join personne p on e.idPersonne = p.idPersonne
