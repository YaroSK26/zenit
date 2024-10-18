<?php 
require "./auth.php";
session_start();

//zistovanie ci je user prihlaseny
if (!isLoggedIn()) {
        die("nepovoleny vstup");
}

$role = $_SESSION["role"];

    //!databaza 

    include "../assets/zak.php";
    include "../assets/database.php";

    //ziskanie studentov , ptm vypis v mape
    $ziaci = getAllStudents($connection, "ID, Autor,text2");


    // formular

    $autor = null;
    $text2 = null;

    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
    include "../assets/database.php";


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
    <link rel="stylesheet" href="../style.css">    
</head>
<body>
    <p class="nav">
    You are  Registered/Logged! <br>
    
        <a href="formular.php"><button>Contact</button></a>
    
    
        <a href="log-out.php"><button>Sign out</button></a>
    
    </p>

    <?php if($role === "admin"): ?>
        <center>
            <h3>You are admin</h3>
        </center>    
         <?php else: ?>
            <center>
            <h3>You are not admin</h3>
        </center>  
    <?php endif;?>


 




    <div class="container">
        <h1>Create a  character</h1>
    <form  method="POST" action="login.php" class="book">
        <input type="text" name="Autor" placeholder="Name of your character" required  value="<?= htmlspecialchars($autor) ?>"><br>

        <textarea required  id="mainTextarea" placeholder="Describe your character" cols="30" rows="10" name="text2"  value="<?= htmlspecialchars($text2) ?>"></textarea><br>
        <button>Send</button>
    </form>

    <h1>List of your characters </h1>
    <input type="text" placeholder="filter" class="filter-input">

    <?php if (empty($ziaci)): ?>
        <p>You haven't created your character yet</p>
    <?php else: ?>
        <div class="all-quest">
            <?php foreach($ziaci as $quest): ?>
            <div class="one-quest">
                <h2>
                <?php echo htmlspecialchars($quest["Autor"]) ?>
                    <a href="one-quest.php?id=<?= $quest['ID'] ?>"><button>More info</button></a>
            </h2>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</body>

<script>
         const input = document.querySelector('.filter-input');
     const oneQuest = document.querySelectorAll('.one-quest');
     const allQuest = document.querySelector('.all-quest');

     //quest to object 
     oneQuestArray = Array.from(oneQuest);

     const questObjects = oneQuestArray.map((o,index) => {
        return {
            id: index,
            questsName: o.querySelector("h2").textContent,
            questsLink: o.querySelector("a"),
        }
     })

     input.addEventListener("keyup", () => {
        const inputText = input.value.toLowerCase();


        const filteredQuest = questObjects.filter((o) => {
                return o.questsName.toLowerCase().includes(inputText) 
        })

        allQuest.textContent = ""

        filteredQuest.map((o) => {
            const newDiv =document.createElement("div")
            newDiv.classList.add("one-quest")

            const newH2 =document.createElement("h2")
            newH2.textContent = o.questsName

            newDiv.append(newH2)
            newDiv.append(o.questsLink)
            allQuest.append(newDiv)
        })

     })
</script>
</html>

