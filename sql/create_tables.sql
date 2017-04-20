-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Member (
    id SERIAL PRIMARY KEY,
    username varchar(15) NOT NULL,
    password varchar(15) NOT NULL,
    email varchar(40) NOT NULL,
    registered boolean DEFAULT FALSE,
    admin boolean DEFAULT FALSE
);

CREATE TABLE Category (
    id SERIAL PRIMARY KEY,
    categoryname varchar(20) NOT NULL
);

CREATE TABLE Recipe (
    id SERIAL PRIMARY KEY,
    member_id INTEGER REFERENCES Member(id),
    category_id INTEGER REFERENCES Category(id),
    name varchar(30) NOT NULL,
    addtime TIMESTAMP, 
    method varchar(4000) NOT NULL,
    username varchar(15) NOT NULL
);

CREATE TABLE Review (
    member_id INTEGER REFERENCES Member(id),
    recipe_id INTEGER REFERENCES Recipe(id),
    username varchar(15) NOT NULL,
    addtime TIMESTAMP,
    message varchar(400) NOT NULL
);

CREATE TABLE Ingredient (
    id SERIAL PRIMARY KEY,
    ingredientName varchar(25) NOT NULL
);

CREATE TABLE RecipeIngredient (
    recipe_id INTEGER REFERENCES Recipe(id),
    ingredient_id INTEGER REFERENCES Ingredient(id),
    amount varchar(10)
);