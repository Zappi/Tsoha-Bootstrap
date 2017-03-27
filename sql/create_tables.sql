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
    name varchar(20) NOT NULL
);

CREATE TABLE Receipe (
    id SERIAL PRIMARY KEY,
    member_id INTEGER REFERENCES Member(id),
    category_id INTEGER REFERENCES Category(id),
    name varchar(30) NOT NULL,
    method varchar(4000) NOT NULL,
    addTime TIMESTAMP,
    username varchar(15) NOT NULL
);

CREATE TABLE Review (
    member_id INTEGER REFERENCES Member(id),
    receipe_id INTEGER REFERENCES Receipe(id),
    username varchar(15) NOT NULL,
    addTime TIMESTAMP,
    message varchar(400) NOT NULL
);

CREATE TABLE Ingredient (
    id SERIAL PRIMARY KEY,
    name varchar(25) NOT NULL,
    amount varchar(10)
);

CREATE TABLE ReceipeIngredient (
    receipe_id INTEGER REFERENCES Receipe(id),
    ingredient_id INTEGER REFERENCES Ingredient(id)
);