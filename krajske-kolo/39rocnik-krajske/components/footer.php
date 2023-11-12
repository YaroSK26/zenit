<footer>
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