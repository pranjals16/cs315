SELECT student.semester, student.department, student_mobile.mob_number, student_mobile.email_id, fullname_email.full_name
FROM student_rollno, student, student_mobile, fullname_email, partname_email
WHERE fullname_email.email_id = student_rollno.email_id and partname_email.part_name =  "kumar" and student_mobile.email_id =  student_rollno.email_id and student.email_id =  student_rollno.email_id and partname_email.email_id = student_rollno.email_id





