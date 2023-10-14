<?php
    $db_host=  "127.0.0.1";
    $db_user= "zenit_user_34_2";
    $db_password= "zenit_pass_34"; 
    $db_name= "zenit_sk_34";

    $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    

    $sql = "SELECT * FROM questbook";
    $result = mysqli_query($connection,$sql);
    $questbook = mysqli_fetch_all($result, MYSQLI_ASSOC);



    // formular



    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
    require "assets/database.php";
     $sql = "INSERT INTO questbook (Autor,text2)
    VALUES (?, ?)";
   
    $statement = mysqli_prepare($connection, $sql);

     if ($statement === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "ss", $_POST["Autor"], $_POST["text2"]);


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


//     $sql = "INSERT INTO questbook (Autor, text2)
//             VALUES ('" .mysqli_escape_string($connection, $_POST["Autor"]) . "','"
//                        .mysqli_escape_string($connection, $_POST["text2"]) . "')";

//     $result = mysqli_query($connection, $sql);

//     if ($result === false) {
//         echo mysqli_error($connection);
//     } else {
//         $id = mysqli_insert_id($connection);
//         echo "Úspěšně vloženo id: $id";

//          Přesměrování na aktuální stránku po úspěšném vložení
//         $refreshTime = 1; // nastavte čas, jak dlouho trvá, než se stránka aktualizuje (v sekundách)
//         header("refresh:$refreshTime;url=" . $_SERVER['PHP_SELF']);
//     }
// }

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

<div class="container">
    <div class="header">
        <nav>
            <div class="logo">NAPANT BY ZENIT</div>
            <ul>
                <li>úvod</li>
                <li>fotogaléria</li>
                <li>kniha navštev</li>
            </ul>
        </nav>
    </div>

    <form  method="POST" action="index.php" class="book">
        <input type="text" name="Autor" placeholder="autor">
        <div>
            <img src="./icons/text-bold-icon.png" alt="" onclick="changeTextStyle('bold')">
            <img src="./icons/text-italic-icon.png" alt="" onclick="changeTextStyle('italic')">
            <img src="./icons/text-underline-icon.png" alt="" onclick="changeTextStyle('underline')">
        </div>

        <textarea required  id="mainTextarea" placeholder="text" cols="30" rows="10" name="text2"></textarea>
        <button>Odoslat</button>
    </form>

<center>
    <label id="questionLabel">Otázka: </label>
        <input id="answerInput" required type="text">
        <button onclick="checkAnswer()" >Odoslať odpoveď</button>
        </center>

    <?php if (empty($questbook)): ?>
        <p>nic tu neni podme domov</p>
    <?php else: ?>
        <div>
            <?php foreach($questbook as $quest): ?>
            <p>
                <?php echo $quest["Autor"]. " " . $quest["text2"] ?>
            </p>
            <a href="one-quest.php?id=<?= $quest['ID'] ?>">Více informací</a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>



<script>
    var questions = [
        { question: "Napíšte meno tretej planéty našej slnečnej sústavy", answer: "zem" },
        { question: "Napíšte druhý deň v týždni (slovom)", answer: "utorok" },
        { question: "Napíšte výsledok dva plus dva (slovom, píšte bez diakritiky)", answer: "styri" },
        { question: "Koľko dní ma jeden týždeň (slovom)", answer: "sedem" },
        { question: "Má to štyri nohy a robí to mňau, čo je to? (píšte bez diakritiky)", answer: "macka" }
    ];

    function loadRandomQuestion() {
        var randomIndex = Math.floor(Math.random() * questions.length);
        var randomQuestion = questions[randomIndex].question;
        document.getElementById("questionLabel").textContent = "Otázka: " + randomQuestion;
    }

    function checkAnswer() {
        var userAnswer = document.getElementById("answerInput").value.toLowerCase();
        var currentQuestion = document.getElementById("questionLabel").textContent.slice(8);
        var foundQuestion = questions.find(q => q.question === currentQuestion);

        if (foundQuestion) {
            var correctAnswer = foundQuestion.answer.toLowerCase();

            if (userAnswer === correctAnswer) {
                alert("Správna odpoveď!");
            } else {
                alert("Nesprávna odpoveď. Skúste znova.");
            }

            loadRandomQuestion();
            document.getElementById("answerInput").value = "";
        } else {
            console.error("Otázka nebola nájdená:", currentQuestion);
        }
    }

    loadRandomQuestion();

    function changeTextStyle(style) {
        var textarea = document.getElementById("mainTextarea");

        // Otestujte, či textarea už má danú triedu
        if (textarea.classList.contains("text-" + style)) {
            // Ak áno, odstráňte ju
            textarea.classList.remove("text-" + style);
        } else {
            // Inak pridajte ju
            textarea.classList.add("text-" + style);
        }
    }
</script>

</body>
</html>
