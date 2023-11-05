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
    <div style="text-align: center; position: absolute;top: 150px ; left: 500px;">
        <h1 style="color: white;">O nás</h1>
        <p >Úvod / O nás</p>
    </div>
   
    <div style="display: flex; margin: 50px 0; gap: 20px; justify-content: center; align-items:start">
        <img style="width: 450px; " src="./kk/images/our-team.jpg" alt="">

        <div style="width: 450px;">
            <span style="color: #00bcd4;">O nás</span>
            <h1 style="margin: 0;">O našej spoločnosti</h1>
                <p>Na trhu pôsobíme od roku 1985. Začali sme ako nadšenci a neskôr sme vybudovali obrovskú značku, ktorá disponuje spoľahlivou infraštruktúrou zahŕňajúcou tri veľké dátové centrá rozdelené na viaceré lokácie a tímom administrátorv, ktorí na všetko dohliadajú.</p>
            <hr>
            <div style="display: flex; flex-direction: column; font-size: 14px;">
               <div style="display: flex; gap: 20px;">     
                    <h3 style="color: #00bcd4;">Naša história v skratke<h2>
                    <h3>Čo bude ďalej?</h3>
                    </div>
                    <p>1985: Náš prvý server v Piešťanoch – SPŠE</p>
                    <p>1988: Druhý server v Nižnej – SOUE</p>
                    <p>1992: Tretí server v Prešove – SPŠE</p>
                    <p>od 1996: poriadne sme sa do toho opreli a každý rok pribúda nový server (Stará Turá, Košice, Liptovský Hrádok, Banská Bystrica, Bratislava, Martin, Komárno, ...)</p>
                    <p>2022: Vo februári 2023 plánujeme spustiť najnovší server v Bratislave – SOŠT</p>
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