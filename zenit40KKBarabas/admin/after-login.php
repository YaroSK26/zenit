<?php 
    require "../assets/database.php";
    require "../assets/user.php";

    session_start();
    
    if($_SERVER["REQUEST_METHOD"] ==="POST"){

        $loginEmail = $_POST["login-email"];
        $loginPassword = $_POST["login-password"];

        // prihlaseny user : admin@admin.com , pass123 

     

       if (auth($connection, $loginEmail , $loginPassword)) {
        //uspesne prihlasenie
            $id = getUserId($connection, $loginEmail);
            echo($id);

            session_regenerate_id(true);

             // Nastavení, že je uživatel přihlášený
            $_SESSION["is_logged_in"] = true;
            // Nastavení ID uživatele
            $_SESSION["logged_in_user_id"] = $id;

            echo "<script>window.location.href = '../admin/login.php';</script>";
         }else{
            $error = "Chyba pri prihlaseni";
            
        }
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
    <?php if(!empty($error)): ?>
        <p><?= $error?></p>
    <?php endif; ?>

    <a href="../index.php">prihlasit sa</a>
</body>
</html>