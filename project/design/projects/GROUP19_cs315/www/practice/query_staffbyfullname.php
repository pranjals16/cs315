SELECT designation.desig,fullname_email.email_id,fullname_email.full_name,staff.title ,staff.department,staff_phone_number.phone_number,staff_phone_number.number_type
FROM designation,fullname_email,staff,staff_phone_number
WHERE fullname_email.full_name = "sanjeev k aggarwal" and staff_phone_number.email_id = designation.email_id and staff_phone_number.email_id = fullname_email.email_id and staff_phone_number.email_id = staff.email_id