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
        art_id   int (11) Auto_increment  NOT NULL ,
        order_id Int ,
        mod_id   Int ,
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
# Table: ordering
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


#------------------------------------------------------------
# Table: modeleArticle
#------------------------------------------------------------

CREATE TABLE modeleArticle(
        mod_id   int (11) Auto_increment  NOT NULL ,
        mod_name Varchar (64) NOT NULL ,
        mod_desc Text ,
        mod_price Decimal (6,2) ,
        cat_id   Int ,
        PRIMARY KEY (mod_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        com_id   int (11) Auto_increment  NOT NULL ,
        com_text Text ,
        com_note Int ,
        mod_id   Int ,
        user_id  Int ,
        PRIMARY KEY (com_id )
)ENGINE=InnoDB;

ALTER TABLE article ADD CONSTRAINT FK_article_order_id FOREIGN KEY (order_id) REFERENCES ordering(order_id);
ALTER TABLE article ADD CONSTRAINT FK_article_mod_id FOREIGN KEY (mod_id) REFERENCES modeleArticle(mod_id);
ALTER TABLE ordering ADD CONSTRAINT FK_ordering_user_id FOREIGN KEY (user_id) REFERENCES user(user_id);
ALTER TABLE modeleArticle ADD CONSTRAINT FK_modeleArticle_cat_id FOREIGN KEY (cat_id) REFERENCES category(cat_id);
ALTER TABLE comment ADD CONSTRAINT FK_comment_mod_id FOREIGN KEY (mod_id) REFERENCES modeleArticle(mod_id);
ALTER TABLE comment ADD CONSTRAINT FK_comment_user_id FOREIGN KEY (user_id) REFERENCES user(user_id);
