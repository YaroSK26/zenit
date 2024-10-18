<?php
// Nastavenie cookie
setcookie("user", "John Doe", time() + (86400 * 30), "/"); // Cookie platné 30 dní

// Zobrazenie
if(isset($_COOKIE["user"])) {
    echo "Privítanie späť, " . $_COOKIE["user"] . "!";
} else {
    echo "Vitajte!";
}
?>


<?php
session_start(); // Inicializácia relácie

// Nastavenie hodnoty do relácie
$_SESSION["username"] = "JohnDoe";

// Zobrazenie
echo "Užívateľ je prihlásený ako: " . $_SESSION["username"];
?>

<?php
session_start(); // Inicializácia relácie

if (isset($_SESSION["username"])) {
    echo "Užívateľ je prihlásený ako: " . $_SESSION["username"];
} else {
    echo "Žiadny užívateľ nie je prihlásený.";
}
?>
