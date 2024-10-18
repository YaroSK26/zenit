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
    <link rel="stylesheet" href="../style.css"> 
</head>
<body>
    <center>
        <form method="POST">
            Are you sure you want to delete this? 
            <span>
                <button type="submit">delete</button>
            </span>
        </form>
        <a class="button" href="login.php"><button> cancel</button></a>
    </center>
</body>
</html>