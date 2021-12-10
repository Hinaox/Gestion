create table demande (
    id int auto_increment primary key,
    label varchar(150), 
    quantite float,
    unite varchar(50),
    idDepartement int,
    etat varchar(10),
    foreign key (idDepartement) references departement(idDepartement)
);

create table Fournisseur (
    idFournisseur int,
    addresse varchar(150),
    tel varchar(150),
    mail varchar(100),
    nomFournisseurstat
);



/*create table proformat(
    id varchar(10) primary key,
    dateValidite date,
    label varchar(150),
    quantité float,
    prix float,
    nomFournisseur 
);*/

create table demandeGrouper(
    idDemandeGrouper int auto_increment primary key
    label varchar(150),
    quantite float
);

create table detailDemandeGrouper(
    idDemandeGrouper int,
    idDemande int,
    foreign key (idDemandeGrouper) references demandeGrouper(idDemandeGrouper),
    foreign key (idDemande) references demande(id)  
);

select dem.idDepartement,label,nom,quantite,unite,etat from demande dem
    join departement dep on dep.idDepartement = dem.idDepartement

