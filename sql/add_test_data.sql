-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Member (username, password, email) VALUES ('Mikko', 'Mallikas', 'testi@gmail.com');
INSERT INTO Member (username, password, email) VALUES ('Kimmo', 'Kulmikas', 'kimmokulmikas@gmail.com');

INSERT INTO Ingredient (name, amount) VALUES ('Kananmuna', '2kpl');
INSERT INTO Ingredient (name, amount) VALUES ('Maksa', '500g');

INSERT INTO Recipe (name, addtime, method, username) VALUES ('Maksalaatikko', now(), 'Sekoita ja paista uunissa','Zappi');
INSERT INTO Recipe (name, addtime, method, username) VALUES ('Creme brule', now(), 'Kuumenna', 'Zappi');


INSERT INTO RecipeIngredient (recipe_id, ingredient_id) VALUES (1,1);
INSERT INTO RecipeIngredient (recipe_id, ingredient_id) VALUES (1,2);

