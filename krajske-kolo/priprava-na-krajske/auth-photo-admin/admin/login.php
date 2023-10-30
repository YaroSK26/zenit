<?php 
require "./auth.php";
session_start();

//zistovanie ci je user prihlaseny
if (!isLoggedIn()) {
        die("nepovoleny vstup");
}

$role = $_SESSION["role"];

echo ($role);
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
    <a href="./upload-images/photos.php">photo</a>
    <a href="log-out.php">Odhlasit sa</a>

    <?php if($role === "admin"): ?>
            <h1>Si admiiiiiiiiiiin</h1>
    <?php endif;?>

</body>
</html>

