<?php 
require "./auth.php";
session_start();

//zistovanie ci je user prihlaseny
if (!isLoggedIn()) {
        die("nepovoleny vstup");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    si prihlaseny/zaregistrovany 

    <a href="log-out.php">Odhlasit sa</a>
</body>
</html>

