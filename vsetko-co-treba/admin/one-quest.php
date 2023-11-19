<?php
        include "../assets/database.php";
        include "../assets/zak.php";
        
    //vybratie dat

        if (isset($_GET["id"])) {
          $one_student = getStudent($connection,$_GET["id"] );
            if ($one_student) {
                  
            
            $autor = $one_student["Autor"];
            $text2 = $one_student["text2"];
            $id = $one_student["ID"];
            

            }else{
                die("student neni ");
            }
        } else {
             die("student neni ");
        }



        //update 
         if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $autor = $_POST["Autor"];
            $text2 = $_POST["text2"];

            
            if (updateStudent($connection, $autor, $text2, $id)) {
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
    <header>
        <h1>Informace o queste</h1>
    </header>


    <main>
        <section>
            <?php if ($ziaci === null): ?>
                <p>quest nenalezen</p>
            <?php else: ?>
                <p>id: <?= $ziaci[0]["ID"] ?></p>
                <p><?= htmlspecialchars( $autor). " " . htmlspecialchars($text2) ?></p>

            <?php endif ?>    


          
        </section>

        Edit
        <form  method="POST">
        <input type="text" name="Autor" placeholder="autor" required  value="<?= $autor ?>"><br>

        <textarea required  placeholder="text" cols="30" rows="10" name="text2"  ><?= htmlspecialchars($text2) ?></textarea><br>
        <button>Odoslat</button>
    </form>

    <a href="login.php">spat</a>

    Delete
    <a href="delete.php?id=<?= $ziaci[0]['ID'] ?>">Delete</a>
    </main>


    <footer></footer>
</body>

</html>