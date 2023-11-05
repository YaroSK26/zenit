<?php  require "./assets/database.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
        <header>
      <img src="./kk/images/heading-bg.jpg" alt="" />
       <?php require "./components/navbar.php" ?>
    </header>
    <div style="text-align: center; position: absolute;top: 150px ; left: 400px;">
        <h1 style="color: white;">Prihlasenie uživateľa</h1>
        <p s>Úvod / Prihlasenie</p>
    </div>
   
    <form method="POST" action="after-login.php" style="display: flex; flex-direction: column; width: 300px; justify-content: center; margin: 60px auto;">
        <input name="meno" style="border: 1px solid gray; padding: 10px ; margin-bottom: 10px; background-color: white; color: black; outline: none ;" type="text" placeholder="Meno"><br>
        <input name="heslo" style=" margin-bottom: 10px; border: 1px solid gray; padding: 10px ; background-color: white; color: black; outline: none ;" type="password" placeholder="Heslo"><br>
        <button type="submit" style="width: 150px; padding: 15px 20px; color: white; background-color: #00bcd4; cursor: pointer; border: none;">PRIHLASIŤ</button>
    </form>
        <?php  require "./components/comments.php"?>
    </main>

     <?php require "./components/footer.php" ?>
</body>
      <script>
  window.addEventListener("scroll", function () {
    var navbar = document.querySelector("nav");
    var scrollPercentage = (document.documentElement.scrollTop + window.innerHeight) / document.documentElement.scrollHeight * 100;

    if (scrollPercentage > 10) { 
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  });
</script>
</html>