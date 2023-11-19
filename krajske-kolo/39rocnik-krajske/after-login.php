<?php 
    require "./assets/database.php";
    require "./assets/user.php";

    session_start();
    
    if($_SERVER["REQUEST_METHOD"] ==="POST"){

        $loginMeno = $_POST["meno"];
        $loginPassword = $_POST["heslo"];

     

       if (auth($connection, $loginMeno , $loginPassword)) {
        //uspesne prihlasenie
            $id = getUserId($connection, $loginMeno);
            echo($id);

            session_regenerate_id(true);

             // Nastavení, že je uživatel přihlášený
            $_SESSION["is_logged_in"] = true;
            // Nastavení ID uživatele
            $_SESSION["logged_in_user_id"] = $id;

            $_SESSION["role"] = getUserRole($connection, $id);

            echo "<script>window.location.href = './admin.php';</script>";
         }else{
            $error = "Chyba pri prihlaseni";
            
        }
     }

?>
