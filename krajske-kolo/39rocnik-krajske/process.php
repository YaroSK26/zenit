<?php
require "./assets/auth.php";
require "./assets/database.php";

session_start();

if (!isLoggedIn()) {
    die("Nepovolený vstup");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"];
    $userId = $_POST["userId"];

    switch ($action) {
        case "resetPonuka":
            resetPonuka($userId, $connection);
            break;
        case "vymazatUzivatela":
            vymazatUzivatela($userId, $connection);
            break;
        // pridajte ďalšie prípady podľa potreby

        default:
            // Neznáma akcia
            break;
    }
} else {
    echo "<script>window.location.href = './index.php';</script>";
}

function resetPonuka($userId, $connection) {
    try {
        // Resetovanie ponuky a ceny (nastavenie na hodnoty podľa vašich potrieb)
        $newPonukaValue = "0";
        $newCenaValue = "0";

        // Aktualizácia hodnôt v databáze
        $sql = "UPDATE users SET ponuka = ?, cena = ? WHERE ID = ?";
        $statement = mysqli_prepare($connection, $sql);

        if ($statement) {
            mysqli_stmt_bind_param($statement, "ssi", $newPonukaValue, $newCenaValue, $userId);
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);

            echo "Resetovanie ponuky a ceny prebehlo úspešne.";
        } else {
            echo "Chyba pri príprave príkazu.";
        }
    } catch (Exception $e) {
        echo "Chyba pri resetovaní ponuky a ceny: " . $e->getMessage();
    }
}


function vymazatUzivatela($userId, $connection) {
    try {
        // Vymazanie užívateľa z databázy
        $sql = "DELETE FROM users WHERE ID = ?";
        $statement = mysqli_prepare($connection, $sql);

        if ($statement) {
            mysqli_stmt_bind_param($statement, "i", $userId);
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);

            echo "Vymazanie užívateľa prebehlo úspešne.";
            echo "<a href='admin.php'>admin</a>";
        } else {
            echo "Chyba pri príprave príkazu.";
        }
    } catch (Exception $e) {
        echo "Chyba pri vymazávaní užívateľa: " . $e->getMessage();
    }
}
?>
