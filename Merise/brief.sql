#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: clients
#------------------------------------------------------------

CREATE TABLE clients(
        client_id        Int  Auto_increment  NOT NULL ,
        nom              Varchar (255) NOT NULL ,
        prenom           Varchar (255) NOT NULL ,
        email            Text NOT NULL ,
        telephone        Text NOT NULL ,
        adresse          Text ,
        client_createdAt TimeStamp NOT NULL ,
        client_updatedAt TimeStamp NOT NULL
	,CONSTRAINT clients_PK PRIMARY KEY (client_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: compte_bancaire
#------------------------------------------------------------

CREATE TABLE compte_bancaire(
        compte_id        Int  Auto_increment  NOT NULL ,
        RIB              Text NOT NULL ,
        Type_compte      Varchar (255) NOT NULL ,
        Solde_initial    Decimal NOT NULL ,
        compte_createdAt TimeStamp NOT NULL ,
        compte_updatedAt TimeStamp NOT NULL ,
        client_id        Int NOT NULL
	,CONSTRAINT compte_bancaire_PK PRIMARY KEY (compte_id)

	,CONSTRAINT compte_bancaire_clients_FK FOREIGN KEY (client_id) REFERENCES clients(client_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contrats
#------------------------------------------------------------

CREATE TABLE Contrats(
        contrat_id        Int  Auto_increment  NOT NULL ,
        type_contrat      Varchar (255) NOT NULL ,
        montant           Decimal NOT NULL ,
        duree             Decimal NOT NULL ,
        contrat_createdAt TimeStamp NOT NULL ,
        contrat_updatedAt TimeStamp NOT NULL ,
        client_id         Int NOT NULL
	,CONSTRAINT Contrats_PK PRIMARY KEY (contrat_id)

	,CONSTRAINT Contrats_clients_FK FOREIGN KEY (client_id) REFERENCES clients(client_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: administrateur
#------------------------------------------------------------

CREATE TABLE administrateur(
        admin_id        Int  Auto_increment  NOT NULL ,
        admin_name      Varchar (255) NOT NULL ,
        admin_password  Varchar (255) NOT NULL ,
        admin_createdAt TimeStamp NOT NULL ,
        admin_updatedAt TimeStamp NOT NULL
	,CONSTRAINT administrateur_PK PRIMARY KEY (admin_id)
)ENGINE=InnoDB;