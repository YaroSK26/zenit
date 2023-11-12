

<section
  style="
    width: 1140px;
    background-color: #f7f7f7;
    text-align: center;
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