-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Member (username, password, email) VALUES ('Mikko', 'Mallikas', 'testi@gmail.com');
INSERT INTO Member (username, password, email) VALUES ('Kimmo', 'Kulmikas', 'kimmokulmikas@gmail.com');

INSERT INTO Ingredient (ingredientName) VALUES ('Kananmuna');
INSERT INTO Ingredient (ingredientName) VALUES ('Jauheliha');
INSERT INTO Ingredient (ingredientName) VALUES ('Maito');
INSERT INTO Ingredient (ingredientName) VALUES ('Jauhot');
INSERT INTO Ingredient (ingredientName) VALUES ('Kana');

INSERT INTO Member (username, password, email, registered, admin) VALUES ('Zappi', 'jeejee', 'jerry@zappi.fi', true, true);


INSERT INTO Recipe (name, addtime, method, username) VALUES ('Maksalaatikko', CURRENT_TIMESTAMP, 'Sekoita ja paista uunissa','Zappi');
INSERT INTO Recipe (name, addtime, method, username) VALUES ('Creme brule', CURRENT_TIMESTAMP, 'Kuumenna', 'Zappi');

INSERT INTO RecipeIngredient (recipe_id, ingredient_id, amount) VALUES (1,1, '2kpl');
INSERT INTO RecipeIngredient (recipe_id, ingredient_id, amount) VALUES (1,2, '400g');

