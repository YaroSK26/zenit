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
        <h1 style="color: white;">Naše služby pre Vás</h1>
        <p >Úvod / Služby</p>
    </div>
   

          <section id="hosting">
        <p style="color: #00bcd4">Hostingové služby</p>
        <h1 style="margin-top: -10px">Poskytujeme tie najlepšie služby</h1>
        <p class="">
          V prvom rade sú to dedikované servery, kde ide o prenájom hardvéru,
          prinášame však aj komplexné riešenie – manažované servery, čo je v
          praxi prenájom hardvéru + jeho kompletná administrácia. Využívame
          výhradne kvalitný značkový serverový hardvér od spoločnosti ŠIOV.
        </p>

        <div class="hosting-wrapper">
          <div class="hosting-div">
            <img src="./kk/images/cloud.png" alt="" />
            <h1>VPS Cloud</h1>
            <p>
             Máme vlastnú cloudovú infraštruktúru. Tieto virtuálne servery spĺňajú vysoké štandardy výkonu a spoľahlivosti.
            </p>
          </div>
          <div class="hosting-div">
            <img src="./kk/images/servers.png" alt="" />
            <h1>Rýchla sieť</h1>
            <p>
              Disponujeme rýchlou globálnou sieťou a tak dokážeme poskytnúť bleskovo rýchle, bezpečné a spoľahlivé odozvy.
            </p>
          </div>
          <div class="hosting-div">
            <img src="./kk/images/database.png" alt="" />
            <h1>Spoľahlivé služby</h1>
            <p>
           S nami sa nemusíte báť, že Vaše služby nebudú k dispzícií. Granatujeme  99.9% dostupnosť.
            </p>
          </div>
          <div class="hosting-div">
            <img src="./kk/images/files.png" alt="" />
            <h1>Manažovateľné CDN</h1>
            <p>
             Získajte pokročilú kontrolu nad ukladaním vášho obsahu do vyrovnávacej pamäte v našej sieti.
            </p>
          </div>
          <div class="hosting-div">
            <img src="./kk/images/check-mark.png" alt="" />
            <h1>Optimalny Hosting</h1>
            <p>
            Pomôžeme Vám vybrať najvhodnejší hosting a tým Vám dokážeme znížiť náklady aj o 50%.
            </p>
          </div>
          <div class="hosting-div">
            <img src="./kk/images/support.png" alt="" />
            <h1>Zákaznícka Podpora</h1>
            <p>
           Naši odborníci sú Vám k dispozícií 24 hodín denne, 7 dni v týždni a 365 dní do roka.
            </p>
          </div>

        </div>
      </section>
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