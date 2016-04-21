-- Get rid of any old data by resetting the table
DROP TABLE IF EXISTS Paycheck;



CREATE TABLE Paycheck 
(
    PaycheckID INT AUTO_INCREMENT, 
	JobID INT,
	PaycheckHours decimal(4,2),
	PayStart date, 
	PayEnd date, 
	AmountPaid decimal(5,2),
    PRIMARY KEY (PaycheckID),
	FOREIGN KEY (JobID) REFERENCES Jobs(JobID)
) ENGINE=InnoDB;


-- Add some sample data

INSERT INTO Paycheck(PaycheckID, JobID, PaycheckHours, PayStart, PayEnd, AmountPaid) VALUES ('Buffon', 'Gianluigi', 1, 'Italy');
INSERT INTO Paycheck(PaycheckID, JobID, PaycheckHours, PayStart, PayEnd, AmountPaid) VALUES ('Buffon', 'Gianluigi', 2, 'Italy');
INSERT INTO Paycheck(PaycheckID, JobID, PaycheckHours, PayStart, PayEnd, AmountPaid) VALUES ('Buffon', 'Gianluigi', 3, 'Italy');
