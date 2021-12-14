
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



