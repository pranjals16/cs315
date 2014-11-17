ALTER TABLE Course DROP CONSTRAINT ckey CASCADE;
ALTER TABLE Course DROP COLUMN CourseNo CASCADE;
ALTER TABLE Course ADD CONSTRAINT tk PRIMARY KEY(Title);

ALTER TABLE Course_Offering DROP COLUMN CourseNo CASCADE;
ALTER TABLE Instructor DROP COLUMN CourseNo CASCADE;
ALTER TABLE Registration DROP COLUMN CourseNo CASCADE;
ALTER TABLE Time_Table DROP COLUMN CourseNo CASCADE;
ALTER TABLE Grade DROP COLUMN CourseNo CASCADE;
ALTER TABLE PreReqTable DROP COLUMN CourseNo CASCADE;
ALTER TABLE PreReqTable DROP COLUMN PreReq CASCADE;

ALTER TABLE PreReqTable ADD COLUMN Title varchar(30) NOT NULL REFERENCES Course(Title);
ALTER TABLE PreReqTable ADD COLUMN PreReqTitle varchar(30) NOT NULL REFERENCES Course(Title);
ALTER TABLE Course_Offering ADD COLUMN Title varchar(30) NOT NULL;
ALTER TABLE Instructor ADD COLUMN Title varchar(30) NOT NULL;
ALTER TABLE Registration ADD COLUMN Title varchar(30) NOT NULL;
ALTER TABLE Time_Table ADD COLUMN Title varchar(30) NOT NULL;
ALTER TABLE Grade ADD COLUMN Title varchar(30) NOT NULL;

CREATE TABLE Course_Title(
Title varchar(30) NOT NULL REFERENCES Course(Title),
CourseNo varchar(7) NOT NULL,
PRIMARY KEY(Title,CourseNo)
);

ALTER TABLE Course_Offering ADD CONSTRAINT cou_off_fk FOREIGN KEY (Title) REFERENCES Course(Title);
ALTER TABLE Course_Offering ADD CONSTRAINT cou_off_pk PRIMARY KEY (Title,Semester,Acad_Year);

ALTER TABLE Instructor ADD CONSTRAINT in_fk FOREIGN KEY (Title,Semester,Acad_Year) REFERENCES Course_Offering(Title,Semester,Acad_Year);
ALTER TABLE Instructor ADD CONSTRAINT in_pk PRIMARY KEY (EmpNo,Title,Semester,Acad_Year);

ALTER TABLE Registration ADD CONSTRAINT reg_fk FOREIGN KEY (Title,Semester,Acad_Year) REFERENCES Course_Offering(Title,Semester,Acad_Year);
ALTER TABLE Registration ADD CONSTRAINT reg_pk PRIMARY KEY (Email,Title,Semester,Acad_Year);

ALTER TABLE Time_Table ADD CONSTRAINT tim_off_fk FOREIGN KEY (Title,Semester,Acad_Year) REFERENCES Course_Offering(Title,Semester,Acad_Year);
ALTER TABLE Time_Table ADD CONSTRAINT tim_pk PRIMARY KEY (Title,Semester, Location, Acad_Year, Day);

ALTER TABLE Grade ADD CONSTRAINT gr_fk FOREIGN KEY (Title,Semester,Acad_Year) REFERENCES Course_Offering(Title,Semester,Acad_Year);
ALTER TABLE Grade ADD CONSTRAINT gr_pk PRIMARY KEY (Email,Title,Semester,Acad_Year);
