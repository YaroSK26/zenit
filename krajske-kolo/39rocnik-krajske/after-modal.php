<?php 
require "./assets/auth.php";
require "./assets/database.php";

session_start();

// Zistovanie, či je užívateľ prihlásený
if (!isLoggedIn()) {
    die("Nepovolený vstup");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Získanie hodnôt z formulára
    $ponuka = $_POST["ponuka"];
    $cena = $_POST["cena"];

    // Aktualizácia záznamu v databáze
    $userId = $_SESSION["logged_in_user_id"];
    $success = updateUser($connection, $userId, $ponuka, $cena);

    if ($success) {
         echo "<script>window.location.href = './admin.php';</script>";
    } else {
        echo "Užívateľa sa nepodarilo aktualizovať";
        echo mysqli_error($connection);
    }
} else {
     echo "<script>window.location.href = './index.php';</script>";
}

function updateUser($connection, $userId, $ponuka, $cena) {
    try {
        // Aktualizácia záznamu v databáze
        $sql = "UPDATE users SET ponuka = ?, cena = ? WHERE ID = ?";
        $statement = mysqli_prepare($connection, $sql);

        if ($statement) {
            mysqli_stmt_bind_param($statement, "sii", $ponuka, $cena, $userId);
            mysqli_stmt_execute($statement);

            return true;
        } else {
            echo mysqli_error($connection);
            return false;
        }
    } catch (PDOException $e) {
        // Spracovanie chyby (voliteľné)
        error_log("Chyba pri aktualizácii používateľa: " . $e->getMessage());
        return false;
    }
}

?>
