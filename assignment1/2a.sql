ALTER TABLE Student DROP CONSTRAINT pk CASCADE;
ALTER TABLE Student DROP COLUMN RollNo;
ALTER TABLE Registration DROP COLUMN RollNo;
ALTER TABLE Grade DROP COLUMN RollNo;
ALTER TABLE Student ADD COLUMN Email varchar(20) NOT NULL;
ALTER TABLE Registration ADD COLUMN Email varchar(20) NOT NULL;
ALTER TABLE Grade ADD COLUMN Email varchar(20) NOT NULL;


ALTER TABLE Student ADD CONSTRAINT pk PRIMARY KEY (Email);
ALTER TABLE Registration ADD CONSTRAINT fk1 FOREIGN KEY (Email) REFERENCES Student(Email);
ALTER TABLE Grade ADD CONSTRAINT fk2 FOREIGN KEY (Email) REFERENCES Student(Email);

CREATE TABLE Student_Detail(
RollNo varchar(8) NOT NULL,
Email varchar(20) NOT NULL REFERENCES Student(Email),
Primary Key(Email,RollNo)
);
