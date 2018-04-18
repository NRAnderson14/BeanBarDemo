CREATE DATABASE bean_bar;
USE bean_bar;

CREATE TABLE Growers (
  Grower_ID INT PRIMARY KEY AUTO_INCREMENT,
  First_Name VARCHAR(255),
  Last_Name VARCHAR(255),
  Location VARCHAR(255) NOT NULL,
  Farm_Name VARCHAR(255) NOT NULL,
  Short_Desc TINYTEXT,
  Long_Desc TEXT,
  Approved BOOLEAN NOT NULL DEFAULT FALSE,
  Date_Submitted TIMESTAMP
);

CREATE TABLE Coffees (
  Coffee_ID INT PRIMARY KEY AUTO_INCREMENT,
  Grower_ID INT,
  FOREIGN KEY (Grower_ID)
  REFERENCES Growers(Grower_ID),
  Coffee_Name VARCHAR(255) NOT NULL,
  Roast VARCHAR(255) NOT NULL,
  Caffeination VARCHAR(255) NOT NULL,
  Short_Desc TINYTEXT,
  Long_Desc TEXT,
  Approved BOOLEAN NOT NULL DEFAULT FALSE,
  Date_Submitted TIMESTAMP
);

CREATE TABLE Stores (
  Store_ID INT PRIMARY KEY AUTO_INCREMENT,
  Store_Name VARCHAR(255) NOT NULL,
  Location VARCHAR(255) NOT NULL
);

CREATE TABLE Carries (
  Store_ID INT,
  FOREIGN KEY (Store_ID)
  REFERENCES Stores(Store_ID),
  Coffee_ID INT,
  FOREIGN KEY (Coffee_ID)
  REFERENCES Coffees(Coffee_ID)
);


CREATE VIEW Submitted_Growers AS
  SELECT * FROM Growers
  WHERE Approved = FALSE;

CREATE VIEW Approved_Growers AS
  SELECT * FROM Growers
  WHERE Approved = TRUE;

CREATE VIEW Submitted_Coffees AS
  SELECT * FROM Coffees
  WHERE Approved = FALSE;

CREATE VIEW Approved_Coffees AS
  SELECT * FROM Coffees
  WHERE Approved = TRUE;