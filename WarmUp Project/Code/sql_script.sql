
-- Person
CREATE TABLE Person (
    medicare_no CHAR(12) PRIMARY KEY, -- ex. BAMU35460294
    first_name VARCHAR(32),
    last_name VARCHAR(32),
    telephone VARCHAR(20),
    address VARCHAR(32),
    city VARCHAR(20),
    province VARCHAR(20),
    postal_code VARCHAR(7),
    email VARCHAR(32),
    citizenship VARCHAR(32),
    date_of_birth DATE, -- yyyy-mm-dd
    age_group INTEGER
);

CREATE TABLE Vaccination (
    medicare_no CHAR(12), -- ex. BAMU35460294
    dose_no INTEGER,
    date DATE,
    location_name VARCHAR(32),
    company VARCHAR(32), 
    PRIMARY KEY (medicare_no, dose_no)
);

CREATE TABLE Vaccine (
    company VARCHAR(32) PRIMARY KEY,
    status VARCHAR(9), -- either SAFE or SUSPENDED
    suspension_date DATE,
    approval_date DATE
);

CREATE TABLE Public_Health_Facility (
    location_name VARCHAR(32) PRIMARY KEY,
    address VARCHAR(32),
    type VARCHAR(32), -- type (Hospital, clinic or special installment) 
    website VARCHAR(32),
    telephone VARCHAR(20)
);

CREATE TABLE Infection (
    medicare_no CHAR(12),
    date_of_infection DATE,
    PRIMARY KEY (medicare_no, date_of_infection)
);

CREATE TABLE Age_Group (
    group_num INTEGER PRIMARY KEY,
    status VARCHAR(16)
);

-- Table population
/* 
INSERT INTO Person(first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group) 
VALUES (); 

INSERT INTO Vaccinaton(medicare_no, dose_no, date, location_name, company) 
VALUES (); 

INSERT INTO Vaccine(company, status, suspension_date, approval_date) 
VALUES (); 

INSERT INTO Public_Health_Facility(location_name, address, type, website, telephone) 
VALUES (); 

INSERT INTO Infection(medicare_no, date_of_infection) 
VALUES (); 

INSERT INTO Age_Group(group_num, status) 
VALUES (); 
*/


-- ALTER TABLE table_name MODIFY column_name varchar(new_length);
ALTER TABLE Public_Health_Facility MODIFY location_name varchar(64);
ALTER TABLE Public_Health_Facility MODIFY address varchar(64);
ALTER TABLE Public_Health_Facility MODIFY website varchar(255);
ALTER TABLE Vaccinaton RENAME TO Vaccination;
ALTER TABLE Vaccination MODIFY location_name varchar(64);


-- i. Get details of all the people who got vaccinated at least one dose 
-- and are of group ages 4 to 10 (first-name, last-name, date of birth, email, phone, city, date of vaccination, vaccination type, been infected by COVID-19 before or not).
SELECT first_name, last_name, date_of_birth, email, Person.telephone, Person.city, Vaccination.date AS "Date of Vaccination", Vaccination.company, date_of_infection
FROM Person, Vaccination
WHERE (age_group >= 4) AND
        (Person.medicare_no = Vaccination.medicare_no)

SELECT first_name, last_name, date_of_birth, email, Person.telephone, Person.city, Vaccination.date AS "Date of Vaccination", Vaccination.company
FROM Person, Vaccination
WHERE (age_group >= 4) AND
        (Person.medicare_no = Vaccination.medicare_no)

-- ii. Get details of all the Vaccination facilities in Québec (name, 
-- address, phone number, web address, type).
SELECT location_name, address, telephone, website, type
FROM Public_Health_Facility;

