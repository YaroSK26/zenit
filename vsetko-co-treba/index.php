<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="./style.css">    
</head>
<body>
    <center >
        <section class="container">

       
    <div>
    <h1>Registration</h1>
    <form action="./admin/after-registration.php" method="POST">
            <input required type="text" placeholder="Name" name="meno"><br>
            <input required type="text" placeholder="Surname" name="priezvisko"><br>
            <input required type="email" placeholder="Email" name="email"><br>
            <input  class="password1" required type="password" placeholder="Password" name="password"><br>
            <input  class="password2" required type="password" placeholder="Password again" name="password-again"><br>
            <p class="result-text"></p>
            <button>sign up</button>
    </form>
    </div>

    <div>
    <h1>Login</h1>
    <form method="POST" action="./admin/after-login.php">
            <input required type="email" name="login-email" placeholder="Email"><br>
            <input  required type="password" name="login-password" placeholder="Password" ><br>
            <button>sign in</button>
    </form>
    </div>
    </center>
     </section>
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
                paragraphText.textContent = "Passwords are the same"
            }else{
                paragraphText.textContent = "Passwords don't match" 
            }

            if (password1Value === "" && password2Value === "") {
                paragraphText.textContent = ""
            }
        })

        password2.addEventListener("input", () => {
            const password1Value= password1.value;
            const password2Value= password2.value;

            if (password1Value===password2Value) {
                paragraphText.textContent = "asswords are the same"
            }else{
                paragraphText.textContent = "Passwords don't match" 
            }
            if (password1Value === "" && password2Value === "") {
                paragraphText.textContent = ""
            }
        })
        
       
    </script>

<script>
    
</script>
</html>