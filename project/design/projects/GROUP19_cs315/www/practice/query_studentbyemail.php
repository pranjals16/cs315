SELECT student.semester, student.department, student_mobile.mob_number, student_mobile.email_id, fullname_email.full_name
FROM student_rollno, student, student_mobile, fullname_email
WHERE student_rollno.email_id =  "deepakkg" and student_mobile.email_id =  student_rollno.email_id and student.email_id =  student_rollno.email_id
and fullname_email.email_id = student_rollno.email_id




