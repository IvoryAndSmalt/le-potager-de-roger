#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user     Int  Auto_increment  NOT NULL ,
        nom         Varchar (255) NOT NULL ,
        prenom      Varchar (255) NOT NULL ,
        adresse     Varchar (255) NOT NULL ,
        code_postal Smallint NOT NULL ,
        commune     Varchar (255) NOT NULL ,
        statut      Varchar (255) ,
        latitude    Double NOT NULL ,
        longitude   Double NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categories
#------------------------------------------------------------

CREATE TABLE categories(
        id_categorie Int  Auto_increment  NOT NULL ,
        type         Varchar (255) NOT NULL
	,CONSTRAINT categories_PK PRIMARY KEY (id_categorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: offres
#------------------------------------------------------------

CREATE TABLE offres(
        id_offre      Int  Auto_increment  NOT NULL ,
        url_photo     Varchar (5) NOT NULL ,
        commentaire   Varchar (255) NOT NULL ,
        date_creation Date NOT NULL ,
        id_user       Int NOT NULL
	,CONSTRAINT offres_AK UNIQUE (id_user)
	,CONSTRAINT offres_PK PRIMARY KEY (id_offre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users_offres
#------------------------------------------------------------

CREATE TABLE users_offres(
        id_offre Int NOT NULL ,
        id_user  Int NOT NULL
	,CONSTRAINT users_offres_PK PRIMARY KEY (id_offre,id_user)

	,CONSTRAINT users_offres_offres_FK FOREIGN KEY (id_offre) REFERENCES offres(id_offre)
	,CONSTRAINT users_offres_users0_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: offres_categories
#------------------------------------------------------------

CREATE TABLE offres_categories(
        id_offre     Int NOT NULL ,
        id_categorie Int NOT NULL
	,CONSTRAINT offres_categories_PK PRIMARY KEY (id_offre,id_categorie)

	,CONSTRAINT offres_categories_offres_FK FOREIGN KEY (id_offre) REFERENCES offres(id_offre)
	,CONSTRAINT offres_categories_categories0_FK FOREIGN KEY (id_categorie) REFERENCES categories(id_categorie)
)ENGINE=InnoDB;

