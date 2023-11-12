<?php
       include "../assets/database.php";
        include "../assets/zak.php";

        //mazanie dat
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
            if (deleteStudent($connection, $_GET["id"])) {
                    echo "<script>window.location.href = 'login.php';</script>";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    Fakt to chces zmazat? 
    <button>delete</button>
    <a href="one-quest.php?id=<?= $ziaci[0]['ID'] ?>">cancel</a>
    </form>
</body>
</html>