-- iii. Get details of all the people who got vaccinated at the
-- Olympic Stadium in Montréal in January 2021 (first-name, 
-- last-name, date of birth, email, phone, city, date of vaccination, 
-- type of vaccination, group age).
SELECT first_name, last_name, date_of_birth, Person.email, Person.telephone, city, Vaccination.date AS "Date of Vaccination", Vaccination.company AS "Type of Vaccine", Person.age_group
FROM Person, Vaccination
WHERE (Vaccination.location_name = 'Stade Olympique') AND
        (Vaccination.medicare_no = Person.medicare_no) AND
        (YEAR(date) = 2021) AND
       	(MONTH(date) = 01);
        


-- iv. Provide a description of all the vaccinations used in Québec
-- (Name of the vaccination, date of approval of the vaccination, 
-- current status of the vaccination, total number of people 
-- vaccinated with the vaccination).
SELECT Vaccination.company, Vaccine.approval_date, Vaccine.status, COUNT(Vaccination.company) AS "Total # vaccinated"
FROM Vaccination, Vaccine
WHERE Vaccination.company = Vaccine.company
GROUP BY Vaccination.company;




-- v. Get details of all the people who got vaccinated with a 
-- vaccination that is currently suspended (first-name, last-name,
-- date of birth, email, phone, city, date of vaccination, vaccination
-- type, date of suspension of the vaccination).
SELECT first_name, last_name, date_of_birth, email, Person.telephone, city, Vaccination.date AS "Date of Vaccination", Vaccination.company, suspension_date
FROM Person, Vaccination, Vaccine
WHERE (Person.medicare_no = Vaccination.medicare_no) AND
		(Vaccine.status = 'SUSPENDED') AND 
		(Vaccine.company = Vaccination.company);


-- vi. Provide a report of people who got vaccinated by city in 
-- all the cities in the province of Québec. The report should 
-- include the city name and the number of people vaccinated in each city.
SELECT Person.city, COUNT(Person.medicare_no) AS "Number of Vaccinations" 
FROM Person, Vaccination
WHERE (Person.province = 'Quebec') AND
        (Person.medicare_no = Vaccination.medicare_no)
GROUP BY Person.city;


INSERT INTO Person(medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group) 
VALUES ('98010237', 'Spencer', 'Wheatley', '4386240410', '1950 Rue de Sofia', 'Laval', 'Quebec', 'H7M 4H9', 'WheatS@gmail.com', 'Canadian', '1987-03-04', 6); 

INSERT INTO Person(medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group) 
VALUES ('98020949', 'Abu', 'Harmon', '4385050977', '705 Rue de Maricourt', 'Longueuil', 'Quebec', 'J4H 2S5', 'Harmon@hotmail.com', 'Canadian', '1988-02-03', 6);

INSERT INTO Person(medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group) 
VALUES ('98039000', 'Zakir', 'Robin', '5146204567', '755 Rue Guilbault', 'Longueuil', 'Quebec', 'J4H 2V4', 'Rokir@gmail.com', 'Canadian', '1989-03-01', 6);

INSERT INTO Person(medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group) 
VALUES ('98039112', 'Ophelia', 'Workman', '5143185689', '285 Rue Joseph Huet', 'Boucherville', 'Quebec', 'J4B 2C5', 'opheliawman@gmail.com', 'Canadian', '1985-07-24', 6); 

INSERT INTO Person(medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group) 
VALUES ('98219970', 'Tobi', 'Mcgowan', '4386891110', '555 Rue Grant', 'Longueuil', 'Quebec', 'J4H 3J3', 'tobitoby@gmail.com', 'Canadian', '1986-12-02', 6);

