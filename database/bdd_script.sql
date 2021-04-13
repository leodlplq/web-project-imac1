#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: CLIENT
#------------------------------------------------------------

CREATE TABLE CLIENT(
        idClient     Int NOT NULL ,
        nomClient    Char (80) NOT NULL ,
        prenomClient Char (80) NOT NULL ,
        mdpClient    Char (80) NOT NULL ,
        mailClient   Char (80) NOT NULL
	,CONSTRAINT CLIENT_PK PRIMARY KEY (idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COMMANDE
#------------------------------------------------------------

CREATE TABLE COMMANDE(
        idCommande   Int NOT NULL ,
        dateCommande Date NOT NULL ,
        idClient     Int NOT NULL
	,CONSTRAINT COMMANDE_PK PRIMARY KEY (idCommande)

	,CONSTRAINT COMMANDE_CLIENT_FK FOREIGN KEY (idClient) REFERENCES CLIENT(idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: INGREDIENTS
#------------------------------------------------------------

CREATE TABLE INGREDIENTS(
        idIngredient   Int NOT NULL ,
        nomIngredient  Char (80) NOT NULL ,
        typeIngredient Char (80) NOT NULL ,
        prixIngredient Int NOT NULL
	,CONSTRAINT INGREDIENTS_PK PRIMARY KEY (idIngredient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PIZZA
#------------------------------------------------------------

CREATE TABLE PIZZA(
        idPizza  Int NOT NULL ,
        nomPizza Char (80) ,
        existe   Bool NOT NULL
	,CONSTRAINT PIZZA_PK PRIMARY KEY (idPizza)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DESSERT
#------------------------------------------------------------

CREATE TABLE DESSERT(
        idDessert   Int NOT NULL ,
        nomDessert  Char (80) NOT NULL ,
        prixDessert Int NOT NULL
	,CONSTRAINT DESSERT_PK PRIMARY KEY (idDessert)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: BOISSON
#------------------------------------------------------------

CREATE TABLE BOISSON(
        idBoisson   Int NOT NULL ,
        nomBoisson  Char (80) NOT NULL ,
        prixBoisson Int NOT NULL
	,CONSTRAINT BOISSON_PK PRIMARY KEY (idBoisson)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: INGREDIENT_PIZZA
#------------------------------------------------------------

CREATE TABLE INGREDIENT_PIZZA(
        idPizza      Int NOT NULL ,
        idIngredient Int NOT NULL ,
        nbIngredient Int NOT NULL
	,CONSTRAINT INGREDIENT_PIZZA_PK PRIMARY KEY (idPizza,idIngredient)

	,CONSTRAINT INGREDIENT_PIZZA_PIZZA_FK FOREIGN KEY (idPizza) REFERENCES PIZZA(idPizza)
	,CONSTRAINT INGREDIENT_PIZZA_INGREDIENTS0_FK FOREIGN KEY (idIngredient) REFERENCES INGREDIENTS(idIngredient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CONTIENT_PIZZA
#------------------------------------------------------------

CREATE TABLE CONTIENT_PIZZA(
        idCommande Int NOT NULL ,
        idPizza    Int NOT NULL ,
        nbPizza    Int NOT NULL
	,CONSTRAINT CONTIENT_PIZZA_PK PRIMARY KEY (idCommande,idPizza)

	,CONSTRAINT CONTIENT_PIZZA_COMMANDE_FK FOREIGN KEY (idCommande) REFERENCES COMMANDE(idCommande)
	,CONSTRAINT CONTIENT_PIZZA_PIZZA0_FK FOREIGN KEY (idPizza) REFERENCES PIZZA(idPizza)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CONTIENT_BOISSON
#------------------------------------------------------------

CREATE TABLE CONTIENT_BOISSON(
        idCommande Int NOT NULL ,
        idBoisson  Int NOT NULL ,
        nbBoisson  Int NOT NULL
	,CONSTRAINT CONTIENT_BOISSON_PK PRIMARY KEY (idCommande,idBoisson)

	,CONSTRAINT CONTIENT_BOISSON_COMMANDE_FK FOREIGN KEY (idCommande) REFERENCES COMMANDE(idCommande)
	,CONSTRAINT CONTIENT_BOISSON_BOISSON0_FK FOREIGN KEY (idBoisson) REFERENCES BOISSON(idBoisson)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CONTIENT_DESSERT
#------------------------------------------------------------

CREATE TABLE CONTIENT_DESSERT(
        idCommande Int NOT NULL ,
        idDessert  Int NOT NULL ,
        nbDessert  Int NOT NULL
	,CONSTRAINT CONTIENT_DESSERT_PK PRIMARY KEY (idCommande,idDessert)

	,CONSTRAINT CONTIENT_DESSERT_COMMANDE_FK FOREIGN KEY (idCommande) REFERENCES COMMANDE(idCommande)
	,CONSTRAINT CONTIENT_DESSERT_DESSERT0_FK FOREIGN KEY (idDessert) REFERENCES DESSERT(idDessert)
)ENGINE=InnoDB;

