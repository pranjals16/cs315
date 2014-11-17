<?php
$File = "YourFile.txt";
$Handle = fopen($File, 'w');
$Data = "Jane Doe\n";
fwrite($Handle, $Data);
$Data = "Bilbo Jones\n";
fwrite($Handle, $Data);
print "Data Written";
fclose($Handle);
?>