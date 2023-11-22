<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1>Registracia  </h1>
    <form action="./after-registration.php" method="POST">
            <input required type="text" placeholder="meno" name="meno"><br>
            <input required type="text" placeholder="priezivsko" name="priezvisko"><br>
            <input required type="email" placeholder="email" name="email"><br>
            <input  class="password1" required type="password" placeholder="password" name="password"><br>
            <input  class="password2" required type="password" placeholder="password again" name="password-again"><br>
            <input type="submit" value="Zaregistrovat">
            <p class="result-text"></p>
    </form>

    <h1>Prihlasenie</h1>
    <form method="POST" action="./after-login.php">
            <input required type="text" name="login-email" placeholder="email"><br>
            <input  required type="password" name="login-password" placeholder="password" ><br>
            <input type="submit" value="Prihlasit sa">
    </form>
</body>

</html>