<?php

    $db_host=  "127.0.0.1";
    $db_user= "zenituser40";
    $db_password= "zenitpass40"; 
    $db_name= "zenitkk40";

    //treba zmenit v pripade ze postujeme stranku na internet, udaje ti pridu do emailu napriklad od wedosu,import export database

    $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    

    $sql = "SELECT * FROM lokality";
    $result = mysqli_query($connection,$sql);
    $lokality = mysqli_fetch_all($result, MYSQLI_ASSOC);

    


?>