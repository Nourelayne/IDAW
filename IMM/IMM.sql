#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        login                    Varchar (25) NOT NULL ,
        age                      Int NOT NULL ,
        sexe                     Char (1) NOT NULL ,
        niveau_pratique_sportive Varchar (10) NOT NULL ,
        besoin_energetique       Int NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (login)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Aliment
#------------------------------------------------------------

CREATE TABLE Aliment(
        id_aliment      Int NOT NULL ,
        libelle_aliment Varchar (10) NOT NULL
	,CONSTRAINT Aliment_PK PRIMARY KEY (id_aliment)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Apport
#------------------------------------------------------------

CREATE TABLE Apport(
        id_apport      Int NOT NULL ,
        libelle_apport Char (5) NOT NULL
	,CONSTRAINT Apport_PK PRIMARY KEY (id_apport)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Noter
#------------------------------------------------------------

CREATE TABLE Noter(
        id_aliment Int NOT NULL ,
        login      Varchar (25) NOT NULL ,
        quantite   Float NOT NULL ,
        date       Date NOT NULL
	,CONSTRAINT Noter_PK PRIMARY KEY (id_aliment,login)

	,CONSTRAINT Noter_Aliment_FK FOREIGN KEY (id_aliment) REFERENCES Aliment(id_aliment)
	,CONSTRAINT Noter_Utilisateur0_FK FOREIGN KEY (login) REFERENCES Utilisateur(login)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Composer
#------------------------------------------------------------

CREATE TABLE Composer(
        id_aliment          Int NOT NULL ,
        id_aliment_Composer Int NOT NULL ,
        ratio               Float NOT NULL
	,CONSTRAINT Composer_PK PRIMARY KEY (id_aliment,id_aliment_Composer)

	,CONSTRAINT Composer_Aliment_FK FOREIGN KEY (id_aliment) REFERENCES Aliment(id_aliment)
	,CONSTRAINT Composer_Aliment0_FK FOREIGN KEY (id_aliment_Composer) REFERENCES Aliment(id_aliment)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contenir
#------------------------------------------------------------

CREATE TABLE Contenir(
        id_aliment Int NOT NULL ,
        id_apport  Int NOT NULL ,
        ratio      Float NOT NULL
	,CONSTRAINT Contenir_PK PRIMARY KEY (id_aliment,id_apport)

	,CONSTRAINT Contenir_Aliment_FK FOREIGN KEY (id_aliment) REFERENCES Aliment(id_aliment)
	,CONSTRAINT Contenir_Apport0_FK FOREIGN KEY (id_apport) REFERENCES Apport(id_apport)
)ENGINE=InnoDB;

