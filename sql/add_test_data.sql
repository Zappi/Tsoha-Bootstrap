-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Member (username, password, email) VALUES ('Mikko', 'Mallikas', 'testi@gmail.com');
INSERT INTO Member (username, password, email) VALUES ('Kimmo', 'Kulmikas', 'kimmokulmikas@gmail.com');

INSERT INTO Ingredient (ingredientName) VALUES ('Maito');
INSERT INTO Ingredient (ingredientName) VALUES ('Jauhot');
INSERT INTO Ingredient (ingredientName) VALUES ('Kananmuna');
INSERT INTO Ingredient (ingredientName) VALUES ('Jauheliha');
INSERT INTO Ingredient (ingredientName) VALUES ('Kana');
INSERT INTO Ingredient (ingredientName) VALUES ('Peruna');
INSERT INTO Ingredient (ingredientName) VALUES ('Pasta');
INSERT INTO Ingredient (ingredientName) VALUES ('Salaatti');
INSERT INTO Ingredient (ingredientName) VALUES ('Paprika');
INSERT INTO Ingredient (ingredientName) VALUES ('Tomaatti');
INSERT INTO Ingredient (ingredientName) VALUES ('Vesi');
INSERT INTO Ingredient (ingredientName) VALUES ('Pasta');
INSERT INTO Ingredient (ingredientName) VALUES ('Kerma');
INSERT INTO Ingredient (ingredientName) VALUES ('Tofu');
INSERT INTO Ingredient (ingredientName) VALUES ('Soija');
INSERT INTO Ingredient (ingredientName) VALUES ('Riisi');


INSERT INTO Category (categoryname) VALUES ('Alkuruoat');
INSERT INTO Category (categoryname) VALUES ('Pääruoat');
INSERT INTO Category (categoryname) VALUES ('Salaatit');
INSERT INTO Category (categoryname) VALUES ('Välipalat');
INSERT INTO Category (categoryname) VALUES ('Lisukkeet');
INSERT INTO Category (categoryname) VALUES ('Leivonnaiset');
INSERT INTO Category (categoryname) VALUES ('Jälkiruoat');


INSERT INTO Member (username, password, email, registered, admin) VALUES ('Zappi', 'jeejee', 'jerry@zappi.fi', true, true);


INSERT INTO Recipe (category_id, name, addtime, method, username) VALUES (2, 'Maksalaatikko', CURRENT_TIMESTAMP, 'Sekoita ja paista uunissa','Zappi');

INSERT INTO RecipeIngredient (recipe_id, ingredient_id, amount) VALUES (1,1, '2kpl');
INSERT INTO RecipeIngredient (recipe_id, ingredient_id, amount) VALUES (1,2, '400g');

