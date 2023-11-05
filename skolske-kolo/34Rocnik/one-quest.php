<?php
        include "./assets/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Informace o queste</h1>
    </header>


    <main>
        <section>
            <?php if ($questbook === null): ?>
                <p>quest nenalezen</p>
            <?php else: ?>
                <p>id: <?= $questbook[0]["ID"] ?></p>
                <p><?= $questbook[0]["Autor"]. " " .$questbook[0]["text2"] ?></p>

            <?php endif ?>    
        </section>
    </main>


    <footer></footer>
</body>

</html>