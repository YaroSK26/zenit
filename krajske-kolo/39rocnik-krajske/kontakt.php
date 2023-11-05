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