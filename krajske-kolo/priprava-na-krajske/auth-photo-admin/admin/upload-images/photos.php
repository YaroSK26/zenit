<?php

    require "../auth.php";
    require "../../assets/database.php";
    require "../../assets/user.php";

    session_start();

    if (!isLoggedIn()) {
        die("nepovoleny pristup");
    }

    $user_id = $_SESSION["logged_in_user_id"];

    $allImages = getImagesByUserId($connection,$user_id);
    $role = $_SESSION["role"];
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>fotkyyyy</h1>
    <a href="../login.php">spat</a>

    <div>
            <form enctype="multipart/form-data" action="after-photo.php" method="POST">
                    <input type="file" name="image" required><br>
                    <input type="submit" value="nahrat" name="submit">
            </form>
    </div>

    <?php foreach($allImages as $image): ?>  
        <div style="display:flex; flex-direction:column; max-width: 300px;">
            <img src=<?="../uploads/" . $user_id . "/" . $image["image_name"]?> >
            <div>
                <a href=<?="../uploads/" . $user_id . "/" . $image["image_name"] ?> download>stiahnut</a>

                <?php if($role === "admin"):  ?> <a href="delete-photo.php?id=<?=$user_id?>&image_name=<?=$image['image_name']?>">Zmazat</a>
                <?php else:?> <h1>nie si admin nemozes mazat</h1>
                 <?php endif;?>
                
            </div>
        </div>
    <?php endforeach;?>
</body>
</html>