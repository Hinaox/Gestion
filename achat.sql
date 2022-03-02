create table demande (
    id int auto_increment primary key,
    label varchar(150), 
    quantite float,
    unite varchar(50),
    idDepartement int,
    etat varchar(10),
    foreign key (idDepartement) references departement(idDepartement)
);

update demande set etat = 'refuser' where id = '15';

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



create table proformat(
    id int auto_increment primary key,
    dateValidite date,
    label varchar(150),
    quantité float,
    prix float,
    idFournisseur int,
    foreign key (idFournisseur) references Fournisseur(idFournisseur) 
);



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

-- insert into detailDemandeGrouper values('','');


create table bonDeCommande(
    idBonDeCommande int auto_increment primary key,
    idProformat int,
    dateCommande dateTime,
    quantite float,
    delaiLivraison dateTime,
    foreign key (idProformat) references proformat(id)
);

select * from bonDeCommande

insert into bonDeCommande values (null,,'',,'');

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

select 
    idFournisseur,
    nom,
    addresse,
    tel,
    mail, -g
    nif,
    f.idCateg,
    label
from fournisseur f
    join categorieFournisseur cf on f.idCateg = cf.idCateg

create table livraison
(
	id int not null auto_increment primary key,
	dateLivraison dateTime,
	idBonDeCommande int,
	foreign key(idBonDeCommande) references bonDeCommande(idBonDeCommande)
);

create table produitDemander (
    id int not null auto_increment primary key,
    label varchar(100),
    validation int
);

delete from proformat;
delete from detailDemandeGrouper;

insert into produitDemander values (null,'stylo',1);
insert into produitDemander values (null,'papier',1);
insert into produitDemander values (null,'cache bouche',1);

alter table demande add column imobilisation int;

ALTER TABLE demande CHANGE imobilisation immobilisation int;

select d.id,prd.label as label,quantite,unite,etat,immobilisation,validation,idDepartement,d.id as idProduitDemander from 
demande d join produitDemander prd on prd.id=d.label

create view infoDemande as (select d.id,prd.label as label,quantite,unite,etat,immobilisation,validation,idDepartement,d.id as idProduitDemander from 
demande d join produitDemander prd on prd.id=d.label);

select id,label,sum(quantite) as quantite,unite,etat,immobilisation,idProduitDemander 
from infoDemande 
where validation='1' and etat='envoyer' group by label,etat; 


create or replace view demandeACommander as (select id,label,sum(quantite) as quantite,unite,etat,immobilisation,idProduitDemander 
from infoDemande 
where validation='1' and etat='envoye' group by label,etat);

create table immobilisation (
    id int not null auto_increment primary key,
    label varchar(150),
    dateAquisition date,
    ammortissement float,
    valeur float
);

insert into immobilisation values (null,'nissan l200','2020-01-01',5,5000000);
insert into immobilisation values (null,'imprimante','2020-01-01',5,2000000);



select *,valeur-valeur*(DATEDIFF( now(), dateAquisition )/365.25)/ammortissement as valeurActuelle from immobilisation i


create view valeurImmobilisation as (select *,valeur-valeur*(DATEDIFF( now(), dateAquisition )/365.25)/ammortissement as valeurActuelle,DATEDIFF( now(), dateAquisition )/365.25 as dureExpirer from immobilisation i);
select floor(DATEDIFF( now(), dateAquisition )/365.25) from immobilisation