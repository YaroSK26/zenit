<?php 
      require "./assets/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <nav style="position: fixed;">
        <div>
          <h1><a  href="index.php"> ZENIT <span>CLOUD</span></a></h1>
        </div>
        <div class="ul-div">
          <ul>
             <li><a class="a"  href="index.php">Úvod</a></li>
            <li><a class="a" href="onas.php">O nás</a></li>
            <li><a class="a" href="sluzby.php">Služby</a></li>
            <li><a class="a" href="kontakt.php">Kontakt</a></li>
          </ul>
          <div class="nav-button">

         
              <?php if (isLoggedIn()): ?>
                        <button class="login"><a class="login-btn" href="admin.php">Administrácia</a></button>
            <button><a href="log-out.php">Odhlásiť</a></button>
        <?php else: ?>
                   <button class="login"><a class="login-btn" href="login.php">Prihlasovať</a></button>
            <button><a href="registration.php">Zaregistrovať</a></button>
              <?php endif; ?>
          </div>
        </div>
        <hr style="color: white; z-index: 10;  position: absolute; top: 60px; width: 1140px; left:100px;">
      </nav>

      
</body>
<script>

  //active prvok
window.onload = function() {
    var links = document.querySelectorAll(".a");
    links.forEach(function(link) {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });
};
      </script>

      <style>
  .a.active {
    color: #06a3da;
  }
</style>
</html>