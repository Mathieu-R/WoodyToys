CREATE TABLE produits(id serial PRIMARY KEY, nom varchar(30) UNIQUE, prix int);
INSERT INTO produits(nom, prix) VALUES ('train', 10), ('mini-vélo', 50), ('toupie', 3), ('cerf-volant', 1);
