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
    <link rel="stylesheet" href="../style.css">   
</head>
<body>
    <center>
    <header>
        <h1>Meet <?= htmlspecialchars( $autor)?></h1>
    </header>


    <main>
        <section>
            <?php if ($ziaci === null): ?>
                <p>Error</p>
            <?php else: ?>
                <p><b>id:</b> <?= $ziaci[0]["ID"] ?></p>
                <p><b>name: </b><?= htmlspecialchars( $autor)?></p>
                <p><b>info: </b><?= htmlspecialchars($text2)?></p>

            <?php endif ?>    


          
        </section>
        <h1>Edit</h1>
        <form  method="POST">
        <input type="text" name="Autor" placeholder="autor" required  value="<?= $autor ?>"><br>

        <textarea required  placeholder="text" cols="30" rows="10" name="text2"  ><?= htmlspecialchars($text2) ?></textarea><br>
        <button>Save</button>
    </form>

    <span><br>
    
        <a href="login.php"><button>Back</button></a>
    

        <a href="delete.php?id=<?= $ziaci[0]['ID'] ?>"> <button> Delete</button> </a>
    
    </span>
</main>


</center>
</body>

</html>