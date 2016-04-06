CREATE TABLE Users
(
	UserID INT NULL AUTO_INCREMENT,
	LastName varchar(255), 
	FirstName varchar(255),
	email varchar(255), 
	hashedPass varchar(255), 
	PRIMARY KEY (UserID) 
	UserPerm tinyint
); 

CREATE TABLE Employer
(
	EmployerID INT NULL AUTO_INCREMENT, 
	employer varchar(255), 
	employerCity varchar(255), 
	employerState varchar(255), 
	employerAddress varchar(255), 
	employerZip int,
	PRIMARY KEY (EmployerID) 
); 

-- Advice: the foreign key EmployerID isn't available yet because the
-- EMployer table is further down this file. Reorder tables so that the
-- tables you refer to elsewhere occur first: Employee, Employer, Jobs, Hours, Paycheck, etc.
CREATE TABLE Jobs
(
	JobID INT NULL AUTO_INCREMENT, 
	EmployeeID INT NOT NULL,
	EmployerID int, 
	Wage decimal(4,2),
	PRIMARY KEY (JobID),
	FOREIGN KEY (UserID) REFERENCES Users(UserID), 
	FOREIGN KEY (EmployerID) REFERENCES Employer(EmployerID)
);	

CREATE TABLE Hours
( 
	EmployeeID INT, 
	hourID INT NULL AUTO_INCREMENT, 
	hoursReported decimal(4,2), 
	workDate date, 
	PRIMARY KEY (hourID), 
	FOREIGN KEY (UserID) REFERENCES Users(UserID)
); 

CREATE TABLE Paycheck 
(
	PaycheckID INT NULL AUTO_INCREMENT, 
	PaycheckHours decimal(4,2),
	PayStart date, 
	PayEnd date, 
	AmountPaid decimal(5,2), 
	PRIMARY KEY (PaycheckID),
	FOREIGN KEY (hoursID) REFERENCES Hours(hoursID)
); 


-- Advice: convert weekly reports from employee into multiple individual
-- days, meaning you can lose weekID and stick to hourID where each record
-- represents a single date.

-- Advice: use DATE or TIMESTAMP (or similar) datatype for all calendar 
-- entries here and also in Paycheck. You will find it easier to compare
-- dates using the builtin type.


-- Decide how to do permissions/authentication. You have two types of
-- users, Employees and Admins. Having two different types of tables
-- is one approach, and it is simple and clean. Alternatively, give 
-- everyone an entry in the EMployee table -- there's nothing special
-- about it (what makes one an employee is having an entry in the Jobs
-- table!). This is even simpler, but you might want to rename the table
-- User or similar, since it is no longer an Employee only.

-- The other thing you'll need is some sort of authentication/permission 
-- system. Use a TINYINT to specify what permissions each user might have.
-- so for example 0=root, 1=nfp employee, 2=employee or maybe something
-- more fine grained if you need it 0=roo 1=nfp manager 2=nfp employee 
-- 3=employee and so on. You need to ask yourselves what types of things
-- each differnt kind of login is entitled to do.

-- I would use the TINYINT in the User (or EMployee) table, and it should
-- default to the lowest level of access (usually the highest integer you
-- allow).


-- CREATE TABLE Admin
-- (
--	adminID INT NULL AUTO_INCREMENT, 
--	adminEmail varchar(255), 
--	adminPass varchar(255), 
-- ); 