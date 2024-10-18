<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulár na registráciu</title>
</head>
<body>
    <h1>Registrácia</h1>
    <form action="prikladformulara.php" method="POST">
        <label for="name">Meno:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <input type="submit" value="Registrovať">
    </form>
</body>
</html>


<?php
// register.php

// Pripojenie k databáze (zmeň podľa svojich nastavení)
$servername = "localhost";
$username = "tvoje_meno";
$password = "tvoje_heslo";
$dbname = "tvoja_databaza";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola pripojenia
if ($conn->connect_error) {
    die("Pripojenie zlyhalo: " . $conn->connect_error);
}

// Kontrola, či bola metóda POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    
    // SQL dopyt na vloženie údajov
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Údaje boli úspešne uložené.";
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
