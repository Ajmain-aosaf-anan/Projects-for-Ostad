<?php 

echo "Enter a number: ";
$number = (int) readline();

if ($number > 0) {
    echo "The number is positive";
}

elseif ($number == 0) {
    echo "The number is zero";
}

else {
    echo "The number is negative";
}

?>