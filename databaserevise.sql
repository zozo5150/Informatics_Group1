CREATE TABLE Employee
(
	EmployeeID INT NULL AUTO_INCREMENT,
	LastName varchar(255), 
	FirstName varchar(255),
	email varchar(255), 
	hashedPass varchar(255), 
	PRIMARY KEY (EmployeeID), 
/*	admin tinyint, */
); 

CREATE TABLE Jobs
(
	JobID INT NULL AUTO_INCREMENT, 
	EmployeeID INT NOT NULL,
	EmployerID int, 
	Wage decimal(4,2),
	PRIMARY KEY (JobID),
	FOREIGN KEY (EmployeeID), 
	FOREIGN KEY (EmployerID), 
);	

CREATE TABLE Paycheck 
(
	PaycheckID INT NULL AUTO_INCREMENT, 
	PaycheckHours decimal(4,2),
	PayStart varchar(255), 
	PayEnd varchar(255), 
	AmountPaid decimal(5,2), 
	PRIMARY KEY (PaycheckID),
	FOREIGN KEY (hoursID), 
); 

CREATE TABLE Employer
(
	EmployerID INT NULL AUTO_INCREMENT, 
	employer varchar(255), 
	employerCity varchar(255), 
	employerState varchar(255), 
	employerAddress varchar(255), 
	employerZip int,
	PRIMARY KEY (EmployerID), 
); 

CREATE TABLE Hours
( 
	EmployeeID INT, 
	hourID INT NULL AUTO_INCREMENT, 
	weekID INT NULL AUTO_INCREMENT, 
	hoursReported decimal(4,2), 
	days varchar(15), 
	PRIMARY KEY (hourID), 
	FOREIGN KEY (EmployeeID), 
); 

/* CREATE TABLE Admin
(
	adminID INT NULL AUTO_INCREMENT, 
	adminEmail varchar(255), 
	adminPass varchar(255), 
); */