INSERT INTO Person(medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group) 
VALUES ('98220102', 'Kaine', 'Christensen', '5146859207', '256 Rue Rue le Baron', 'Boucherville', 'Quebec', 'J4B 2E2', 'kaine@gmail.com', 'Canadian', '1987-06-23', 6); 

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(37048975,'Vicki','Ryan',4186406672,'1440 Boulevard Cremazie','Quebec','Quebec','G1R 1B8','Ryan316@gmail.com','Canadian','1952-05-12',5);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(97332106, 'Gladys','Bryant',4186832578,'2029 Saskatchewan Dr','Quebec','Quebec','S4P 3Y2','Bryant220@gmail.com','France','1985-12-22',3);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(10771597,'Iestyn','Burgess',4182994135,'3636 avenue de Port-Royal', 'Bonaventure', 'Quebec','G0C 1E0','Burgess540@gmail.com','Canadian','1957-01-31',6);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(40814003,'Annabelle','Kidd',8194699301,'4284 rue Saint-Antoine','Drummondville','Quebec','J2C 7A8','Kidd537@gmail.com','Canadian','1955-01-11',3);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(13379289,'Judith','Markham',8193761807,'4106 rue Saint-Édouard','Trois Rivieres','Quebec','G9A 5S8','Markham723@gmail.com','Canadian','1984-03-04',9);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(23954590,'Faiz','Franklin',5142508757,'2320 Duke Street','Montreal','Quebec','H3C 5K4','Franklin809@gmail.com','Canadian','1967-01-15',6);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(56034647,'Gertrude','Dalton',8199832462,'937 rue des Églises Est','St Andre Avellin','Quebec','J0V 1W0','Dalton928@gmail.com','American','2010-11-12',7);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(48850269,'Jace','Mendez',8196350626,'1618 Thurston Dr','Hull','Quebec','K1A 0C9','Mendez307@gmail.com','Canadian','1990-01-12',9);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(54716917,'Mina','Cannon',8198275196,'780 rue des Églises Est','Chelsea','Quebec','J0X 1N0','Cannon134@gmail.com','Canadian','2001-05-26',7);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(48112992,'Shelly','Martins',8194264926,'3619 rue des Églises Est','St Emile Du Suffolk','Quebec','J0V 1Y0','Martins528@gmail.com','Canadian','1994-12-15',6);

INSERT INTO Person (medicare_no, first_name, last_name, telephone, address, city, province, postal_code, email, citizenship, date_of_birth, age_group)
VALUES(45820234,'Steve','Jones',5145695369,'446 rue Le Pailleur','Montreal','Quebec','J3D 8P9','Jones@hotmail.com','Canadian','1998-08-05',4);
      


INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company) 
VALUES ('98010237', 1, '2021-01-04', 'Stade Olympique', 'Moderna');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company) 
VALUES ('98020949', 1, '2021-01-05', 'Stade Olympique', 'Pfizer'); 

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company) 
VALUES ('98039000', 1, '2021-01-07', 'Stade Olympique', 'Pfizer'); 

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company) 
VALUES ('98039112', 1, '2021-01-08', 'Stade Olympique', 'Pfizer'); 

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company) 
VALUES ('98219970', 1, '2021-01-11', 'Stade Olympique', 'Moderna'); 

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company) 
VALUES ('98220102', 1, '2021-01-12', 'Stade Olympique', 'Pfizer'); 

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(37048975,1,'2020-05-31','CLSC de Motton Bay','AstraZeneca');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(97332106,1,'2020-05-21','Université de Montréal','Moderna');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(10771597,1,'2020-04-13','Université de Montréal','Pfizer');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(40814003,1,'2020-04-08','Carrefour LaBaie Sept-Îles','Moderna');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(13379289,1,'2020-05-29','Stade Olympique','AstraZeneca');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(23954590,1,'2020-04-25','Les Basques','Pfizer');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(10771597,2,'2020-07-11','Site de vaccination de Blainville','Moderna');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(48850269,1,'2020-04-30','Les Basques','AstraZeneca');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(54716917,1,'2020-05-18','Carrefour LaBaie Sept-Îles','Moderna');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(48112992,1,'2020-04-15','CLSC de Motton Bay','Pfizer');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(23954590,2,'2020-06-21','Stade Olympique','Moderna');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(97332106,2,'2020-06-29','Carrefour LaBaie Sept-Îles','Pfizer');

INSERT INTO Vaccination(medicare_no, dose_no, date, location_name, company)
VALUES(40814003,2,'2020-07-09','Stade Olympique','Moderna');


