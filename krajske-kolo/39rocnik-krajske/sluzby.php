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
      <nav style="position: fixed;">
        <div>
          <h1><a  href="index.php"> ZENIT <span>CLOUD</span></a></h1>
        </div>
        <div class="ul-div">
          <ul>
             <li><a style="color: #00bcd4;" href="index.php">Úvod</a></li>
            <li><a href="onas.php">O nás</a></li>
            <li><a href="sluzby.php">Služby</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
          </ul>
          <div class="nav-button">
                     <button class="login"><a  href="login.php">Prihlasovať</a></button>
            <button><a href="registration.php">Zaregistrovať</a></button>
          </div>
        </div>
        <hr style="color: white; z-index: 10;  position: absolute; top: 60px; width: 1140px; left:100px;">
      </nav>
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



        <section
  style="
    width: 1140px;
    background-color: #f7f7f7;
    text-align: center;
  "
>
  <p style="color: #00bcd4; padding-top: 40px;">Hodnotenie</p>
  <h1>Napisali o nás</h1>
  <hr style="width: 80%; color: #f7f7f7; margin: 30px auto;">

  <?php if (empty($comments)): ?>
    <p>nic tu neni podme domov</p>
  <?php else: ?>
    <div class="comment-container">
      <div class="comment" id="currentComment">
        <span class="comment-icon" style="
            background: linear-gradient(
              90deg,
              rgba(76, 22, 227, 1) 30%,
              rgba(67, 67, 206, 1) 63%,
              rgba(52, 143, 162, 1) 100%
            );
            border-radius: 100%;
            width: 50px;
            height: 50px;
            padding: 15px;
            color: white;
            font-size: 60px;
            font-weight: bold;
            display: block;
            margin: 0 auto;
          ">&ldquo;</span>

        <p class="comment-text"><?= $comments[0]["text2"] ?></p>
        <span class="comment-author"><?= $comments[0]["meno"] ?></span><br />
        <span class="comment-position" style="color: #00bcd4">
          <?= $comments[0]["pozicia"] ?>
        </span>
      </div>
    </div>

    <div class="dots-container" style="display:flex; justify-content:center; align-items:center; gap:10px; padding:20px 0;">
      <?php foreach ($comments as $index => $comment): ?>
        <div class="dot" onclick="showComment(<?= $index ?>)">
           <div
              style="
                width: 10px;
                height: 10px;
                background-color: #00bcd4;
                border-radius: 100%;
              "
            ></div>
      </div>
      <?php endforeach; ?>
    </div>

    <script>
      const comments = <?= json_encode($comments) ?>;
      const currentComment = document.getElementById('currentComment');
      const dots = document.querySelectorAll('.dot');
      let currentIndex = 0;
      let timerId;

      function showComment(index) {
        const comment = comments[index];
        currentComment.innerHTML = `
          <span class="comment-icon" style="
              background: linear-gradient(
                90deg,
                rgba(76, 22, 227, 1) 30%,
                rgba(67, 67, 206, 1) 63%,
                rgba(52, 143, 162, 1) 100%
              );
              border-radius: 100%;
              width: 50px;
              height: 50px;
              padding: 15px;
              color: white;
              font-size: 60px;
              font-weight: bold;
              display: block;
              margin: 0 auto;
            ">&ldquo;</span>
          <p class="comment-text">${comment.text2}</p>
          <span class="comment-author">${comment.meno}</span><br />
          <span class="comment-position" style="color: #00bcd4">
            ${comment.pozicia}
          </span>
        `;
        currentIndex = index;

        // Zrušenie predchádzajúceho časovača
        clearTimeout(timerId);

        // Nastavenie nového časovača
        timerId = setTimeout(() => {
          const nextIndex = (index + 1) % comments.length;
          showComment(nextIndex);
        }, 2000);
      }

      showComment(currentIndex);
    </script>
  <?php endif; ?>
</section>
    </main>

    <footer >
      <div style="position: relative">
        <img
          style="width: 1140px; height: 300px"
          src="./kk/images/footer-bg.jpg"
          alt=""
        />
        <div
          style="
            color: white;
            display: flex;
            gap: 70px;
            width: 1140px;
            justify-content: center;
            font-size: 12px;
            position: absolute;
            top: 20px;
          "
        >
          <div style="width: 200px; display: flex; flex-direction: column; gap: 10px;">
            <h3>Konfigurácie</h3>
                    <?php
           foreach($offers as $offer): ?>
             <span>
              
                <?= $offer["ponuka"] ?>
            </span>
            <?php endforeach; ?>
          </div>
          <div style="width: 300px;">
            <h3>O nás</h3>
            <span>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Consectetur adipisci aperiam, labore aliquam ut ex aliquid,
              repudiandae quidem ab consequatur ducimus modi nobis vero
              consequuntur neque quas tempora quibusdam tenetur!
            </span>
          </div>
          <div style="width: 200px;">
            <h3>Kontakty</h3>
            <h4 style="display: flex">
              Telefón:
              <span style="color: #6A6A6A;">0900111222</span>
            </h4>
            <h4>
              Email:
              <span style="color: #6A6A6A;">ano@zenit@.sk</span>
            </h4>
            <h4>
              Podpora:
              <span style="color: #6A6A6A;">support@zenit.eu</span>
            </h4>
            <h4>
              Web address:
              <span style="color: #6A6A6A;">https://fcbani.eu</span>
            </h4>
          </div>
         
         
          
        </div>
        <div  style="text-align: center; color: white; position: absolute; bottom: 30px; width: 1140px;">

          <hr   style="width: 80%;"/>
          <span style="font-size: 12px;">Copyright</span>
        </div>
      </div>
    </footer>
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