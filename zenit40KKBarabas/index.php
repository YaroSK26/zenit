<!-- #E4E2E0 - pozadie
#525B64 - text 
#617391 - hover
text s farebným pozadím
 #FFFFFF - text
 #DDDDDD - zvýraznenie
text s farebným pozadím - hover efekt
#111111 - text
#999999 - zvýraznenie -->

<?php 

include "./assets/database.php";
include "./assets/createstudent.php";

    $MenoPriezvisko = null;
    $mail = null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        


    $MenoPriezvisko = $_POST["MenoPriezvisko"];
    $mail = $_POST["mail"];

    //create student do databazy
    $id = createStudent($connection, $MenoPriezvisko, $mail);

  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Zenit,krajské kolo, 40 ročník" />
    <meta name="description" content="Zenit krajské kolo 40 ročník" />

    <title>Zenit 40KK</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>
<body>
   
    <header >
        <section  class="head-img" >
            <img src="./images/head01.jpg" alt="">
        <div class="flex-head">
            <div class="header">
                <h1 style="font-size: 50px;     font-family: Patua;">ZenSki</h1>
                <p style="font-style: italic; width: 300px; text-align: left;">Doprajte si zimnú dovolenku na nezabudnutie. Lyžiarske stredisko ZenSki je ideálnym miestom pre lyžiarov, snowboardistov, rodiny s deťmi a milovníkov prírody.</p>
            </div>

           
                <form class="header-form" method="POST" action="index.php">
                    <h2 style="text-align: end;">Chcem dostavať novinky</h2>
                    <input required min="4" max="64" type="text" placeholder="Zadaj svoje meno" name="MenoPriezvisko">
                    <input required type="email" placeholder="Zadaj emailovú adresu" name="mail">
                    <button type="submit">Odoslať</button>
                </form>
            </div>
        </section>       
        
        <section class="number">
                <div>
                    <h1 >01.</h1>
                    <h2>Zjazdovky pre všetkých</h2>
                    <p>Ponúkame širokú škálu zjazdoviek pre všetky úrovne zručností, vrátane náročných zjazdoviek pre pokročilých, ako aj miernych zjazdoviek pre začiatočníkov a rodiny s deťmi.</p>
                </div>
                   <div>
                    <h1 >02.</h1>
                    <h2>Prekrásna príroda</h2>
                    <p>Stredisko sa nachádza v krásnej horskej oblasti a ponúka nádherné výhľady na okolitú prírodu. Okrem lyžovania a snowboardingu tu môžete využiť aj množstvo ďalších aktivít.</p>
                </div>
                  <div>
                    <h1 >03.</h1>
                    <h2>Lyžiarska škola</h2>
                    <p>Lyžiarska škola je skvelou možnosťou pre začiatočníkov, ktorí sa chcú naučiť lyžovať alebo snowboardovať. Lyžiarski inštruktori poskytujú individuálne alebo skupinové lekcie.</p>
                </div>
        </section>
        
    </header>
    
    <main>
        <section class="section-image-3">
            <div class="images-3" style="position: relative;">
                <img alt="clovek na lyziach" src="./images/res02.jpg" alt="">
                <div class="images-div">
                    <h1 >Špeciálna <br> ponuka <br> <span style="font-weight: bold; font-size: 16px;"> UŠETRITE 25% </span></h1>
                        
                </div>
                <button class="button">Rezervovať skipas</button>
            </div>
            <div class="images-3" style="position: relative;">
                <img alt="clovek na lyziach" src="./images/res03.jpg" alt="">
                <div class="images-div">
                    <h1 >Festival <br> <span style="font-weight: bold; font-size: 16px;"> už za 3 dni </span></h1>
                        
                </div>
                <button class="button">Rezervovať skipas</button>
            </div>
            <div class="images-3" style="position: relative;">
                <img alt="clovek na lyziach" src="./images/res01.jpg" alt="">
                <div class="images-div">
                    <h1 >Rodinná dovolenka  <br><span style="font-weight: bold; font-size: 16px;">špeciálne ponuky </span></h1>
                        
                </div>
                <button class="button">Rezervovať skipas</button>
            </div>
        </section>

 

         <section class="images-4">
           <?php foreach($lokality as $lokalita): ?>     
           
            <div class="image-1">
                <img alt="clovek na lyziach" src="<?= $lokalita["obrazok"] ?>" alt="">
                <h1><?= $lokalita["nazovLokality"] ?></h1>
            </div>
              
        <?php endforeach; ?>
        </section>

      


        <section class="apre">
            <h1 style="margin-bottom: 20px; font-size: 30px ;">Apré ski <br> stvorené priamo pre vás</h1>
            <div class="flex">
            <div class="image-6">
                <img alt="icona restauracie" src="./images/icon01.svg" alt="">
                <h2>Reštaurácie</h2>
                <p>U nás nájdete širokú škálu reštaurácií a barov, ktoré ponúkajú jedlá a nápoje pre všetky chute. Dostupné v blízkosti zjazdoviek a vlekov.</p>
            </div>
            <div class="image-6">
                <img alt="icona piva" src="./images/icon02.svg" alt="">
                <h2>Nočný život</h2>
                <p>Nočné lyžovanie, posedenie v bare, diskotéky alebo koncerty. Zúčastnite sa festivalu zábavy, ktorý začíná zo západom slnka.</p>
            </div>
            <div class="image-6">
                <img alt="icona chatu" src="./images/icon03.svg" alt="">
                <h2>Wellness</h2>
                <p>Náše wellness centrum ponúka širokú škálu služieb, ktoré vám pomôžu uvoľniť sa a obnoviť si energiu po náročnom dni na svahu.<p>
            </div>
            <div class="image-6">
                <img alt="icona kalkulacky " src="./images/icon04.svg" alt="">
                <h2>Obchody</h2>
                <p>Ponúkame širokú škálu obchodov a služieb, ako sú lyžiarske a snowboardové predajne, požičovne, športové potreby a ďalšie.</p>
            </div>
            <div class="image-6">
                <img alt="icon diamond" src="./images/icon05.svg" alt="">
                <h2>Ubytovanie</h2>
                <p>Pripravili sme pre vás sieť hotelov, apartmánov a dokonca aj chatiek. Na svoje si prídu aj tí najnáročnejší.</p>
            </div>
            <div class="image-6">
                <img alt="icon bell " src="./images/icon06.svg" alt="">
                <h2>Kurzy</h2>
                <p>Kurzy sú určené pre malých aj veľkých, pre začiatočníkov aj pokročilých. Naučíme vás lyžovať aj padať</p>
            </div>
            
            </div>
        </section>
    </main>


        
    <footer>
        <div>      
                    <img src="./images/foot01.jpg" alt="">
        </div>
                <div class="special">
                        <div >
                            <h2>Základné informácie</h2>
                            <span>+(421) 999 000 001</span>
                        </div>
                        <div>
                            <h2>Rezervácie</h2>
                            <span>+(421) 999 000 002</span>
                        </div>
                        <div>
                            <h2>Centrum pomoci</h2>
                            <span>+(421) 999 000 004</span>
                        </div>
                </div>
                <div>
                    <img src="./images/foot02.jpg" alt="">
                </div>

                
    </footer>

    <div class="footer">
                    <span>ZENIT &copy; Všetky práva vyhradené 2023, vytvorené <a href="#" title="zadaj meno a skolu"> zadajte vaše celé meno a vašu školu . </a></span>
                </div>
    
</body>
<script>


images = document.querySelector(".images-4");
console.log(images.style);

function slider(){
    setInterval(() => {
        images.style.transform = +100;
    }, 5000);
}

slider()
</script>
</html>
