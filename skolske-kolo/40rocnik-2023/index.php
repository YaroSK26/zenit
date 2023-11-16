<?php
    $db_host=  "127.0.0.1";
    $db_user= "zenituserskolske";
    $db_password= "zenitpassskolske"; 
    $db_name= "zenit_skolske";

    $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    

    $sql = "SELECT * FROM pricelist";
    $result = mysqli_query($connection,$sql);
    $pricelist = mysqli_fetch_all($result, MYSQLI_ASSOC);
   

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    </head>

    <body>
        <header>
            <div class="hodiny">
                <div class="clock ">
                    
                    <p  ><img src="./images/clock.png" alt="">Otváracie hodiny: Pon - Pia : 6.00 - 20.00</p>
                </div>
                <div class="kontakt">
                    <p> <img src="./images/mail.png" alt="">info@ZubZen.com</p>
                    <p> <img src="./images/phone-call.png" alt="">+000 123 456 789</p>
                </div>

            </div>
            <nav>
                <div>

                    <p class="zubzen"><img class="tooth" src="./images/molar-tooth.png" alt="">ZubZen</p>
                </div>


                <ul>
                    <li><a  href="#uvod">Úvod</a></li>
                    <li><a href="#sluzby">Služby</a></li>
                    <li><a href="#cennik">Cenník</a></li>
                    <li><a href="#specialisti">Naši špecialisti</a></li>
                    <button class="font-bold button1">Objednajte sa</button>
                </ul>
            </nav>
        </header>


        <main>
            <div class="main-bg" id="uvod">
                <div class="filter"></div>
                <img src="./images/bg-1.jpg" alt="">

                <div class="zuby">
                    <p>Zuby zdravé, úsmev krásny: Starajte sa o svoje ústa každý deň!</p>
                    <h1>Získajte najlepšiu zubnú staroslivosť.</h1>
                    <div class="zuby-buttons">
                        <button class="btn1 button1">Objednajte sa</button>
                        <button class="btn2 button2">Kontaktuje nás</button>
                    </div>
                </div>
            </div>


            <div class="tri-div" id="o-nas">
                <div class="div1">
                    <center>
                    <h1>Otváracie hodiny</h1>
                    <p> Pon - Pia <span>6:00 - 20:00</span></p>
                    <p>Sobota <span>9:00 - 16:00</span></p>
                    <p>Nedeľa <span>9:00 - 13:00</span></p>
                    <button class="button1">Objednajte sa</button>
                </div>
                <div class="div2" >
                    <center>
                    <h1>Vyhľadať doktora</h1>
                    <input type="text" placeholder="dátum objednania">
                    <select type="text" aria-placeholder="Vyberte sluzbu">
                 <option value="">Základné vyšetrenie
                  </option>
                  <option>Trhanie zubov</option>
                </select>
                    <button id="sluzby">Vyhladajte</button>
                    </center>
                </div>
                <div class="div3">
                    <h1>Objednajte sa</h1>
                    <p>Ak máte problémy so zubami, alebo sa chcete len poradiť. Neváhajte nám zavolať na číslo:
                    </p>
                    <p class="font-bold font-size">+000 123 456 789
                    </p>
                </div>
            </div>



            <div class="sluzby" >

                <div class="tvar">
                    <img src="./images/service-promo.jpg" alt="">
                </div>

                <div class="sluzby-part1">
                    <h3 class="nase-sluzby">Naše služby
                        <div class="hr-flex">
                            <hr class="hr-1">
                            <hr class="hr-2">
                        </div>
                    </h3>
                    <h2>Ponúkame iba služby tej najvyššej kvality</h2>


                    <div class="service-flex">
                        <div class="service-1">
                            <img src="./images/service-1.jpg" alt="">
                            <p>Estetická stomatológia</p>
                        </div>

                        <div class="service-1">
                            <img src="./images/service-2.jpg" alt="">
                            <p>Zubná chirurgia</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sluzby2">
                <div class="service-flex">
                    <div class="service-1">
                        <img src="./images/service-3.jpg" alt="">
                        <p>Zubné implantáty</p>
                    </div>

                    <div class="service-1">
                        <img src="./images/service-4.jpg" alt="">
                        <p>Bielenie zubov</p>
                    </div>

                    <div class="objednajte-sa-div">
                        <h1>Objednajte sa</h1>
                        <p>Ak máte problémy so zubami, alebo sa chcete len poradiť. Neváhajte nám zavolať na číslo:
                        </p>
                        <p>+000 123 456 789</p>
                    </div>
                </div>


            </div>


            <div class="price">
                <img src="./images/bg-1.jpg" alt="">

                <div class="price-div">
                    <h1>Ušetrite až 30% pri prvej prehliadke</h1>
                    <p>Prejdie k nám a získajte túto neskutočnú zľavu. Všetky ošetrenia a služby, súvisiace s odstránením nájdených problémov počas prvej prehliadky, budú účtované so zľavou 30%
                    </p>
                    <div class="price-buttons">
                        <button class="price-btn1 button1">Objednajte sa</button>
                        <button id="cennik" class="price-btn2">Zistite viac</button>
                    </div>
                </div>
            </div>


            <div class="cennik" >
                <div class="cennik-div1">
                    <h3 class="nase-sluzby">Cenník
                        <div class="hr-flex2">
                            <hr class="hr-1">
                            <hr class="hr-2">
                        </div>
                    </h3>
                    <h2>Ponúkame férové ceny za špičkovú kvalitu
                    </h2>
                    <p>Neváhajte využiť naše príjemné a ukľudnujúce prosredie, v ktorom sa budete cítiť bezpečne a bez zbytočných stresov. Klinika je vybavena najnovšími technológiami a vysoko kvalifikovaným a profesionálnym zubným personálom, vrátane zubárov,
                        ortodontov a zubných hygienikov.
                    </p>
                    <p class="uppercase" style="font-weight: bold;">Objednajte sa na čísle
                        <p>
                            +000 123 456 789</p>
                    </p>
                </div>
                
                
                <div class="cennik-overflow"> 
                <?php if (empty($pricelist)): ?>
                    <p>nic tu neni podme domov</p>
                    <?php else: ?>
                        <?php foreach($pricelist as $quest): ?>
                    <div class="cennik-div2">
                    
                    <img src="<?= $quest["obrazok"]?>" alt="">
                    <div class="price-wrapper">
                        <p class="price-1"><?= $quest["cena"] . "€"?></p>
                        <h3><?php echo $quest["ponuka"]?></h3>
                        <hr class="before-p">
                        <div class="p-flex">
                            <p > <?php echo $quest["vyhoda1"]?> <img style="width: 20px; height: 20px;" src="./images/check.png" alt=""></p>
                            <p><?php echo $quest["vyhoda2"]?>  <img style="width: 20px; height: 20px;" src="./images/check.png" alt=""></p>
                            <p><?php echo $quest["vyhoda3"]?>  <img style="width: 20px; height: 20px;" src="./images/check.png" alt=""></p>
                        </div>
                        <button class="objednajte-sa-po-152-krat button1">Objednajte sa </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        
        <?php endif; ?> 
        <div class="arrow1"><img src="./images/right-arrows.png" alt=""></div>
        <div class="arrow2"><img src="./images/right-arrows.png" alt=""></div> 
    </div>


    <?php 
                $json1 = '{"name":"Dr. Tom\u00e1\u0161 Kov\u00e1\u010d","job":"Zubn\u00fd chirurg","img": "./images/team/team-3.jpg","links":["twitter\/#kovac","facebook\/#kovac","linkedin\/#kovac","instagram\/#kovac"]}';
                $json2 = '{"name":"Dr. Jana Kovar\u00edkov\u00e1","job":"Zubn\u00fd chirurg","img":"./images/team/team-2.jpg","links":["twitter\/#kovarikova","facebook\/#kovarikova","linkedin\/#kovarikova","instagram\/#kovarikova"]}';
                $json3 = '{"name":"Dr. David Kr\u00e1l","job":"Zubn\u00fd chirurg","img":"./images/team/team-1.jpg","links":["twitter\/#kral","facebook\/#kral","linkedin\/#kral","instagram\/#kral"]}';
                $json4 = '{"name":"Dr. Katar\u00edna Kr\u00e1lov\u00e1","job":"Zubn\u00fd chirurg","img":"./images/team/team-4.jpg","links":["twitter\/#kralova","facebook\/#kralova","linkedin\/#kralova","instagram\/#kralova"]}';
                $json5 = '{"name":"Dr. Jakub T\u00f3th","job":"Zubn\u00fd chirurg","img":"./images/team/team-5.jpg","links":["twitter\/#toth","facebook\/#toth","linkedin\/#toth","instagram\/#toth"]}';
                
                $dataDavid = json_decode($json3, true);
                $dataKatarina = json_decode($json4, true);
                $dataTomas = json_decode($json1, true);
                $dataJana = json_decode($json2, true);
                $dataJakub = json_decode($json5, true);

                $allData = [ $dataDavid,$dataJana,$dataTomas ,$dataKatarina,  $dataJakub];

                
    ?>

             

             <div class="specialisti" id="specialisti">
                <img src="./images/bg-2.jpg" alt="">
                <div class="specialisti-div">
                    <div class="specialisti-div1">
                        <h3 class="nase-sluzby">Naši špecialisti
                            <div class="hr-flex">
                                <hr class="hr-1">
                                <hr class="hr-2">
                            </div>
                        </h3>
                        <h2 class="specialisti-h2">Spoznaje naších certifikovaných zubných profesionálov</h2>
                        <button class="objednajte-sa-po-153-krat button1">Objednajte sa</button>
                    </div>
                     <?php if (empty($allData)): ?>
                    <p>nic tu neni podme domov</p>
                    <?php else: ?>
                            <?php foreach($allData as $data): ?>
                            <div class="specialisti-div2">
                                <img src="<?= $data["img"]?>" alt="">
                                <div class="icons">
                                    <a href="<?= explode('/', $data["links"][0])[1]?>"><img src="./images//twitter.png" alt=""></a>
                                    <a href="<?= explode('/', $data["links"][1])[1]?>"><img src="./images/facebook-app-symbol.png" alt=""></a>
                                    <a href="<?= explode('/', $data["links"][2])[1]?>"><img src="./images/linkedin-big-logo.png" alt=""></a>
                                    <a href="<?= explode('/', $data["links"][3])[1]?>"><img src="./images/instagram.png" alt=""></a>
                                </div>
                                <div class="wrapper-specialist">
                                    <h1 class="specialisti-h1"><?= $data["name"] ?></h1>
                                    <p class="specialisti-p"><?= $data["job"]?></p>
                                </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?> 

                </div>
            </div>
        </main>


        <footer id="kontakt">
            <div>
                <h1>Obľúbené odkazy</h1>
                <p><img style="margin-right: 5px;" src="./images/right-arrows.png" alt=""><a href="#uvod">Úvod</a></p>
                <p><img style="margin-right: 5px;"src="./images/right-arrows.png" alt=""><a href="#o-nas">O nás</a></p>
                <p><img style="margin-right: 5px;"src="./images/right-arrows.png" alt=""><a href="#specialisti">Naši špecialisti</a></p>
            </div>
            <div>
                <h1>Užitočné odkazy</h1>
                <p><img style="margin-right: 5px;"src="./images/right-arrows.png" alt=""><a href="#sluzby">Služby</a></p>
                <p><img style="margin-right: 5px;"src="./images/right-arrows.png" alt=""><a href="#cennik">Cenník</a></p>
                <p><img style="margin-right: 5px;"src="./images/right-arrows.png" alt=""><a href="#kontakt">Kontakt</a></p>
            </div>
            <div>
                <h1>Kde nás nájdete</h1>
                <p><img style="margin-right: 5px;"src="./images/location-pointer.png" alt=""><a >123 Ulica, Bratislava, Slovensko</a></p>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" style="margin-right: 5px; color:#06a3da;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg><a >info@ZubZen.com</a></p>
                <p><svg xmlns="http://www.w3.org/2000/svg" width="20px" style="margin-right:5px; color:#06a3da;" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><a >+000 123 456 789</a></p>
            </div>
            <div>
                <h1>Sledujte nás</h1>
                    <div class="icons2">
                        <center>
                      <a href="#"><img src="./images/twitter.png" alt=""></a>  
                      <a href="#">  <img src="./images/facebook-app-symbol.png" alt=""></a>
                       <a href="#"><img src="./images/linkedin-big-logo.png" alt=""></a> 
                       <a href="#"> <img src="./images/instagram.png" alt=""></a>
                        </center>
                    </div>
            </div>
        </footer> 
    </body>
<script>
    // JavaScript kód na pridanie triedy "active" po kliknutí na odkaz
    var links = document.querySelectorAll('a');
    links.forEach(function(link) {
        link.addEventListener('click', function() {
            links.forEach(function(innerLink) {
                innerLink.classList.remove('active');
            });
            link.classList.add('active');
        });
    });


let x = 0;
const forwardArrow = document.querySelector('.arrow1');
const backwardArrow = document.querySelector('.arrow2');
const cennikDiv = document.querySelector('.cennik-overflow');
const cennikDivWidth = cennikDiv.scrollWidth - cennikDiv.clientWidth;

forwardArrow.addEventListener('click', function () {
    x += 300;
    if (x > cennikDivWidth) {
        x = 0;
    }
    cennikDiv.scrollTo(x, 0);
});

backwardArrow.addEventListener('click', function () {
    x -= 300;
    if (x < 0) {
        x = cennikDivWidth;
    }
    cennikDiv.scrollTo(x, 0);
});



    
</script>
    </html>