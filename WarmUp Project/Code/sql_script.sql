
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

       