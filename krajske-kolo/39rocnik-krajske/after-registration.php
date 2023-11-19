<?php
    require "./assets/database.php";
    require "./assets/user.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $meno = $_POST["meno"];
        $password = password_hash($_POST["heslo"], PASSWORD_DEFAULT);
        $role = "user";

            $id = createUser($connection, $meno, $password, $role);

            if (!empty($id)) {
                session_regenerate_id(true);

                // Nastavení, že je uživatel přihlášený
                $_SESSION["is_logged_in"] = true;
                // Nastavení ID uživatele
                $_SESSION["logged_in_user_id"] = $id;

                $_SESSION["role"] = $role;

                echo "<script>window.location.href = './admin.php';</script>";
            } else {
                echo "uzivatela sa nepodarilo pridat";
            }
    } else {
        echo "<script>window.location.href = './login.php';</script>";
    }
?>