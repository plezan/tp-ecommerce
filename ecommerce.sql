#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

USE ecommerce;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        user_id        int (11) Auto_increment  NOT NULL ,
        user_grade     Bool DEFAULT 0,
        user_email     Varchar (254) ,
        user_firstName Varchar (32) ,
        user_lastName  Varchar (32) ,
        user_password  Varchar (254) ,
        PRIMARY KEY (user_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: article
#------------------------------------------------------------

CREATE TABLE article(
        art_id          int (11) Auto_increment  NOT NULL ,
        art_name        Varchar (64) NOT NULL ,
        art_description Varchar (64) ,
        art_price       Decimal (6,2) ,
        art_note        Int ,
        order_id        Int ,
        cat_id          Int ,
        PRIMARY KEY (art_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE category(
        cat_id   int (11) Auto_increment  NOT NULL ,
        cat_name Varchar (32) NOT NULL ,
        PRIMARY KEY (cat_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: order
#------------------------------------------------------------

CREATE TABLE ordering(
        order_id     int (11) Auto_increment  NOT NULL ,
        order_date   Datetime NOT NULL ,
        order_adress Varchar (254) NOT NULL ,
        order_city   Varchar (64) NOT NULL ,
        order_zip    Varchar (5) NOT NULL ,
        user_id      Int ,
        PRIMARY KEY (order_id )
)ENGINE=InnoDB;

ALTER TABLE article ADD CONSTRAINT FK_article_order_id FOREIGN KEY (order_id) REFERENCES ordering(order_id);
ALTER TABLE article ADD CONSTRAINT FK_article_cat_id FOREIGN KEY (cat_id) REFERENCES category(cat_id);
ALTER TABLE ordering ADD CONSTRAINT FK_ordering_user_id FOREIGN KEY (user_id) REFERENCES user(user_id);
