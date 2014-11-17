<?
// Basic PHP MySQL Search

/*
  The search word is entered into the form and is matched in the
  database by LIKE %$query% ($query was submitted from the form)
  and then the results are displayed and formatted however you
  desire.
  --
  The form:
   <form method="POST" action="">
     Search Word: <input type="text" name="query">
     <input type="SUBMIT" value="Search!">
   </form>
*/

$sql = mysql_query("SELECT column1, column2 FROM yourtable WHERE column1 LIKE %$query% OR column2 LIKE %$query%") or die (mysql_error());

while(list($column1, $column2) = mysql_fetch_array($sql))
{
    echo "Result: $column1, $column2 <br />";
}
?>