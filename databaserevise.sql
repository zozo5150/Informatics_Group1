DROP TABLE IF EXISTS Paycheck;
DROP TABLE IF EXISTS Hours;
DROP TABLE IF EXISTS Jobs;
DROP TABLE IF EXISTS Employer;
DROP TABLE IF EXISTS Users;

CREATE TABLE Users
(
	UserID INT AUTO_INCREMENT,
	LastName varchar(255), 
	FirstName varchar(255),
	email varchar(255), 
	hashedPass varchar(255), 
	UserPerm tinyint,
	PRIMARY KEY (UserID)
); 


CREATE TABLE Employer
(
	EmployerID INT AUTO_INCREMENT, 
	employer varchar(255), 
	employerCity varchar(255), 
	employerState varchar(255), 
	employerAddress varchar(255), 
	employerZip int,
	PRIMARY KEY (EmployerID) 
); 

-- Advice: the foreign key EmployerID isn't available yet because the
-- EMployer table is further down this file. Reorder tables so that the
-- tables you refer to elsewhere occur first: Employee, Employer, Jobs, Hours, aycheck, etc.
CREATE TABLE Jobs
(
	JobID INT AUTO_INCREMENT, 
	UserID INT NOT NULL,
	EmployerID int, 
	Wage decimal(4,2),
	PRIMARY KEY (JobID),
	FOREIGN KEY (UserID) REFERENCES Users(UserID), 
	FOREIGN KEY (EmployerID) REFERENCES Employer(EmployerID)
);	

CREATE TABLE Hours
( 
	UserID INT, 
	hourID INT AUTO_INCREMENT, 
	hoursReported decimal(4,2), 
	workDate date, 
	PRIMARY KEY (hourID), 
	FOREIGN KEY (UserID) REFERENCES Users(UserID)
); 

CREATE TABLE Paycheck 
(
	PaycheckID INT AUTO_INCREMENT, 
	PaycheckHours decimal(4,2),
	PayStart date, 
	PayEnd date, 
	AmountPaid decimal(5,2), 
	PRIMARY KEY (PaycheckID)
--	FOREIGN KEY (hourID) REFERENCES Hours(hourID)
); 
