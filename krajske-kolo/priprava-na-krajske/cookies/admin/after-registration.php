<?php
    require "../assets/database.php";
    require "../assets/user.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $meno = $_POST["meno"];
        $priezvisko = $_POST["priezvisko"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // Check if the email is already registered
        if (isEmailRegistered($connection, $email)) {
            echo "email uz je zaregistrovany.";
            echo("<a href='../index.php'>spät</a>");
        } else {
            $id = createUser($connection, $meno, $priezvisko, $email, $password);

            if (!empty($id)) {
                session_regenerate_id(true);

                // Nastavení, že je uživatel přihlášený
                $_SESSION["is_logged_in"] = true;
                // Nastavení ID uživatele
                $_SESSION["logged_in_user_id"] = $id;

                echo "<script>window.location.href = '../admin/login.php';</script>";
            } else {
                echo "uzivatela sa nepodarilo pridat";
            }
        }
    } else {
        echo "<script>window.location.href = '../admin/login.php';</script>";
    }