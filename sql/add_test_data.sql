-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Member (username, password, email) VALUES ('Mikko', 'Mallikas', 'testi@gmail.com');
INSERT INTO Member (username, password, email) VALUES ('Kimmo', 'Kulmikas', 'kimmokulmikas@gmail.com');

INSERT INTO Ingredient (name, amount) VALUES ('Kananmuna', '2kpl');

INSERT INTO Receipe (name, method, addTime, username) VALUES ('Maksalaatikko', 'Sekoita ja paista uunissa', CURRENT_TIMESTAMP, 'Zappi');
INSERT INTO Receipe (name, method, addTime, username) VALUES ('Creme brule', 'Kuumenna', CURRENT_TIMESTAMP, 'Zappi');