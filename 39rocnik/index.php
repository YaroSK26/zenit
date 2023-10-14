<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
   
    $db_host=  "127.0.0.1";
    $db_user= "zenit_user_39_2";
    $db_password= "zenit_pass_39"; 
    $db_name= "zenit_sk_39";

    $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    
if ( isset($_GET["id"]) and is_numeric($_GET["id"]) ) {

    $sql = "SELECT * FROM questbook WHERE ID = ". $_GET["id"];
    $result = mysqli_query($connection,$sql);
    $questbook = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

     $sql = "INSERT INTO questbook (meno,email,adresa,sprava)
    VALUES (?, ?,?,?)";
   
    $statement = mysqli_prepare($connection, $sql);

     if ($statement === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "ssss", $_POST["meno"], $_POST["email"], $_POST["adresa"], $_POST["sprava"]);


        if(mysqli_stmt_execute($statement)) {
            $id = mysqli_insert_id($connection);
            echo "Úspěšně vložen quest s id: $id";

             $refreshTime = 1;
            header("refresh:$refreshTime;url=" . $_SERVER['PHP_SELF']); 
        } else {
            echo mysqli_stmt_error($statement);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo-nav">
                <img src="./materials/images/gym.svg" class="logo" alt="">
                <h2>GymZ</h2>
        </div>
        
        <div>
            <ul>
                <li>Úvod</li>
                <li>O nás</li>
                <li>Kurzy</li>
                <li>Kontakt</li>
            </ul>
        </div>
            
        </nav>
         <section id="banner">

        <img class="banner-img" src="./materials/images/banner.jpg" alt="">


        <div class="banner">
            
            <img class="left" src="./materials/images/right-quote.png" alt="">
            <h2>ŠTÚDIO GymZ,</h2>
            <p>ktoré vám vždy ponúkne viac.</p>
            <img class="right" src="./materials/images/left-quote.png" alt="">
            <div class="buttons">
            <button>Novinky</button>
            <button>Kurzy</button>
            </div>
     
        </div>


    </section>

    </header>


    <section >

    <div id="novinky">
    <img src="./materials/images/about-bg.jpg" alt="">
        <div>
             <h2>Vyberáme pre Vás,</h2>
             <h1>Novinky</h1>
             <hr>
             <span> Celoslovenské stretnutie 21.-23. februára 2023</span>
            <p> 
            Školenia na obmedzenie prietoku krvi • BEZPLATNÉ CEC/CPD • Porovnajme Surové vs. Varené • Budovanie Ab, Core & Panvová sila • Získavajte krátkodobé zisky z dlhodobých cieľov • Chcete sa stať partnerom? + OČAKÁVAJTE OVEĽA VIAC

        </p>
    </div>
    
    
</div>
<img class="typka" src="./materials/images/about-img.jpg" alt="">
    
    <div id="about-us">
    <img src="./materials/images/about-us-bg.jpg" alt="">
<div>
             <h1>O nás</h1>
             <hr>
             <span> Tréneri, športovci a seriózni klienti hľadajú tie najtvrdšie a najproduktívnejšie tréningové techniky, aby okorenili svoje tréningy a poskytli skutočne jedinečnú výzvu pre ich telo a myseľ. Ale čítajte: one-arm push-ups, pistols, pull-ups, handstands, hanging levers a ďalšie! Ak Vás to zaujalo, kliknite na 
            </span>
            <button class="zisti">Zisti viac</button>    
     </div>

    </div>
    <div class="fotky">
    <img src="./materials/images/rode-gym.jpg" alt="">
    <img src="./materials/images/gym-girls.jpg" alt="">
    </div>

    </section>


        <section >
            <form method="POST" action="index.php" style="text-align: center; margin-top: 300px;">
                    <input type="text" name="meno">
                    <input type="email" name="email">
                    <input type="text" name="adresa">
                   <textarea name="sprava" ></textarea>
                   <button type="submit">Save</button>

            </form>
        </section>
</body>
</html>