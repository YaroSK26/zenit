<?php
    include "./zak.php";
    include "./assets/database.php";

    //ziskanie studentov , ptm vypis v mape
    $questbook = getAllStudents($connection, "ID, Autor,text2");


    // formular

    $autor = null;
    $text2 = null;

    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
    include "assets/database.php";

    

    $autor = $_POST["Autor"];
    $text2 = $_POST["text2"];

    //create student do databazy
    $id = createStudent($connection, $autor, $text2);

    if ($id) {
        header("location: one-quest.php?id=$id");
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

<div class="container">
    <form  method="POST" action="index.php" class="book">
        <input type="text" name="Autor" placeholder="autor" required  value="<?= htmlspecialchars($autor) ?>"><br>

        <textarea required  id="mainTextarea" placeholder="text" cols="30" rows="10" name="text2"  value="<?= htmlspecialchars($text2) ?>"></textarea><br>
        <button>Odoslat</button>
    </form>

    <?php if (empty($questbook)): ?>
        <p>nic tu neni podme domov</p>
    <?php else: ?>
        <div>
            <?php foreach($questbook as $quest): ?>
            <p>
                <?php echo htmlspecialchars($quest["Autor"]). " " . htmlspecialchars($quest["text2"]) ?>
            </p>
            <a href="one-quest.php?id=<?= $quest['ID'] ?>">Viac informacii</a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>




</body>
</html>
