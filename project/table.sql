CREATE TYPE Department AS ENUM ('CSE','EE','ME','CE','CHE','MSE','BSBE','MTH','PHY','CHM','ECO','IME','AE','MME','MDES','NETP','LT','HSS','EEM');

CREATE TYPE Hall AS ENUM ('1','2','3','4','5','7','8','9','10','GH1','GH2','SBRA');
﻿CREATE TYPE Bgroup AS ENUM ('A+', 'A-','B+','B-','AB+','AB-','O+','O-');
﻿CREATE TYPE Opinion AS ENUM ('Yes', 'No');
﻿

CREATE TABLE Students(
Email varchar(20) NOT NULL Primary Key,
RollNo  varchar(8) NOT NULL,
Name varchar(40) NOT NULL,
HallNo Hall NOT NULL,
RoomNo varchar(4) NOT NULL,
Dept Department NOT NULL,
AccNo varchar(15) NOT NULL,
GuardianName varchar(20) NOT NULL,
HomeAddr varchar(50) NOT NULL,
MessBill smallint,
CanteenBill smallint,
ShopBill smallint,
IP varchar(15),
PhoneNo varchar(10),
Laptop Opinion NOT NULL,
Courier Opinion NOT NULL
);

CREATE TABLE StudentIssues(
cid smallint NOT NULL Primary Key,
CompEmail varchar(20) NOT NULL REFERENCES Students(Email),
StudComplaint text NOT NULL
);


CREATE TABLE Employees(
EmpID smallint NOT NULL Primary Key,
Name varchar(40) NOT NULL,
EmpEmail varchar(20) NOT NULL,
AccNo varchar(15) NOT NULL,
Address varchar(50) NOT NULL,
PhoneNo varchar(10),
Designation varchar(20) NOT NULL,
);


CREATE TABLE EmpIssues(
ccid smallint NOT NULL Primary Key,
CompEmpID smallint NOT NULL REFERENCES Employees(EmpID),
EmpComplaint text NOT NULL
);

CREATE TABLE havethese(
Studcid smallint NOT NULL REFERENCES StudentIssues(cid) Primary Key,
StudEmail varchar(20) NOT NULL REFERENCES Students(Email)
);

CREATE TABLE have(
Empcid smallint NOT NULL REFERENCES EmpIssues(ccid) Primary Key,
EEmpID smallint NOT NULL REFERENCES Employees(EmpID)
);
