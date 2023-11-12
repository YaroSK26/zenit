
<?php  require "./assets/database.php";
  require "./assets/auth.php";

  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <img src="./kk/images/banner-bg.jpg" alt="" />
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

      <div class="header">
        <h1>Vyhľadajte dostupnú doménovú adresu</h1>
        <div>
          <input
            class="search"
            type="text"
            placeholder="Sem zadajte doménu ..."
          />
          <button class="vyhladat">VYHLADAŤ</button>
        </div>
        <div class="checkbox">
          <div>
            <input type="checkbox" id="1" /><label for="1">.eu (10€/yr)</label>
          </div>
          <div>
            <input type="checkbox" id="2" /><label for="2">.sk (12€/yr)</label>
          </div>
          <div>
            <input type="checkbox" id="3" /><label for="3">.com (8€/yr)</label>
          </div>
        </div>
      </div>
    </header>

    <main>
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
            <img src="./kk/images/database.png" alt="" />
            <h1>Light Cloud</h1>
            <p>
              Prenechajte starosti s obstaraním a správou servera,
              administráciou operačného systému, zálohovaním, monitoringom a
              zabezpečením systému na nás.
            </p>
          </div>
          <div class="hosting-div">
            <img src="./kk/images/database.png" alt="" />
            <h1>Manažovateľný VPS Cloud</h1>
            <p>
              Server vám pripravíme na mieru a zaistíme všetky okolnosti jeho
              prevádzky. Na vás zostáva iba zadávanie požiadaviek cez jednoduchú
              administráciu. V prípade záujmu nás kontaktujte.
            </p>
          </div>
          <div class="hosting-div">
            <img src="./kk/images/database.png" alt="" />
            <h1>Dedikované Servery</h1>
            <p>
              Virtuálny server vám už nestačí alebo nechcete mať dáta umiestnené
              na serveroch, kde majú dáta aj iní zákazníci? Potom nastal ten
              správny čas na obstaranie fyzického dedikovaného servera.
            </p>
          </div>
        </div>
      </section>

      <section id="cloud">
        <img src="./kk/images/heading-bg.jpg" style="width: 1140px" alt="" />
        <div class="nenavidim-nth-child">
          <h1>Konfigurácia Cloud Hostingu</h1>
          <p style="color: white">
            Vyberte si z našich štandardných konfigurácií alebo nám napíšte o
            individuálnu ponuku
          </p>
        </div>
        <div class="article-wrapper">
          
<?php if (empty($offers)): ?>
    <p>nic tu neni podme domov</p>
<?php else: ?>
    <div style="display:flex; gap: 20px;">
        <?php foreach($offers as $offer): ?>
            <div
                style="
                  flex-direction: column;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  box-shadow: -1px 2px 5px 0px rgba(0, 0, 0, 0.75);
                  -webkit-box-shadow: -1px 2px 5px 0px rgba(0, 0, 0, 0.75);
                  -moz-box-shadow: -1px 2px 5px 0px rgba(0, 0, 0, 0.75);
                "
                class="article"
            >
                <h1><?= $offer["ponuka"] ?></h1>
                <article>
                    <div
                        style="
                          margin: 0 auto;
                           <?= $offer["cena"] == 30 ? ' background: linear-gradient(
                          90deg,
                          rgba(76, 22, 227, 1) 30%,
                          rgba(67, 67, 206, 1) 63%,
                          rgba(52, 143, 162, 1) 100%
                        );' : ' background-color :#00bcd4;' ?>;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          text-align: center;
                          color: white;
                          text-transform: uppercase;
                          height: 100px;
                          width: 150px;
                        "
                    >
                        <h1>
                            <span style="font-size: 28px"><?= $offer["cena"] ?>€ </span> <br />
                            <span style="font-size: 16px">mesačne</span>
                        </h1>
                    </div>
                    <p style="text-align: center">
                        <?= $offer["popis"] ?>
                    </p>
                    <hr style="width: 70%" />
                    <div style="margin-left: 20px">
                        <?php
                        $services = explode(',', $offer["sluzba"]);
                        foreach($services as $service): ?>
                            <p>
                                <img
                                    style="width: 15px; text-align: center; margin-right: 5px"
                                    src="./kk/images/check.png"
                                    alt=""
                                />
                                <?= $service ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </article>
                
                <?php if (isLoggedIn()): ?>
                    <button onclick="openDialog('<?= $offer["ponuka"] ?>', '<?= $offer["cena"] ?>')"
                        style="
                            padding: 15px 20px;
                            color: white;
                            border: none;
                            position: absolute;
                            top: 490px;
                        "
                        class="<?= $offer['cena'] == 30 ? 'brano' : 'vyhladat'?>"
                    >
                        VYBRAŤ CLOUD
                    </button>    

                    <dialog id="<?= $offer['ponuka'] ?>">
                        <form action="after-modal.php" method="POST">
                          <input type="hidden" name="ponuka" value="<?= $offer['ponuka'] ?>">
                          <input type="hidden" name="cena" value="<?= $offer['cena'] ?>">
                          <label for="cloudTitle">Title: <?= $offer["ponuka"] ?></label><br>
                          <label for="cloudPrice">Price: <?= $offer["cena"] ?>€</label><br>
                          <button type="submit">Odoslat</button>
                      </form>
                          <button  onclick="closeDialog('<?= $offer["ponuka"] ?>')">Close</button>
                    </dialog>
                <?php else: ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

        </div>


        </div>
      </section>

      

<section
  style="
    width: 1140px;
    background-color: #f7f7f7;
    position: absolute;
    text-align: center;
    top: 2100px;
    overflow: hidden;
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

    <div class="dots-container" style="display:flex; justify-content:center; align-items:center; gap:10px; margin:20px 0;">
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

      <footer style="position: absolute; top: 2550px ">
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
          <div style="width: 200px; ;display: flex; flex-direction: column; gap: 10px;">
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
            <span >
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



//dialog

    function openDialog(ponuka, cena) {
        var dialog = document.getElementById(ponuka);
        dialog.showModal();
    }

    function closeDialog(ponuka) {
        var dialog = document.getElementById(ponuka);
        dialog.close();
    }



</script>
</html>