INSERT INTO Vaccine(company, status, approval_date)
VALUES ('Pfizer', 'SAFE', '2020-12-22');

INSERT INTO Vaccine(company, status, approval_date)
VALUES('Moderna', 'SAFE', '2021-01-16');

INSERT INTO Vaccine(company, status, suspension_date, approval_date)
VALUES ('AstraZeneca', 'SUSPENDED', '2021-05-06', '2021-03-01');


INSERT INTO Public_Health_Facility(location_name, address, `type`,website, telephone)
VALUES('Clinique de vaccination d’Ahuntsic','800 boulevard Henri-Bourassa Ouest','Clinic','https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543617',8195550116);

INSERT INTO Public_Health_Facility (location_name, address, `type`, website, telephone)
VALUES('Stade Olympique','4545 avenue Pierre-de-Coubertin','Special','https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543618',4385550156);

INSERT INTO Public_Health_Facility (location_name, address,`type`,website,telephone)
VALUES('Carrefour LaBaie Sept-Îles', '391, avenue Brochu','Special','https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543619',4185550149);

INSERT INTO Public_Health_Facility (location_name, address,`type`, website, telephone)
VALUES('CLSC Saint-Paul', '321 boulevard Bonne-Espérance', 'Clinic', 'https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543620', 8195550179);

INSERT INTO Public_Health_Facility (location_name, address ,`type` ,website ,telephone )
VALUES('Site de vaccination de Blainville', '820 Boulevard Curé-Labelle', 'Special', 'https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543621',8195550133);

INSERT INTO Public_Health_Facility (location_name, address,`type`,website,telephone)
VALUES('Les Basques', '145 rue de l''Aréna', 'Special','https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543622',8195550185);

INSERT INTO Public_Health_Facility (location_name, address, `type`, website, telephone)
VALUES('Site de vaccination de Nicolet', '316 rue Frère Dominique', 'Hospital', 'https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543623',4185550116);

INSERT INTO Public_Health_Facility (location_name, address, `type`, website, telephone)
VALUES ('Université de Montréal', '1375, avenue Thérèse-Lavoie-Roux', 'Special', 'https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543624',8195550164);

INSERT INTO Public_Health_Facility (location_name, address, `type`, website, telephone)
VALUES('CMSSS de Fermont', '1, rue de l''Aquilon', 'Hospital', 'https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543625',4385550141);

INSERT INTO Public_Health_Facility (location_name, address, `type`, website, telephone)
VALUES('CLSC de Motton Bay', 'Motton Bay', 'Clinic', 'https://cdn-contenu.quebec.ca/cdn-contenu/sante/documents/Problemes_de_sante/covid-19/centres_de_vaccination_inscription_vaccins.pdf?1621543626',8195550164);


INSERT INTO Infection (medicare_no, date_of_infection)
VALUES(40814003,'2021-05-31');

INSERT INTO Infection (medicare_no, date_of_infection)
VALUES(48112992,'2020-05-05');


INSERT INTO Age_Group (group_num, status)
VALUES (1, 'INACTIVE');

INSERT INTO Age_Group (group_num, status)
VALUES(2, 'INACTIVE');

INSERT INTO Age_Group (group_num,status)
VALUES(3, 'INACTIVE');

INSERT INTO Age_Group (group_num, status)
VALUES(4, 'INACTIVE');

INSERT INTO Age_Group (group_num, status)
VALUES (5, 'INACTIVE');

INSERT INTO Age_Group (group_num, status)
VALUES(6, 'INACTIVE');

INSERT INTO Age_Group (group_num, status)
VALUES(7, 'INACTIVE');

INSERT INTO Age_Group (group_num, status)
VALUES(8, 'INACTIVE');

INSERT INTO Age_Group (group_num, status)
VALUES(9, 'ACTIVE');

INSERT INTO Age_Group (group_num, status)
VALUES (10, 'INACTIVE');
       
