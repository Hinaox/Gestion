create table demande (
    id int auto_increment primary key,
    label varchar(150), 
    quantite float,
    unite varchar(50),
    idDepartement int,
    etat varchar(10),
    foreign key (idDepartement) references departement(idDepartement)
);

create table categorieFournisseur (
    idCateg int auto_increment primary key,
    label varchar(150)
);

insert into categorieFournisseur values (1,'quincaillerie');
insert into categorieFournisseur values (2,'pharmacie');
insert into categorieFournisseur values (3,'superMarche');
insert into categorieFournisseur values (4,'papeterie');

create table Fournisseur (
    idFournisseur int auto_increment primary key,
    nom varchar(150),
    addresse varchar(150),
    tel varchar(150),
    mail varchar(100),
    nif varchar(150),
    idCateg int,
    foreign key (idCateg) references categorieFournisseur(idCateg)
);

insert into Fournisseur values (null,'sanifer','tanjombato',null,null,123456,1);
insert into Fournisseur values (null,'pharmacie de tana','tanjombato',null,null,123456,2);
insert into Fournisseur values (null,'score','tanjombato',null,null,123456,3);
insert into Fournisseur values (null,'premier','tanjombato',null,null,123456,4);



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

insert into demandeGrouper values (null,'',)

create table detailDemandeGrouper(
    idDemandeGrouper int,
    idDemande int,
    foreign key (idDemandeGrouper) references demandeGrouper(idDemandeGrouper),
    foreign key (idDemande) references demande(id)  
);

insert into detailDemandeGrouper values('','');

select dem.idDepartement,label,nom,quantite,unite,etat from demande dem
    join departement dep on dep.idDepartement = dem.idDepartement


SELECT id,dem.idDepartement,label,nom,quantite,unite,etat 
FROM demande dem
    join departement dep on dep.idDepartement = dem.idDepartement 
WHERE id not in (select idDemande from detailDemandeGrouper)
order by etat

SELECT id,dem.idDepartement,label,nom,quantite,unite,etat FROM demande dem 
join departement dep on dep.idDepartement = dem.idDepartement
WHERE id not in (select idDemande from detailDemandeGrouper) order by etat

create view
select dg.*,d.* from demandeGrouper dg
join detailDemandeGrouper ddg on dg.idDemandeGrouper = ddg.idDemandeGrouper 
join demande d on d.id = ddg.idDemande

select * from demandeGrouper;
