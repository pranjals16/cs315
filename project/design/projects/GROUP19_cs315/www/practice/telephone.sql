CREATE TABLE Designation (
  email_ID varchar(50) NOT NULL,
  desig varchar(100) NOT NULL,
  primary key (desig)
);


CREATE TABLE Staff(
   email_id varchar(20) NOT NULL,
   department varchar(20) ,
   title varchar(20) ,
   primary key (email_id)
   );
   
   
   CREATE TABLE Student(
   email_id varchar(20) NOT NULL,
   semester int(2) NOT NULL,
   department varchar(20) NOT NULL,
   primary key (email_id)
   );

CREATE TABLE Student_rollno(
   email_id varchar(20) NOT NULL,
   roll_number varchar(20) NOT NULL,
   primary key (email_id)
   );
   
  CREATE TABLE Student_mobile(
   email_id varchar(20) NOT NULL,
   mob_number int(20) NOT NULL,
   primary key (mob_number)
   ); 
  
CREATE TABLE Staff_phone_number(
   email_id varchar(20) NOT NULL,
   phone_number varchar(20) NOT NULL,
   number_type varchar(20) NOT NULL,
   primary key (phone_number)
   );  
   
 CREATE TABLE fullname_email(
   email_id varchar(20) NOT NULL,
   full_name varchar(100) NOT NULL,
   primary key (email_id)
   );  

    CREATE TABLE partname_email(
   email_id varchar(20) NOT NULL,
   part_name varchar(100) NOT NULL,
   primary key (email_id)
   ); 
   
insert into Designation ( prof_id, desig ) 
values ( 'Y123', 'DOSA'),
values ( 'Y124', 'DOAA'),
values ( 'Y125', 'DRPG'),
values ( 'Y126', 'CSE_HOD');