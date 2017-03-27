-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Member (username, password, email) VALUES ('Mikko', 'Mallikas', 'testi@gmail.com');
INSERT INTO Member (username, password, email) VALUES ('Kimmo', 'Kulmikas', 'kimmokulmikas@gmail.com');

INSERT INTO Ingredient (name, amount) VALUES ('Kananmuna', '2kpl');

INSERT INTO Recipe (name, method, addTime, username) VALUES ('Maksalaatikko', 'Sekoita ja paista uunissa', current_date, 'Zappi');
INSERT INTO Recipe (name, method, addTime, username) VALUES ('Creme brule', 'Kuumenna', current_date, 'Zappi');