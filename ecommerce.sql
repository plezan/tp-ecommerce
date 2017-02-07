CREATE DATABASE ecommerce;
CREATE TABLE article(
    article_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARYKEY,
    article_name VARCHAR(128),
    article_prix DECIMAL(10,2) UNSIGNED,
    article_dateMiseVente DATETIME,
    
);

ALTER TABLE articles ADD CONSTRAINT FK_appartiens_article_id FOREIGN KEY (article_id) REFERENCES appartiens(article_id);