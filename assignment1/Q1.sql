CREATE TYPE Sex AS ENUM ('M', 'F');
CREATE TYPE Dept AS ENUM ('CSE','EE','ME','CE','CHE','MSE','BSBE','MTH','PHY','CHM','ECO','IME','AE','MME','MDES','NETP','LT','HSS','EEM');

CREATE TYPE Prog AS ENUM ('BTech', 'MTech', 'MDes', 'MBA', 'MSc', 'PhD');
CREATE TYPE Hall AS ENUM ('1','2','3','4','5','7','8','9','10','GH1','GH2','SBRA');
CREATE TYPE DayName AS Enum ('Mon','Tue','Wed','Thu','Fri');
CREATE TYPE LetterGrade AS Enum('A','A*','B','C','D','E','F','X','S');

CREATE TABLE Student(
RollNo  varchar(8) CONSTRAINT pk Primary Key,
Name varchar(40) NOT NULL,
HallNo Hall NOT NULL,
RoomNo varchar(4) NOT NULL,
Gender Sex NOT NULL,
Program Prog NOT NULL,
Department Dept NOT NULL
);

CREATE TABLE Course(
CourseNo varchar(10) NOT NULL CONSTRAINT ckey PRIMARY KEY,
Title varchar(30) NOT NULL,
Syllabus text
);

CREATE TABLE PreReqTable(
CourseNo varchar(10) NOT NULL REFERENCES Course(CourseNo),
PreReq varchar(10) NOT NULL REFERENCES Course(CourseNo),
Primary Key(CourseNo,PreReq)
);

CREATE TABLE Faculty(
EmpNo varchar(5) NOT NULL,
Name varchar(40) NOT NULL,
Gender Sex NOT NULL,
OffBldg varchar(20),
RoomNo varchar(8),
Department Dept NOT NULL,
PRIMARY KEY(EmpNo)
);

CREATE TABLE Course_Offering(
CourseNo varchar(10) NOT NULL REFERENCES Course(CourseNo),
Semester smallint NOT NULL,
Acad_Year varchar(7) NOT NULL,
LectureHrs numeric(2,1) NOT NULL,
TutHrs numeric(2,1) NOT NULL,
LabHrs numeric(2,1) NOT NULL,
Units smallint NOT NULL CHECK(Units>0),
Primary Key(CourseNo,Semester,Acad_Year)
);

CREATE TABLE Instructor(
EmpNo varchar(5) NOT NULL REFERENCES Faculty(EmpNo),
CourseNo varchar(10) NOT NULL,
Semester smallint NOT NULL,
Acad_Year varchar(7) NOT NULL,
Primary Key(EmpNo,CourseNo,Semester,Acad_Year),
Foreign Key (CourseNo,Semester,Acad_Year) REFERENCES Course_Offering(CourseNo,Semester,Acad_Year)
);

CREATE TABLE Registration(
RollNo varchar(8) NOT NULL REFERENCES Student(RollNo),
CourseNo varchar(7) NOT NULL,
Semester smallint NOT NULL, 
Acad_Year varchar(7) NOT NULL,
Regn_Type varchar(10) NOT NULL CHECK(Regn_Type in('repeat','substitute','normal')),
Course_Type varchar(10) NOT NULL CHECK(Course_Type in('COMPULSORY','DE','OE','SE','HSS')),
Primary Key (RollNo, CourseNo, Acad_Year,Semester),
Foreign Key (CourseNo,Semester,Acad_Year) REFERENCES Course_Offering(CourseNo,Semester,Acad_Year)
);

CREATE TABLE Grade_Points(
Letter_Grade LetterGrade NOT NULL PRIMARY KEY,
Points smallint CHECK(Points in(0,2,4,6,8,10))
);

CREATE TABLE Time_Table(
CourseNo varchar(7) NOT NULL, 
Semester smallint NOT NULL, 
Acad_Year varchar(7) NOT NULL,
Meeting_Type varchar(4) NOT NULL CHECK(Meeting_Type in('Lec','Tut','Lab')),
Start_Time time NOT NULL,
Duration interval NOT NULL,
Day DayName NOT NULL,
Location varchar(10) NOT NULL,
Primary Key(CourseNo,Semester,Acad_Year,Meeting_Type),
Foreign Key (CourseNo,Semester,Acad_Year) REFERENCES Course_Offering(CourseNo,Semester,Acad_Year)
);

CREATE TABLE Grade(
RollNo varchar(8) NOT NULL REFERENCES Student(RollNo),
CourseNo varchar(7) NOT NULL,
Semester smallint NOT NULL,
Acad_Year varchar(7) NOT NULL,
Grade LetterGrade NOT NULL REFERENCES Grade_Points(Letter_Grade),
PRIMARY KEY(RollNo,CourseNo,Semester,Acad_Year),
Foreign Key (CourseNo,Semester,Acad_Year) REFERENCES Course_Offering(CourseNo,Semester,Acad_Year)
);
