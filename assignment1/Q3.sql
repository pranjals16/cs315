COPY Student FROM '/home/pranjal/cs315/Student.csv' DELIMITERS ',' CSV;
COPY Faculty FROM '/home/pranjal/cs315/Faculty.csv' DELIMITERS ',' CSV;
COPY Course FROM '/home/pranjal/cs315/Course.csv' DELIMITERS ',' CSV;
COPY Course_Offering FROM '/home/pranjal/cs315/Course_Offering.csv' DELIMITERS ',' CSV;
COPY Course_Title FROM '/home/pranjal/cs315/Course_Title.csv' DELIMITERS ',' CSV;
COPY Grade_Points FROM '/home/pranjal/cs315/Grade_Points.csv' DELIMITERS ',' CSV;
COPY Grade FROM '/home/pranjal/cs315/Grade.csv' DELIMITERS ',' CSV;
COPY Instructor FROM '/home/pranjal/cs315/Instructor.csv' DELIMITERS ',' CSV;
COPY PreReqTable FROM '/home/pranjal/cs315/PreReqTable.csv' DELIMITERS ',' CSV;
COPY Registration FROM '/home/pranjal/cs315/Registration.csv' DELIMITERS ',' CSV;
COPY Student_Detail FROM '/home/pranjal/cs315/Student_Detail.csv' DELIMITERS ',' CSV;
COPY Time_Table FROM '/home/pranjal/cs315/Time_Table.csv' DELIMITERS ',' CSV;


-------------------------3a----------------------------------------------
SELECT regis.Title,roll.RollNo,stud.Name
FROM Registration regis,Student_Detail roll,Student stud
WHERE regis.Email = roll.Email and roll.Email=stud.Email;

-------------------------3b----------------------------------------------
SELECT Count(*)
FROM (SELECT Title FROM Registration GROUP BY Title HAVING Count(*)<10) AS T;


-------------------------3c----------------------------------------------
SELECT DISTINCT(TT1.day),S.Name,TT2.Start_Time,TT2.Duration,TT1.Start_Time,TT1.Title,TT2.Title
FROM Time_Table TT1, Time_Table TT2,Student S
WHERE
TT1.Start_Time<(TT2.Start_Time+TT2.Duration)
AND TT2.Start_Time<TT1.Start_Time
AND TT1.Title<TT2.Title;


-------------------------3d----------------------------------------------
SELECT DISTINCT(SD.Email),CT.CourseNo,CT.Title,SD.RollNo
FROM Student_Detail SD,Course_Title CT,Time_Table TTE,Registration RG
WHERE TTE.start_time='08:00:00' 
AND RG.semester='2' 
AND RG.acad_year='2012-13' 
AND RG.title=TTE.Title 
AND RG.title=CT.Title
AND RG.Email=SD.Email


-------------------------3e----------------------------------------------
SELECT Name
FROM Faculty
WHERE Name NOT IN (SELECT Fac.Name FROM Faculty Fac,Instructor Inst WHERE Fac.EmpNo = Inst.EmpNo);


-------------------------3f----------------------------------------------
SELECT S.Name,SUM(points*units*1.0)/SUM(units) AS SPI
FROM Grade G,Course_Offering CO,Grade_Points GP,Student S
WHERE G.Title=CO.Title and G.Semester=CO.Semester and G.Acad_Year=CO.Acad_Year and G.grade=GP.letter_grade and CO.Semester='1' and CO.Acad_Year='2011-12' and S.Email=G.Email and S.Department='CSE'
GROUP BY S.Email;

-------------------------3g----------------------------------------------
SELECT T.Location
FROM (SELECT Location,SUM(Duration) AS Total FROM Time_Table GROUP BY Location ORDER BY Total DESC LIMIT 1) AS T;

--------------------------------REST----------------------------------------------------------------------------------
----------------Output the courses registered by a particular RollNo and his name--------------
SELECT S.Name, RG.Title
FROM Student_Detail SD,Student S,Registration RG
WHERE SD.RollNo='10511' AND SD.Email=RG.Email AND S.Email=SD.Email;


------------------Output the course number and title taken by a particular faculty-----------
SELECT CT.CourseNo,CT.Title,F.Name
FROM Faculty F,Instructor I,Course_Title CT
WHERE F.Name='Amit Dutta' AND F.EmpNo=I.EmpNo AND I.Title=CT.Title;


----------------Output the Meeting types,start time and instrutor name of a particular course no------
SELECT TT.Meeting_Type,TT.Start_Time,TT.Title,F.Name
FROM Time_Table TT,Course_Title CT,Instructor I,Faculty F
WHERE CT.CourseNo='ME201' AND CT.Title=TT.Title AND TT.Title=I.Title AND I.EmpNo=F.EmpNo;
