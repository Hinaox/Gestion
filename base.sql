
create table contact(
    idContact int not null auto_increment primary key,
    email varchar(50) not null,
    autre varchar(100)
);
--misaraka le contact mobile sy le contact satria anaty contact ray mety misy numero maromaro
create table mobile(
    idMobile int not null auto_increment primary key,
    idContact int,
    numero int not null,
    foreign key (idContact) references contact(idContact) on delete cascade on update cascade
);
--reto zany ny info generale anle personne; ka na olona mbola tsy miasa ary dia efa manana profile eto
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
    foreign key (idContact) references contact(idContact) on delete cascade on update cascade
);

---misy departement satria le poste anatinle orinasa manaraka organigramme

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

---------------------
--------------------- MIDITRA CV TSIKA ETO
---------------------

--- nosarahako tsara ny information tsotra fotsiny tsy ilaina en tant que employe de nataoko tanatinle cv anle olona
-- ka anatin'izany ny langue afaka resahany

create table langue(
    idLangue int not null auto_increment primary key,
    titre varchar(20)
);
create table cv(
    idCV int not null auto_increment primary key,
    idPersonne int,
    constraint fk_cv_idPersonne foreign key (idPersonne) references personne(idPersonne)
    descriProfile text
);
-- ity ilay grade anle diplome anle olona anaty cv
create table grade(
    idGrade int not nul auto_increment primary key,
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
---ito le domaine anle experience ananany; de aza adino hoanle nanao cv fa tsy duré no mipetraka eo fa le date entre et sortie tamle orinasa niasany
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

-- ity scolarite ity ilay cursus scolaire anle olona anaty cv
create table scolarite(
    idScolarite int not null auto_increment primary key,
    idCV int,
    dateEntre date,
    dateSortie date,
    etablissement varchar(30),
    constraint fk_scolarite_idCV foreign key (idCV) references cv(idCV) on delete cascade on update cascade
);
--- ity le fifandraisanle cv sy le langue teo
create table cv_langue(
    idCV int,
    idLangue int,
    niveau float,
    foreign key (idCV) references cv(idCV) on delete cascade on update cascade,
    foreign key (idLangue) references langue(idLangue) on delete cascade on update cascade
);
--- ito le loisir mifanaraka amle tao amle formulaire ana cv iny [inforamtion tsy ilaina akory]
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
    foreign key (idPost) references poste(idPoste) on delete cascade on update cascade
);

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
---- ity ilay enfant amle personne à charge ao amle calcule ana irsa
create table enfant (
    idEnfant int not null auto_increment primary key,
    idEmploye int,
    nom varchar(30),
    prenom varchar(30),
    dtn date,
    constraint fk_enfant_idEmploye foreign key (idEmploye) references employe(idEmploye)on delete cascade on update cascade
);
----- pointage anle olona rehefa miasa
create table pointage (
    idPointage int not null auto_increment primary key,
    idEmploye int,
    datePointage date,
    duree float,
    constraint fk_pointage_idEmploye foreign key (idEmploye) references employe(idEmploye) on delete cascade on update cascade
);
---- ity ilay irsa modifiena satria miova isan-atona ny irsa

create table irsa(
    idTranche int not null auto_increment primary key,
    label varchar(30),
    montantMin int,
    montantMax int,
    taux float
);
---fiche de paie 
create table fichePaie(
    idFichePaie int not null auto_increment primary key,
    idEmploye int,
    dateMiseEnPlace date,
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
create table evenement(
    idEvenement int not null auto_increment primary key,
    idCategorieEvenement int,
    label varchar(30),
    descri text,
    dateEvenement date,
    constraint fk_evenement_idCategorieEvenement foreign key (idCategorieEvenement) references categorieEvenement(idCategorieEvenement) on delete cascade on update cascade
);

---eto ny mametraka ny olona rehetra voakasik'ilay evenement ; nataoko olona satria mety ny employé no voakasika , fa mety koa oe le olona mbola vao mipostule

create table evenement_personne(
    idEvenement int,
    idPersonne int,
    foreign key (idEvenement) references evenement(idEvenement) on delete cascade on update cascade,
    foreign key (idPersonne) references personne(idPersonne) on delete cascade on update cascade
);

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