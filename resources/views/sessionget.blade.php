<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php


// Echo session variables that were set on previous page

print_r($_SESSION);

echo "<br>";

echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";

echo "Favorite animal is " . $_SESSION["favanimal"] . ".";

echo "<br>";


//modify

$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);

echo "<br>";

echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";

echo "Favorite animal is " . $_SESSION["favanimal"] . ".";


?>

</body>

</html>
