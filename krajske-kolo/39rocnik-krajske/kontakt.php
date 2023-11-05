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
        <h1 style="color: white;">Kontaktujte Nás</h1>
        <p >Úvod / Kontakt</p>
    </div>
   
    <div style="display: flex; justify-content: center; align-items: first baseline;">
    <form style="display: flex; flex-direction: column; width: 300px; justify-content: center; margin: 60px auto;">
        <input style="border: 1px solid gray; padding: 10px ; margin-bottom: 10px; background-color: white; color: black; outline: none ;" type="text" placeholder="Meno"><br>
        <input style=" margin-bottom: 10px; border: 1px solid gray; padding: 10px ; background-color: white; color: black; outline: none ;" type="email" placeholder="Email"><br>
          <input style=" margin-bottom: 10px; border: 1px solid gray; padding: 10px ; background-color: white; color: black; outline: none ;" type="text" placeholder="Predmet "><br>
          <textarea  style=" margin-bottom: 10px; border: 1px solid gray; padding: 10px ; background-color: white; color: black; outline: none ;" type="text" placeholder="Správa "  rows="5"></textarea>
        <button type="submit" style="width: 200px; padding: 15px 20px; color: white; background-color: #00bcd4; cursor: pointer; border: none;">ODOSLAŤ SPRÁVU</button>
    </form>

        <div style="width: 450px;">
            <span style="color: #00bcd4;">Kontaktujte Nás</span>
            <h1>Zostaňme v kontakte</h1>
            <p>Neviete sa rozhodnúť, niečo Vám nefunguje, alebo len potrebujete poradiť? Neváhajte a kontaktujete nás.</p>
            <hr>
            <div style="display: flex; flex-wrap: wrap; gap: 50px;">
                <div style="display: flex; align-items: center; font-weight: bold; gap: 10px;"> <img width="50px" src="./kk/images/telephone-handle-silhouette.png" alt=""> <span style="width: 100px;">0900111222</span></div>
                 <div style="display: flex; align-items: center; font-weight: bold; gap: 10px;"> <img width="50px" src="./kk/images/email.png" alt=""> <span style="width: 100px;" >ano@zenit@.sk</span></div>
                  <div style="display: flex; align-items: center; font-weight: bold; gap: 10px;"> <img width="50px" src="./kk/images/support.png" alt=""> <span style="width: 100px;">support@zenit.eu</span></div>
                   <div style="display: flex; align-items: center; font-weight: bold; gap: 10px;"> <img width="50px" src="./kk/images/worldwide.png" alt=""> <span style="width: 100px;">https://fcbani.eu</span></div>
                
                
            </div>
        </div>
    </div>
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