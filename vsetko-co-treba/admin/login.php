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
</head>
<body>
    si prihlaseny/zaregistrovany 
    <a href="formular.php">formular</a>
    <a href="log-out.php">Odhlasit sa</a>

    <?php if($role === "admin"): ?>
            <h1>Si admiiiiiiiiiiin</h1>
    <?php endif;?>


 




    <div class="container">
    <form  method="POST" action="login.php" class="book">
        <input type="text" name="Autor" placeholder="autor" required  value="<?= htmlspecialchars($autor) ?>"><br>

        <textarea required  id="mainTextarea" placeholder="text" cols="30" rows="10" name="text2"  value="<?= htmlspecialchars($text2) ?>"></textarea><br>
        <button>Odoslat</button>
    </form>

    <h1>zoznam </h1>
    <input type="text" placeholder="filter" class="filter-input">

    <?php if (empty($ziaci)): ?>
        <p>nic tu neni podme domov</p>
    <?php else: ?>
        <div class="all-quest">
            <?php foreach($ziaci as $quest): ?>
            <div class="one-quest">
                <h2>
                <?php echo htmlspecialchars($quest["Autor"]). " " . htmlspecialchars($quest["text2"]) ?>
            </h2>
                <a href="one-quest.php?id=<?= $quest['ID'] ?>">Viac informacii</a>
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

