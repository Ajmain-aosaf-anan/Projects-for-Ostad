<?php 

define("USERNAME","ADMIN");
define("PASSWORD","12345");

echo "Enter Username: ";
$inputusername = readline();
echo "Enter Password: ";
$inputpassword = readline();    

if ($inputusername == "ADMIN" && $inputpassword == "12345") {
    echo "Login Successfully";
} 

else {
    echo "Invalid Username or Password.\n";
}

?>