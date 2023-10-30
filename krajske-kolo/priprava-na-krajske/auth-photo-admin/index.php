<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php var_dump($_COOKIE) ?></p> 
    <h1>Registracia  </h1>
    <form action="./admin/after-registration.php" method="POST">
            <input required type="text" placeholder="meno" name="meno"><br>
            <input required type="text" placeholder="priezivsko" name="priezvisko"><br>
            <input required type="email" placeholder="email" name="email"><br>
            <input  class="password1" required type="password" placeholder="password" name="password"><br>
            <input  class="password2" required type="password" placeholder="password again" name="password-again"><br>
            <p class="result-text"></p>
            <input type="submit" value="Zaregistrovat">
    </form>


    <h1>Prihlasenie</h1>
    <form method="POST" action="./admin/after-login.php">
            <input required type="email" name="login-email" placeholder="email"><br>
            <input  required type="password" name="login-password" placeholder="password" ><br>
            <input type="submit" value="Prihlasit sa">
    </form>
</body>
    <script>
        //password checker
        const password1 = document.querySelector(".password1");
        const password2 = document.querySelector(".password2");
        const paragraphText = document.querySelector(".result-text");

        password1.addEventListener("input", () => {
            const password1Value= password1.value;
            const password2Value= password2.value;

            if (password1Value===password2Value) {
                paragraphText.textContent = "hesla su rovnake"
            }else{
                paragraphText.textContent = "hesla sa nezhoduju" 
            }

            if (password1Value === "" && password2Value === "") {
                paragraphText.textContent = ""
            }
        })

        password2.addEventListener("input", () => {
            const password1Value= password1.value;
            const password2Value= password2.value;

            if (password1Value===password2Value) {
                paragraphText.textContent = "hesla su rovnake "
            }else{
                paragraphText.textContent = "hesla sa nezhoduju" 
            }
            if (password1Value === "" && password2Value === "") {
                paragraphText.textContent = ""
            }
        })
        
       
    </script>
</html>

<?php
    // setcookie("supehero", "spiderman", time() + (60*60*24*30), "/")
    
?>